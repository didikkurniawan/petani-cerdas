<?php

/**
 * Created by PhpStorm.
 * User: agungrizkyana
 * Date: 1/18/17
 * Time: 06:13
 */
class Numbering
{

    protected $t_penawaran = 't_penawaran';
    protected $t_serah_terima = 't_serah_terima';
    protected $t_pembayaran = 't_pembayaran';
    protected $t_diklat = 't_diklat';

    private $CI;

    function __construct()
    {
        // Get the instance
        $this->CI = &get_instance();
    }

    public function get_no_invoice()
    {

        $time = time();
        $month = date('m', $time);
        $year = date('Y', $time);
        $date = date('d', $time);

        $this->CI->db->where("DATE(created_at) BETWEEN '".date('m-01-Y')."' AND '". date('m-t-Y') ."'");

        $no_penawaran = $this->CI->db->count_all($this->t_pembayaran);
        $no_penawaran++;
        $no_penawaran_text = "";

        if ($no_penawaran < 10) {
            $no_penawaran_text = "00" . $no_penawaran;
        } else if ($no_penawaran >= 10 && $no_penawaran < 100) {
            $no_penawaran_text = "0" . $no_penawaran;
        } else {
            $no_penawaran_text = $no_penawaran;
        }

        switch ($month) {
            case '01':
                $no_penawaran_text = $no_penawaran_text . "/" . $date . $month . "/INV/ILS/I/" . $year;
                break;
            case '02':
                $no_penawaran_text = $no_penawaran_text . "/" . $date . $month . "/INV/ILS/II/" . $year;
                break;
            case '03':
                $no_penawaran_text = $no_penawaran_text . "/" . $date . $month . "/INV/ILS/III/" . $year;
                break;
            case '04':
                $no_penawaran_text = $no_penawaran_text . "/" . $date . $month . "/INV/ILS/IV/" . $year;
                break;
            case '05':
                $no_penawaran_text = $no_penawaran_text . "/" . $date . $month . "/INV/ILS/V/" . $year;
                break;
            case '06':
                $no_penawaran_text = $no_penawaran_text . "/" . $date . $month . "/INV/ILS/VI/" . $year;
                break;
            case '07':
                $no_penawaran_text = $no_penawaran_text . "/" . $date . $month . "/INV/ILS/VII/" . $year;
                break;
            case '08':
                $no_penawaran_text = $no_penawaran_text . "/" . $date . $month . "/INV/ILS/VIII/" . $year;
                break;
            case '09':
                $no_penawaran_text = $no_penawaran_text . "/" . $date . $month . "/INV/ILS/IX/" . $year;
                break;
            case '10':
                $no_penawaran_text = $no_penawaran_text . "/" . $date . $month . "/INV/ILS/X/" . $year;
                break;
            case '11':
                $no_penawaran_text = $no_penawaran_text . "/" . $date . $month . "/INV/ILS/XI/" . $year;
                break;
            case '12':
                $no_penawaran_text = $no_penawaran_text . "/" . $date . $month . "/INV/ILS/XII/" . $year;
                break;
        }

        return $no_penawaran_text;
    }

    public function get_no_penawaran()
    {

        $time = time();
        $month = date('m', $time);
        $year = date('Y', $time);
        $date = date('d', $time);

        $this->CI->db->where("DATE(created_at) BETWEEN '".date('m-01-Y')."' AND '". date('m-t-Y') ."'");

        $no_penawaran = $this->CI->db->count_all($this->t_penawaran);
        $no_penawaran++;
        $no_penawaran_text = "";

        if ($no_penawaran < 10) {
            $no_penawaran_text = "00" . $no_penawaran;
        } else if ($no_penawaran >= 10 && $no_penawaran < 100) {
            $no_penawaran_text = "0" . $no_penawaran;
        } else {
            $no_penawaran_text = $no_penawaran;
        }

        switch ($month) {
            case '01':
                $no_penawaran_text = $no_penawaran_text . "/" . $date . $month . "/QT/ILS/I/" . $year;
                break;
            case '02':
                $no_penawaran_text = $no_penawaran_text . "/" . $date . $month . "/QT/ILS/II/" . $year;
                break;
            case '03':
                $no_penawaran_text = $no_penawaran_text . "/" . $date . $month . "/QT/ILS/III/" . $year;
                break;
            case '04':
                $no_penawaran_text = $no_penawaran_text . "/" . $date . $month . "/QT/ILS/IV/" . $year;
                break;
            case '05':
                $no_penawaran_text = $no_penawaran_text . "/" . $date . $month . "/QT-ILS/V/" . $year;
                break;
            case '06':
                $no_penawaran_text = $no_penawaran_text . "/" . $date . $month . "/QT-ILS/VI/" . $year;
                break;
            case '07':
                $no_penawaran_text = $no_penawaran_text . "/" . $date . $month . "/QT-ILS/VII/" . $year;
                break;
            case '08':
                $no_penawaran_text = $no_penawaran_text . "/" . $date . $month . "/QT-ILS/VIII/" . $year;
                break;
            case '09':
                $no_penawaran_text = $no_penawaran_text . "/" . $date . $month . "/QT-ILS/IX/" . $year;
                break;
            case '10':
                $no_penawaran_text = $no_penawaran_text . "/" . $date . $month . "/QT-ILS/X/" . $year;
                break;
            case '11':
                $no_penawaran_text = $no_penawaran_text . "/" . $date . $month . "/QT-ILS/XI/" . $year;
                break;
            case '12':
                $no_penawaran_text = $no_penawaran_text . "/" . $date . $month . "/QT-ILS/XII/" . $year;
                break;
        }

        return $no_penawaran_text;
    }

