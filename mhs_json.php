<?php
require 'functions.php';
$sql = "select * from mahasiswa order by nim";
$tampil = mysqli_query($conn, $sql);
if (mysqli_num_rows($tampil) > 0) {
    $no = 1;
    $response = array();
    $response["data"] = array();
    while ($r = mysqli_fetch_array($tampil)) {
        $h['NIM'] = $r['NIM'];
        $h['Nama'] = $r['Nama'];
        $h['Jenis_kelamin'] = $r['Jenis_kelamin'];
        $h['Alamat'] = $r['Alamat'];
        $h['Tanggal lahir'] = $r['Tanggal'];
        array_push($response["data"], $h);
    }
    echo json_encode($response);
} else {
    $response["message"] = "tidak ada data";
    echo json_encode($response);
}