    <?php
    defined('BASEPATH') or exit('No direct script access allowed');

    /*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method

*/




    // backend riri
    // halaman login
    $route['Login'] = 'auth/index';
    // dashboard
    $route['admin/dashboard'] = 'admin/index';
    // lokasi
    $route['admin/lokasi'] = 'admin/lokasi';
    $route['admin/hapus-lokasi/(:any)'] = 'admin/hapus/$1';
    $route['admin/tambah-lokasi'] = 'admin/tambah';
    $route['admin/edit-lokasi/(:any)'] = 'admin/edit/$1';
    // bus
    $route['admin/bus'] = 'admin/bus_index';
    $route['admin/tambah-bus'] = 'admin/tambah_bus';
    $route['admin/edit-bus/(:any)'] = 'admin/edit_bus/$1';
    $route['admin/hapus-bus/(:any)'] = 'admin/hapus_bus/$1';
    //seat
    $route['admin/seat'] = 'admin/seat_index';
    $route['admin/tambah-seat'] = 'admin/tambah_seat';
    $route['admin/hapus-seat/(:any)'] = 'admin/hapus_seat/$1';
    $route['admin/hapus-allseat'] = 'admin/hapus_semua_seat';

    //Kelola Jadwal
    $route['admin/jadwal'] = 'admin/jadwal_index';
    $route['admin/tambah-jadwal'] = 'admin/tambah_jadwal';
    $route['admin/edit-jadwal'] = 'admin/edit_jadwal';
    $route['admin/hapus-jadwal/(:any)'] = 'admin/hapus_jadwal/$1';
    $route['admin/berangkat-jadwal/(:any)'] = 'admin/berangkat_jadwal/$1';
    $route['admin/cetak-jadwal'] = 'admin/printjadwal';
    //Kelola 
    $route['admin/konfirmasi-pembayaran'] = 'admin/pembayaran_index';
    $route['admin/verifikasi-pembayaran/(:any)'] = 'admin/pembayaran_verifikasi/$1';
    //transaksi
    $route['admin/data-transaksi'] = 'admin/datatransaksi_index';
    $route['admin/detail-transaksi/(:any)'] = 'admin/detailtransaksi/$1';
    $route['admin/cetak-Transaksi/(:any)/(:any)'] = 'admin/cetak_transaksi/$1/$2';
    $route['admin/cetakdetail-Transaksi/(:any)'] = 'admin/cetak_detailtransaksi/$1';


    // $route['admin/tambah-jadwal'] = 'admin/tambah_jadwal';
    // $route['admin/edit-jadwal'] = 'admin/edit_jadwal';
    // $route['admin/hapus-jadwal/(:any)'] = 'admin/hapus_jadwal/$1';
    // $route['admin/berangkat-jadwal/(:any)'] = 'admin/berangkat_jadwal/$1';
    // $route['admin/cetak-jadwal'] = 'admin/printjadwal';








    //FRONTEND RIRI
    $route['home'] = 'guest/keHomepage';
    $route['konfirmasi'] = 'guest/konfirmasiPage';
    $route['pembatalan'] = 'guest/pembatalanPage';
    $route['tentang'] = 'guest/keHomeTentang';
    $route['kontak'] = 'guest/keHomeKontak';
    
    $route['Vkalkulator'] = 'guest/keHomeKalkulator';
    $route['cariTiket'] = 'guest/cari_tiket';
    $route['pesan/(:any)'] = 'guest/pesan/$1';
    $route['pesanTiket'] = 'guest/pesanTiket';
    $route['pembayaran'] = 'guest/keHalamanPembayaran';
    $route['printpembayaran'] = 'guest/printpembayaran';
    $route['kirimKonfirmasi'] = 'guest/kirimKonfirmasi';
    $route['print'] = 'guest/print';
    $route['tentang'] = 'guest/keHomeTentang';
    $route['kontak'] = 'guest/keHomeKontak';
    $route['riwayat'] = 'guest/Riwayat';

    $route['PilihSeat'] = 'guest/PilihSeat';

    $route['cekKonfirmasi'] = 'guest/cekKonfirmasi';
    $route['cekPembatalan'] = 'guest/cekPembatalan';
    $route['batalkanTiket'] = 'guest/batalkanTiket';

    $route['default_controller'] = 'guest/keHomepage';
    // $route['default_controller'] = 'frontend';
    $route['404_override'] = '';
    $route['translate_uri_dashes'] = FALSE;