    public function get_no_order($jenis_order)
    {

        $param_month = "m";
        $param_year = "Y";
        $time = time();
        $month = date($param_month, $time);
        $year = date($param_year, $time);

        $no_order = "";

        $this->CI->db->where("DATE(created_at) BETWEEN '".date('Y-m-01')."' AND '". date('Y-m-t') ."'");

        switch ($jenis_order) {
            case "ord":
                $no_ord = count($this->CI->db->where("jenis_order", $jenis_order)->get($this->t_serah_terima)->result());

                $no_ord++;
                if ($no_ord < 10) {
                    $no_order = "00" . $no_ord;
                } else if ($no_ord >= 10 && $no_ord < 100) {
                    $no_order = "0" . $no_ord;
                } else {
                    $no_order = $no_ord;
                }

                switch ($month) {
                    case '01':
                        $no_order = $no_order . "/I/ORD/" . $year;
                        break;
                    case '02':
                        $no_order = $no_order . "/II/ORD/" . $year;
                        break;
                    case '03':
                        $no_order = $no_order . "/III/ORD/" . $year;
                        break;
                    case '04':
                        $no_order = $no_order . "/IV/ORD/" . $year;
                        break;
                    case '05':
                        $no_order = $no_order . "/V/ORD/" . $year;
                        break;
                    case '06':
                        $no_order = $no_order . "/VI/ORD/" . $year;
                        break;
                    case '07':
                        $no_order = $no_order . "/VII/ORD/" . $year;
                        break;
                    case '08':
                        $no_order = $no_order . "/VIII/ORD/" . $year;
                        break;
                    case '09':
                        $no_order = $no_order . "/IX/ORD/" . $year;
                        break;
                    case '10':
                        $no_order = $no_order . "/X/ORD/" . $year;
                        break;
                    case '11':
                        $no_order = $no_order . "/XI/ORD/" . $year;
                        break;
                    case '12':
                        $no_order = $no_order . "/XII/ORD/" . $year;
                        break;
                }

                break;
            //ord
            //ordn
            case "ord-n" :
                $no_ordn = $no_ord = $this->CI->db->where("jenis_order", $jenis_order)->count_all($this->t_serah_terima);
                $no_ordn++;
                $no_order = "";
                if ($no_ordn < 10) {
                    $no_order = "00" . $no_ordn;
                } else if ($no_ordn >= 10 && $no_ordn < 100) {
                    $no_order = "0" . $no_ordn;
                } else {
                    $no_order = $no_ordn;
                }

                switch ($month) {
                    case '01':
                        $no_order = $no_order . "/I/ORD-N/" . $year;
                        break;
                    case '02':
                        $no_order = $no_order . "/II/ORD-N/" . $year;
                        break;
                    case '03':
                        $no_order = $no_order . "/III/ORD-N/" . $year;
                        break;
                    case '04':
                        $no_order = $no_order . "/IV/ORD-N/" . $year;
                        break;
                    case '05':
                        $no_order = $no_order . "/V/ORD-N/" . $year;
                        break;
                    case '06':
                        $no_order = $no_order . "/VI/ORD-N/" . $year;
                        break;
                    case '07':
                        $no_order = $no_order . "/VII/ORD-N/" . $year;
                        break;
                    case '08':
                        $no_order = $no_order . "/VIII/ORD-N/" . $year;
                        break;
                    case '09':
                        $no_order = $no_order . "/IX/ORD-N/" . $year;
                        break;
                    case '10':
                        $no_order = $no_order . "/X/ORD-N/" . $year;
                        break;
                    case '11':
                        $no_order = $no_order . "/XI/ORD-N/" . $year;
                        break;
                    case '12':
                        $no_order = $no_order . "/XII/ORD-N/" . $year;
                        break;
                }
                break;
            case "sk" :
                $sk = $no_ord = $this->CI->db->where("jenis_order", $jenis_order)->count_all($this->t_serah_terima);;
                $sk++;
                $no_order = "";
                if ($sk < 10) {
                    $no_order = "00" . $sk;
                } else if ($sk >= 10 && $sk < 100) {
                    $no_order = "0" . $sk;
                } else {
                    $no_order = $sk;
                }

                switch ($month) {
                    case '01':
                        $no_order = $no_order . "/I/SK/" . $year;
                        break;
                    case '02':
                        $no_order = $no_order . "/II/SK/" . $year;
                        break;
                    case '03':
                        $no_order = $no_order . "/III/SK/" . $year;
                        break;
                    case '04':
                        $no_order = $no_order . "/IV/SK/" . $year;
                        break;
                    case '05':
                        $no_order = $no_order . "/V/SK/" . $year;
                        break;
                    case '06':
                        $no_order = $no_order . "/VI/SK/" . $year;
                        break;
                    case '07':
                        $no_order = $no_order . "/VII/SK/" . $year;
                        break;
                    case '08':
                        $no_order = $no_order . "/VIII/SK/" . $year;
                        break;
                    case '09':
                        $no_order = $no_order . "/IX/SK/" . $year;
                        break;
                    case '10':
                        $no_order = $no_order . "/X/SK/" . $year;
                        break;
                    case '11':
                        $no_order = $no_order . "/XI/SK/" . $year;
                        break;
                    case '12':
                        $no_order = $no_order . "/XII/SK/" . $year;
                        break;
                }
                break;
            default:
                echo "";
                break;
        }

        return $no_order;
    }

