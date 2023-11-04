<?php
include('koneksi.php'); // Pastikan Anda sudah memasukkan file koneksi.php

// Menerima data JSON dari permintaan POST
$data = json_decode(file_get_contents('php://input'));

if ($data && isset($data->candidateId)) {
    $candidateId = $data->candidateId;

    // Update jumlah suara kandidat
    $updateCandidateQuery = "UPDATE kandidat SET suara = suara + 1 WHERE id = $candidateId";

    if ($koneksi->query($updateCandidateQuery) === TRUE) {
        echo json_encode(array('success' => true));
    } else {
        echo json_encode(array('success' => false));
    }
} else {
    echo json_encode(array('success' => false));
}
?>

