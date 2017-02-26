<?php

/**
 * Main Navigation.
 * Primarily being used in views/layouts/admin.php
 *
 */
$config['navigation'] = array(
    'dashboard' => array(
        'title' => 'Dashboard',
        'children' => array(
            'manajer' => array(
                'uri' => 'dashboard/home',
                'title' => 'Manajerial',
            ),
            'order' => array(
                'uri' => 'dashboard/order',
                'title' => 'Order',
            )
        )
    ),

    // 'po' => array(
    //     'title' => 'Purchase Order (PO)',
    //     'uri' => 'po'
    // ),

    'penerimaan_sample' => array(

        'title' => 'Penerimaan Sample',
        'children' => array(
            'penawaran_biaya' => array(
                'title' => 'Penawaran Biaya',
                'uri' => 'penerimaan_sample/penawaran_biaya'
            ),
            // 'kaji_ulang' => array(
            //     'title' => 'Pengkajian Ulang',
            //     'uri' => 'penerimaan_sample/pengkajian_ulang'
            // ),
        )
    ),

    'serah_terima' => array(
        'title' => 'Serah Terima',
        'children' => array(
            'serah_terima_masuk' => array(
                'title' => 'Serah Terima Masuk',
                'uri' => 'serah_terima/masuk'
            ),
            'serah_terima_keluar' => array(
                'title' => 'Serah Terima Keluar',
                'uri' => 'serah_terima/keluar'
            )
        )
    ),

    'ro' => array(
        'title' => 'Rancangan Ops (RO)',
        'uri' => 'ro'
    ),

    

    

    'kalibrasi' => array(
        'title' => 'Kalibrasi',
        'children' => array(
            'index_kalibrasi' => array(
                'title' => 'Log Kalibrasi',
                'uri' => 'kalibrasi/index'
            ),
            'tindakan_kalibrasi' => array(
                'title' => 'Tindakan Kalibrasi',
                'uri' => 'kalibrasi/add'
            ),
            'verifikasi' => array(
                'title' => 'Verifikasi',
                'uri' => 'kalibrasi/verifikasi'
            )
        )
    ),

    'sertifikat' => array(
        'title' => 'Sertifikat',
        'children' => array(
            // 'log_sertifikat' => array(
            //     'title' => 'Log Sertifikat',
            //     'uri' => 'sertifikat/index'
            // ),
            'draft_sertifikat' => array(
                'title' => 'Draft Sertifikat',
                'uri' => 'sertifikat/draft'
            ),
            'verifikasi' => array(
                'title' => 'Verifikasi',
                'uri' => 'sertifikat/verifikasi'
            )
        )
    ),

    'pembayaran' => array(
        'title' => 'Pembayaran',
        'uri' => 'pembayaran'
    ),


    'master' => array(
        'title' => 'Master Data',
        'children' => array(
            'alat' => array(
                'title' => 'Data Alat',
                'uri' => 'master/alat'
            ),
            'customer' => array(
                'title' => 'Data Pelanggan',
                'uri' => 'master/data_pelanggan'
            ),
            'kontraktor' => array(
                'title' => 'Data Kontaktor',
                'uri' => 'master/kontraktor'
            ),
            'pengaduan' => array(
                'title' => 'Data Pengaduan',
                'uri' => 'master/pengaduan'
            )

        )
    ),

    'pengaduan_customer' => array(
        'title' => 'Pengaduan Customer',
        'uri' => 'pengaduan_customer'
    ),

    'diklat' => array(
        'title' => 'Diklat / Konsultasi',
        'children' => array(
            'penawaran_biaya' => array(
                'title' => 'Penawaran Biaya',
                'uri' => 'diklat/penawaran_biaya'
            )
        )
    ),

    'setting' => array(
        'title' => 'Setting',
        'uri' => 'setting'
    ),

    'user-management' => array(
        'uri' => 'auth/user',
        'title' => 'Kelola Pengguna',
    ),
    'acl' => array(
        'title' => 'Hak Akses',
        'children' => array(
            'rules' => array(
                'uri' => 'acl/rule',
                'title' => 'Aturan'
            ),
            'roles' => array(
                'uri' => 'acl/role',
                'title' => 'Divisi'
            ),
            'resources' => array(
                'uri' => 'acl/resource',
                'title' => 'Akses Modul'
            )
        )
    ),
    'samples' => array(
        'title' => 'Samples',
        'icon' => 'fa fa-docs',
        'children' => array(
            'export' => array(
                'uri' => 'samples/export',
                'title' => 'Export PDF / Excel'
            ),
            'form' => array(
                'uri' => 'samples/form',
                'title' => 'Form Event & Validation'
            ),
            'crud' => array(
                'uri' => 'samples/crud',
                'title' => 'CRUD'
            )
        )
    ),

);