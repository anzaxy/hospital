<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Pendaftaran</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            padding: 20px;
        }
        .header {
            text-align: center;
            border-bottom: 3px solid #1a8a8a;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }
        .header h1 {
            color: #1a8a8a;
            margin: 0;
            font-size: 24px;
        }
        .header p {
            margin: 5px 0;
            color: #666;
            font-size: 14px;
        }
        .header h3 {
            margin: 10px 0 5px;
            color: #333;
        }
        .stat-box {
            display: inline-block;
            margin: 10px 15px;
            padding: 10px 25px;
            background: #f0f8f8;
            border-radius: 8px;
            text-align: center;
            min-width: 100px;
        }
        .stat-box .number {
            color: #1a8a8a;
            font-size: 24px;
            font-weight: bold;
        }
        .stat-box .label {
            color: #666;
            font-size: 12px;
            margin-top: 3px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 11px;
        }
        table th {
            background: #1a8a8a;
            color: white;
            padding: 10px 8px;
            text-align: left;
            border: 1px solid #1a8a8a;
        }
        table td {
            padding: 8px;
            border: 1px solid #ddd;
        }
        table tr:nth-child(even) {
            background: #f9f9f9;
        }
        .badge-pending {
            background: #f0ad4e;
            color: white;
            padding: 2px 10px;
            border-radius: 3px;
            font-size: 10px;
        }
        .badge-sukses {
            background: #5cb85c;
            color: white;
            padding: 2px 10px;
            border-radius: 3px;
            font-size: 10px;
        }
        .badge-gagal {
            background: #d9534f;
            color: white;
            padding: 2px 10px;
            border-radius: 3px;
            font-size: 10px;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            color: #999;
            font-size: 11px;
            border-top: 1px solid #ddd;
            padding-top: 15px;
        }
        .footer .date {
            color: #666;
        }
    </style>
</head>
<body>

<div class="header">
    <h1>RUMAH SAKIT SEHAT SEJAHTERA</h1>
    <p>Jl. Kesehatan No. 123, Jakarta | Telp: (021) 1234-5678 | Email: info@rssehat.com</p>
    <h3>LAPORAN PENDAFTARAN PASIEN</h3>
    <p>Periode: <?= date('d F Y'); ?></p>
</div>

<div style="text-align: center; margin: 15px 0;">
    <div class="stat-box">
        <div class="number"><?= $statistik['total']; ?></div>
        <div class="label">Total Pendaftaran</div>
    </div>
    <div class="stat-box">
        <div class="number"><?= $statistik['pending']; ?></div>
        <div class="label">Pending</div>
    </div>
    <div class="stat-box">
        <div class="number"><?= $statistik['disetujui']; ?></div>
        <div class="label">Disetujui</div>
    </div>
    <div class="stat-box">
        <div class="number"><?= $statistik['ditolak']; ?></div>
        <div class="label">Ditolak</div>
    </div>
</div>

<table>
    <thead>
        <tr>
            <th width="5%">No</th>
            <th width="18%">Nama Pasien</th>
            <th width="18%">Dokter</th>
            <th width="15%">Spesialis</th>
            <th width="12%">Tanggal</th>
            <th width="10%">Jam</th>
            <th width="12%">Status</th>
        </tr>
    </thead>
    <tbody>
        <?php if (count($pendaftaran) > 0): 
            $no = 1;
            foreach ($pendaftaran as $p): ?>
        <tr>
            <td style="text-align: center;"><?= $no++; ?></td>
            <td><?= $p->nama_lengkap; ?></td>
            <td><?= $p->nama_dokter; ?></td>
            <td><?= $p->spesialis; ?></td>
            <td><?= date('d-m-Y', strtotime($p->tanggal_kunjungan)); ?></td>
            <td><?= substr($p->jam_kunjungan, 0, 5); ?></td>
            <td>
                <?php if ($p->status == 'pending'): ?>
                    <span class="badge-pending">Pending</span>
                <?php elseif ($p->status == 'disetujui'): ?>
                    <span class="badge-sukses">Disetujui</span>
                <?php else: ?>
                    <span class="badge-gagal">Ditolak</span>
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; 
        else: ?>
        <tr>
            <td colspan="7" style="text-align: center;">Belum ada data</td>
        </tr>
        <?php endif; ?>
    </tbody>
</table>

<div class="footer">
    <p>Dicetak pada: <?= date('d F Y H:i:s'); ?></p>
    <p class="date">&copy; <?= date('Y'); ?> Rumah Sakit Sehat Sejahtera - All Rights Reserved</p>
</div>

</body>
</html>