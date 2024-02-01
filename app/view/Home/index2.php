<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/phpmvc/public/css/bootstrap.css">
    <title>Daftar Siswa Kelas XI PPLG 1</title>
</head>

<body>

    <h1>DAFTAR SISWA</h1>

    <table class="table">
        <thead>
            <tr>
                <td>no</td>
                <td>nama</td>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($data['tugas'] as $task) {
            ?>
                <tr>
                    <td><?= $task['id_tugas_solo'] ?></td>
                    <td><?= $task['nama_tugas_solo'] ?></td>
                </tr>
            <?php
            }
            ?>
    </table>
    </tbody>
</body>