     public function get_no_diklat()
    {

        $time = time();
        $month = date('m', $time);
        $year = date('Y', $time);
        $date = date('d', $time);

        $this->CI->db->where("DATE(created_at) BETWEEN '".date('m-01-Y')."' AND '". date('m-t-Y') ."'");

        $no_diklat = $this->CI->db->count_all($this->t_diklat);
        $no_diklat++;
        $no_diklat_text = "";

        if ($no_diklat < 10) {
            $no_diklat_text = "00" . $no_diklat;
        } else if ($no_penawaran >= 10 && $no_diklat < 100) {
            $no_diklat_text = "0" . $no_diklat;
        } else {
            $no_diklat_text = $no_diklat;
        }

        switch ($month) {
            case '01':
                $no_diklat_text = $no_diklat_text . "/" . $date . $month . "/PLT/ILS/I/" . $year;
                break;
            case '02':
                $no_diklat_text = $no_diklat_text . "/" . $date . $month . "/PLT/ILS/II/" . $year;
                break;
            case '03':
                $no_diklat_text = $no_diklat_text . "/" . $date . $month . "/PLT/ILS/III/" . $year;
                break;
            case '04':
                $no_diklat_text = $no_diklat_text . "/" . $date . $month . "/PLT/ILS/IV/" . $year;
                break;
            case '05':
                $no_diklat_text = $no_diklat_text . "/" . $date . $month . "/PLT-ILS/V/" . $year;
                break;
            case '06':
                $no_diklat_text = $no_diklat_text . "/" . $date . $month . "/PLT-ILS/VI/" . $year;
                break;
            case '07':
                $no_diklat_text = $no_diklat_text . "/" . $date . $month . "/PLT-ILS/VII/" . $year;
                break;
            case '08':
                $no_diklat_text = $no_diklat_text . "/" . $date . $month . "/PLT-ILS/VIII/" . $year;
                break;
            case '09':
                $no_diklat_text = $no_diklat_text . "/" . $date . $month . "/PLT-ILS/IX/" . $year;
                break;
            case '10':
                $no_diklat_text = $no_diklat_text . "/" . $date . $month . "/PLT-ILS/X/" . $year;
                break;
            case '11':
                $no_diklat_text = $no_diklat_text . "/" . $date . $month . "/PLT-ILS/XI/" . $year;
                break;
            case '12':
                $no_diklat_text = $no_diklat_text . "/" . $date . $month . "/PLT-ILS/XII/" . $year;
                break;
        }

        return $no_diklat_text;
    }
}