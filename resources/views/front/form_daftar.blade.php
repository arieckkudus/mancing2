<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran Anggota</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.1.7/dist/signature_pad.umd.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

</head>

<body class="bg-light">
    <h1>benarkan agar bisa muncul form daftar anggota,komunitas dan usaha</h1>
    <div style="display: flex; flex-direction: column;">
        <a href="{{ route('form_daftar_individu') }}">daftar individu</a>
        <a href="{{ route('form_daftar_komunitas') }}">daftar komunitas</a>
        <a href="{{ route('form_daftar_usaha') }}">daftar usaha</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
