<?php
//SIMPLE GRAB API
header('Content-Type: application/json');
function grab($url){
     // inisialisasi pada CURL
     $data = curl_init();
     // setting CURL
     curl_setopt($data, CURLOPT_RETURNTRANSFER, 1);
     curl_setopt($data, CURLOPT_URL, $url);
     // Disini menjalankan CURL untuk membaca isi file
     $hasil = curl_exec($data);
     curl_close($data);
     return $hasil;
}
function data($kecamatan){
     $grab =  grab('https://corona.kuduskab.go.id/');
     $kodeawal = explode('<td style="text-align:left">'.$kecamatan.'</td>',$grab);
     $tampilkan = explode('</tr>',$kodeawal[1]);
     $pecah = explode('<td>',$tampilkan[0]);
     $odp =explode('</td>',$pecah[1]);
     $pdp =explode('</td>',$pecah[2]);
     $negatif =explode('</td>',$pecah[3]);
     $positif =explode('</td>',$pecah[4]);
     $pulang =explode('</td>',$pecah[5]);
     $dirujuk =explode('</td>',$pecah[6]);
     $perawatan=explode('</td>',$pecah[7]);
     $meninggal=explode('</td>',$pecah[8]);
     $hasil["odp"] =intval($odp[0]);
     $hasil["pdp"] =intval($pdp[0]);
     $hasil["negatif"] =intval($negatif[0]);
     $hasil["positif"] =intval($positif[0]);
     $hasil["pulang-sehat"] =intval($pulang[0]);
     $hasil["dirujuk"] =intval($dirujuk[0]);
     $hasil["perawatan"] =intval($perawatan[0]);
     $hasil["meninggal"] =intval($meninggal[0]);

     return $hasil;
}
$akhir["bae"]=data("BAE");
$akhir["dawe"]=data("DAWE");
$akhir["gebog"]=data("GEBOG");
$akhir["jati"]=data("JATI");
$akhir["jekulo"]=data("JEKULO");
$akhir["kaliwungu"]=data("KALIWUNGU");
$akhir["kota"]=data("KOTA KUDUS");
$akhir["mejobo"]=data("MEJOBO");
$akhir["undaan"]=data("UNDAAN");
echo json_encode($akhir);
?>