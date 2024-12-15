<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data input
    $nama = isset($_POST['nama']) ? htmlspecialchars($_POST['nama']) : '';
    $tanggal_lahir = isset($_POST['tanggal_lahir']) ? htmlspecialchars($_POST['tanggal_lahir']) : '';
    $telp = isset($_POST['telp']) ? htmlspecialchars($_POST['telp']) : '';
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
    $browserInfo = htmlspecialchars($_SERVER['HTTP_USER_AGENT']);

    // Validasi file upload
    $file = $_FILES['file'] ?? null;
    $fileContent = [];
    
    if ($file && $file['error'] === UPLOAD_ERR_OK) {
        $fileType = mime_content_type($file['tmp_name']);
        $fileSize = $file['size'];
        
        if ($fileType === 'text/plain' && $fileSize <= 1048576) { // File harus .txt dan max 1MB
            $fileContent = file($file['tmp_name'], FILE_IGNORE_NEW_LINES);
        } else {
            die('File tidak valid atau terlalu besar.');
        }
    } else {
        die('Terjadi kesalahan saat mengunggah file.');
    }

    // Simpan data ke sesi
    $_SESSION['data'] = [
        'nama' => $nama,
        'tanggal_lahir' => $tanggal_lahir,
        'telp' => $telp,
        'email' => $email,
        'browserInfo' => $browserInfo,
        'fileContent' => $fileContent,
    ];

    // Redirect ke result.php
    header('Location: result.php');
    exit;
}