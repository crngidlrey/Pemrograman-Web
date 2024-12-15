<?php
session_start();

if (!isset($_SESSION['data'])) {
    die('There is no available data! :(');
}

$data = $_SESSION['data'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Respon</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <style>
    body {
        font-family: 'Poppins';
        background: #fffdf5;
        margin: 0;
        padding: 20px;
    }

    .container {
        max-width: 800px;
        margin: auto;
        background: #fffdf5;
        padding: 20px 30px;
        border-radius: 10px;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
    }

    h2 {
        text-align: center;
        font-weight: 600;
        color: #374375;
        margin-bottom: 20px;
    }

    h3{
        text-align: center;
        font-weight: 600;
        color: #374375;
        margin-bottom: 20px;
    }

    table {
        border: 2.5px solid #ddd;
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    th,
    td {
        border: 2.5px solid #ddd;
        padding: 10px;
        text-align: left;
        font-size: 14px;
        word-wrap: break-word;
        max-width: 250px;
        vertical-align: top;
    }

    th {
        background: #374375;
        color: white;
    }

    tr:nth-child(even) {
        background: #fffdf5;
    }

    tr:hover {
        background: #fffdf5;
    }

    td {
        max-width: 500px;
        text-align: justify;
        overflow-wrap: break-word;
        word-wrap: break-word;
        white-space: normal;
        height: auto;
        max-height: 100px;
        overflow-y: auto;
    }

    table td {
        max-width: 500px;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    th {
        background: #374375;
        color: white;
    }

    tr:nth-child(even) {
        background: #fffdf5;
    }

    tr:hover {
        background: #fffdf5;
    }

    .button {
        text-align: center;
    }

    .button a {
        display: inline-block;
        padding: 10px 20px;
        background: #374375;
        color: white;
        text-decoration: none;
        font-size: 14px;
        font-weight: bold;
        border-radius: 5px;
        transition: background 0.3s ease;
    }

    .button a:hover {
        background: #95b1ee;
    }
    </style>
</head>

<body>
    <div class="container">
        <h2>Respon</h2>
        <table>
            <tr>
                <th>Field</th>
                <th>Data</th>
            </tr>
            <tr>
                <td>Nama Lengkap</td>
                <td><?= htmlspecialchars($data['nama']); ?></td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td><?= htmlspecialchars($data['tanggal_lahir']); ?></td>
            </tr>
            <tr>
                <td>Nomor HP</td>
                <td><?= htmlspecialchars($data['telp']); ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?= htmlspecialchars($data['email']); ?></td>
            </tr>
            <tr>
                <td>Browser/Sistem</td>
                <td><?= htmlspecialchars($data['browserInfo']); ?></td>
            </tr>
        </table>

        <h3>Isi File:</h3>
        <table>
            <tr>
                <th>Baris</th>
                <th>Konten</th>
            </tr>
            <?php foreach ($data['fileContent'] as $lineNumber => $line): ?>
            <tr>
                <td><?= $lineNumber + 1; ?></td>
                <td><?= htmlspecialchars($line); ?></td>
            </tr>
            <?php endforeach; ?>
        </table>

        <div class="button">
            <a href="form.php">Back</a>
        </div>
    </div>
</body>

</html>