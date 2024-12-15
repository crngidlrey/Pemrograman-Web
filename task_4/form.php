<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;&display=swap" rel="stylesheet">
    <style>
    body {
        font-family: 'Poppins';
        background-color: #fffdf5;
        margin: 0 auto;
        padding: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .container {
        background: #fffdf5;
        padding: 20px 30px;
        border-radius: 10px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        max-width: 600px;
        width: 100%;
        animation: fadeIn 0.5s ease-in-out;
    }

    h2 {
        text-align: center;
        color: #374375;
        font-weight: 600;
        margin-bottom: 20px;
    }

    label {
        width: 100%;
        text-align: left;
        font-size: 14px;
        font-family:'Poppins';
        font-weight: 600;
        color: #555;
        margin-bottom: 5px;
        display: block;
    }

    input,
    select,
    textarea {
        font-family: 'Poppins';
        width: 100%;
        max-width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 2.5px solid #ddd;
        border-radius: 8px;
        font-size: 14px;
        background: #fffdf5;
        box-sizing: border-box;
        transition: border-color 0.3s, background 0.3s;
    }

    form {
        display: flex;
        flex-direction: column;
    }

    input:focus,
    select:focus,
    textarea:focus {
        border-color: #95b1ee;
        background: #fff;
        outline: none;
    }

    textarea {
        resize: none;
        height: 100px;
    }

    button {
        font-family: 'Poppins';
        width: 100%;
        padding: 12px;
        background: #374375;
        border: none;
        color: white;
        font-size: 16px;
        font-weight: 600;
        border-radius: 8px;
        cursor: pointer;
        transition: transform 0.3s ease, background 0.3s ease;
    }

    button:hover {
        background: #95b1ee;
        color: #fffdf5;
        transform: scale(1.05);
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    </style>
</head>

<body>
    <div class="container">
        <h2>Form Pendaftaran</h2>
        <form id="registrationForm" action="process.php" method="post" enctype="multipart/form-data">
            <label for="nama">Nama Lengkap</label>
            <input type="text" id="nama" name="nama" required minlength="1" maxlength="50"
                placeholder="Masukkan nama lengkap anda">

            <label for="tanggal_lahir">Tanggal Lahir</label>
            <input type="date" id="tanggal_lahir" name="tanggal_lahir" required>

            <label for="telp">Nomor HP</label>
            <input type="number" id="telp" name="telp" required placeholder="Masukkan nomor HP Anda">
                
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required placeholder="Masukkan email Anda">
            
            <label for="file">Upload File</label>
            <input type="file" id="file" name="file" accept=".txt" required>

            <button type="submit">Submit</button>
        </form>
    </div>

    <script>
    document.getElementById('registrationForm').addEventListener('submit', function(event) {
        const fileInput = document.getElementById('file');
        const file = fileInput.files[0];
        if (file) {
            if (file.size > 10485760) { // Max 10 MB
                alert('Ukuran file tidak boleh lebih dari 10 MB.');
                event.preventDefault();
            }
            if (!file.name.endsWith('.txt')) {
                alert('File harus dalam format');
                event.preventDefault();
            }
        }
    });
    </script>
</body>

</html>