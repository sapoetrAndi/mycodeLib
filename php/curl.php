<?php
$key = 'ea4f22e099a3a014c5dadb5ca0cc92a10aa122197f016296';
$url = 'http://116.203.92.59/api/send_message';
$datas = array();
$nama_reseller = $checkorder['nama_member'];
$telp_member = $checkorder['telp_member'];

if (substr($checkorder['telp_member'], 0, 2) == "62") {
    $telp_member = $checkorder['telp_member'];
} else if (substr($checkorder['telp_member'], 0, 1) == "0") {
    $telp_member = "62" . substr($checkorder['telp_member'], 1);
}

$deskripsi = "Halo $nama_reseller \n\nPaket kamu dengan ID Order: $id_ordernya sudah siap diambil.\nPengambilan bisa dilakukan oleh customer atau reseller dengan menyertakan ID Order kamu.
\nAlamat pengambilan: Jl. Gotong Royong I No.29B, RT.5/RW.2, Ragunan, Kec. Ps. Minggu, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12550\nLink Google Maps: https://goo.gl/maps/LgUxyJES7rf3W379A
\nWaktu Pengambilan:\n- Senin s./d. Jum'at: 11.00 - 17.00 WIB\n- Sabtu: 11.00 - 15.00 WIB\n- Jam istirahat: 15.00 WIB - 16.00 WIB (Tidak ada proses pengambilan paket)
";

$datas = array(
    "phone_no" => $telp_member,
    "key"    => $key,
    "message"  => $deskripsi,
);

$data_string = json_encode($datas);
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_VERBOSE, 0);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
curl_setopt($ch, CURLOPT_TIMEOUT, 360);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt(
    $ch,
    CURLOPT_HTTPHEADER,
    array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($data_string)
    )
);
$res = curl_exec($ch);
$err = curl_error($ch);
curl_close($ch);