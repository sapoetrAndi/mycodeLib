<?php

// cara query ke DB menggunakan php native (PDO)
$stmt2 = $db_con->prepare("select resi,IFNULL(DATE_ADD(tanggal_kirim, INTERVAL 14 DAY),'NOT SENT') as batas_retur from tb_resi where order_id= :id");
$stmt2->bindParam(":id", $orderid);
$stmt2->execute();
$resi = $stmt2->fetch(PDO::FETCH_ASSOC);


// cara request ke open API menggunakan curl
$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://apiv2.jne.co.id:10205/insert/getdestination",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 300,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "username=ALONA&api_key=07fa43306aae78fbed6e18132bf598df",
    CURLOPT_HTTPHEADER => array(
        "Content-Type: application/x-www-form-urlencoded",
        "Accept: application/json",
        "User-Agent: application/json" 
    ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);


// membuat dir/folder
$folderUpload = "path folder";
$resize_path = "path folder";
# periksa apakah folder tersedia
if (!is_dir($folderUpload)) {
    # jika tidak maka folder harus dibuat terlebih dahulu
    mkdir($folderUpload, 0777, $rekursif = true);
}
if (!is_dir($resize_path)) {
    # jika tidak maka folder harus dibuat terlebih dahulu
    mkdir($resize_path, 0777, $rekursif = true);
}

//untuk mengirim email menggunakan php mailer
$email_agen = $this->session->userdata('email_agen');
$subjectemail = 'Kode OTP Penarikan Deposit !';
$contentemail =  "<center>
<td colspan='2' style='padding:30px;text-align:center'>
<p><span style='font-size:20px'><span style='color:#024668'><strong>Kode OTP Penarikan Deposit Anda</strong></span></span></p>
<p>Ini adalah pesan otomatis dari Dropshipaja.com. Mohon tidak membalas email ini.</p>
<p>Kode OTP Anda telah dibuat.</p>
<p>Kode OTP Anda</p>
<label style='border:1px solid #024668;font-size:30px;padding:10px;border-radius:15px;color:#024668'><strong> " . $otp . " </strong></label>
<p>Kode OTP ini akan habis masa berlakunya dalam waktu <strong style='color:#024668'>1 Jam</strong>.</p>
<p>Masukkan Kode OTP Anda di form yang telah disediakan untuk mengkonfirmasi identitas Anda.</p>
<p>Terima Kasih,<br>Administrator Dropshipaja.com</p>
</td>
</center>";

$sendemail = sendemail($email_agen, $subjectemail, $contentemail);