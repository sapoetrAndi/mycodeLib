<?php
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