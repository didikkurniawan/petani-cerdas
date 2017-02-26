<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User Model
 * 
 * @package App
 * @category Model
 * @author Ardi Soebrata
 */
class User_model extends MY_Model {

	protected $table = 'auth_users';
	protected $role_table = 'acl_roles';
	protected $filter_fields = array('first_name','last_name','username','id');


	private $ci;

	function __construct()
	{
		parent::__construct();
		$this->ci = & get_instance();
		$this->ci->load->library('PasswordHash', array('iteration_count_log2' => 8, 'portable_hashes' => FALSE));

	}

	/**
	 * Insert data to User Model
	 * 
	 * @param array $data
	 * @return boolean
	 */
	public function insert($data)
	{

		$data['registered'] = date('Y-m-d H:i:s');
		return parent::insert($this->prep_data($data));
	}

	/**
	 * Update data to User Model
	 * 
	 * @param int $id
	 * @param array $data
	 * @return boolean
	 */
	public function update($id, $data)
	{

		return parent::update($id, $this->prep_data($data));
	}

	/**
	 * Prepare input data
	 * 
	 * @param array $data
	 * @return array
	 */
	private function prep_data($data)
	{
		// Remove confirm-password field
		unset($data['confirm-password']);

		// Hash password field if not empty
		if (isset($data['password']))
		{
			if (strlen(trim($data['password'])) > 0)
				$data['password'] = $this->ci->passwordhash->HashPassword($data['password']);
			else
				unset($data['password']);
		}
		return $data;
	}

	/**
	 * Compare user input password to stored hash
	 * 
	 * @param string $password
	 * @param string $userpass
	 * @return boolean
	 */
	public function check_password($password, $userpass)
	{
		// check password
		return $this->ci->passwordhash->CheckPassword($password, $userpass);
	}

	/**
	 * Get user by id
	 * 
	 * @param int $id
	 * @return array|boolean
	 */
	function get_by_id($id)
	{
		$this->db->select($this->table . '.*, ' . $this->role_table . '.name AS role_name')
				->join($this->role_table, $this->role_table . '.id = ' . $this->table . '.role_id', 'left');
		return parent::get_by_id($id);
	}

	/**
	 * Get user by username
	 * 
	 * @param string $username
	 * @return object user
	 */
	function get_by_username($username)
	{
		$this->db->select($this->table . '.*, ' . $this->role_table . '.name AS role_name')
				->join($this->role_table, $this->role_table . '.id = ' . $this->table . '.role_id', 'left');
		$query = $this->db->get_where($this->table, array($this->table . '.username' => $username));
		if ($query->num_rows() > 0)
			return $query->row();
		else
			return FALSE;
	}

	/**
	 * Check if username is available
	 * 
	 * @param string $username
	 * @param int $id
	 * @return boolean
	 */
	function is_username_unique($username, $id = 0)
	{
		$this->db->where('username', $username);
		if ($id > 0)
			$this->db->where($this->id_field . ' <>', $id);
		$query = $this->db->get($this->table);
		return ($query->num_rows() == 0);
	}

	/**
	 * Check if email is available
	 * 
	 * @param string $email
	 * @param int $id
	 * @return boolean
	 */
	function is_email_unique($email, $id = 0)
	{
		$this->db->where('email', $email);
		if ($id > 0)
			$this->db->where($this->id_field . ' <>', $id);
		$query = $this->db->get($this->table);
		return ($query->num_rows() == 0);
	}

	function datatable()
	{
		$this->datatables->select("$this->table.id, first_name, last_name, username, email, acl_roles.name AS role, registered, '' AS action")
				->join('acl_roles', "acl_roles.id = $this->table.role_id", 'left')
				->from($this->table);
		return $this->datatables->generate();
	}
	
	public function get_all($limit = 0, $offset = 0)
    {
        $field_term = $this->table . '.id';
        
        foreach ($this->filter_fields as $val) {
            $field_term .= "," . $this->table . "." . $val;
        }
        
        $this->db->select($field_term . "," . $this->table . ".registered");
        $this->db->from($this->table);
        $this->db->limit($limit);
        $this->db->offset($offset);
        $data = $this->db->get()->result();
        return $data;
    }
    
    public function get_by_like($term)
    {
        $field_term = $this->table . '.id';
        
        foreach ($this->filter_fields as $val) {
            $field_term .= "," . $this->table . "." . $val;
        }
        
        $this->db->select($field_term);
        $this->db->from($this->table);
        $this->db->where($this->table . "." . $this->filter_fields[0] . " LIKE '%" . $term . "%'");
        $this->db->or_where($this->table . "." . $this->filter_fields[1] . " LIKE '%" . $term . "%'");
        $this->db->or_where($this->table . "." . $this->filter_fields[2] . " LIKE '%" . $term . "%'");
        $this->db->or_where($this->table . "." . $this->filter_fields[3] . " LIKE '%" . $term . "%'");
        
        $data = $this->db->get()->result();
        return $data;
        
        
    }
}
