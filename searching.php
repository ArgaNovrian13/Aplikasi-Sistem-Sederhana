<?php
require 'read.php';

if (isset($_GET['query'])) {
    $query = $_GET['query'];
    $filteredData = array_filter($hasilDataAll, function($data) use ($query) {
        return stripos($data['firstName'], $query) !== false || stripos($data['lastName'], $query) !== false || stripos($data['jenisKelamin'],$query) !== false || stripos($data['tglLahir'],$query) !== false || stripos($data['alamat'],$query) !== false || stripos($data['no_hp'],$query) !== false;
    });

    echo json_encode(array_values($filteredData));
}

