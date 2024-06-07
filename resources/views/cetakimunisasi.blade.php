<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Imunisasi</title>
    {{-- <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet"> --}}
    <style>

    *{
            margin: 0;
            padding: 0;
            font-family: "Poppins", sans-serif;
            box-sizing: border-box;
        }
        .container {
            width: 85%;
            margin: 0 auto;
        }
        .header {
            text-align: center;
            margin: 20px 0 60px 0;
        }
        .header h1 {
            font-size: 24px;
            margin: 0;
        }
        .header h2 {
            font-size: 20px;
            color: #FF5A7C;
            margin: 0;
        }

        .header h2 span{
            color: #908A94;
        }

        .date {
            margin: 20px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        table, th, td {
            border: 2px solid white;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            border-radius: 4px;
            background-color: #FF5A7C;
            color: white;
        }
        .footer {
            margin-top: 40px;
            text-align: right;
        }
        .footer div {
            
        }

        .halo{
            margin-bottom: 60px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>LAPORAN IMUNISASI</h1>
            <h2>Si<span>Posyandu</span></h2>
        </div>
        <div class="date">
            <strong>Tanggal:</strong> __________________
        </div>
        <table>
            <tr>
                <th>ID</th>
                <th>Nama Bayi</th>
                <th>Jenis Vitamin</th>
                <th>Jenis Imunisasi</th>
                <th>Keterangan</th>
            </tr>
            <tr>
                <td>1</td>
                <td>ilmanisma</td>
                <td>VITAMIN A</td>
                <td>IMUNISASI B</td>
                <td>SEHAT. LANCAR</td>
            </tr>
        </table>
        <div class="footer">
            <div>TTD APOTEKER Menyetujui</div>
            <div class="halo">Jember, __________________</div>
            <div>a. n. __________________</div>
        </div>
    </div>
</body>
</html>
