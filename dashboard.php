<?php
// Commit 1 – Rename file menjadi dashboard.php
// File ini menampilkan halaman utama penjualan (dashboard)

// Data barang
$kode_barang = ["B001", "B002", "B003", "B004", "B005"];
$nama_barang = ["Pensil", "Buku Tulis", "Penghapus", "Pulpen", "Spidol"];
$harga_barang = [2000, 5000, 1500, 3000, 4500];

// Styling dan tampilan
echo "
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(135deg, #cfdfff, #f3f7ff);
        margin: 0;
        padding: 40px 0;
        color: #2e3c4f;
    }

    .container {
        width: 85%;
        max-width: 900px;
        margin: auto;
        background: rgba(255, 255, 255, 0.8);
        backdrop-filter: blur(10px);
        border-radius: 16px;
        box-shadow: 0 6px 20px rgba(0,0,0,0.1);
        padding: 30px;
        transition: 0.3s;
    }

    h2 {
        text-align: center;
        background: linear-gradient(90deg, #7ba7ff, #98c0ff);
        color: white;
        padding: 14px 0;
        border-radius: 10px;
        letter-spacing: 1px;
        margin-bottom: 25px;
        box-shadow: 0 3px 10px rgba(0,0,0,0.1);
    }

    table {
        border-collapse: collapse;
        width: 100%;
        border-radius: 10px;
        overflow: hidden;
    }

    th {
        background-color: #e6f0ff;
        color: #334a73;
        font-weight: 600;
        text-transform: uppercase;
        padding: 10px;
    }

    td {
        padding: 10px;
        text-align: center;
        color: #2e3c4f;
    }

    tr:nth-child(even) { background-color: #f8fbff; }
    tr:hover { background-color: #eef5ff; }

    .highlight {
        background-color: #e8f1ff;
        font-weight: bold;
    }

    .discount {
        background-color: #d9e9ff;
        font-weight: bold;
    }

    .totalbayar {
        background-color: #c5ddff;
        font-weight: bold;
        border-bottom: 2px solid #a3c4ff;
    }

    hr {
        border: none;
        border-top: 2px dashed #a3c4ff;
        margin: 30px auto;
        width: 80%;
    }

    .info {
        text-align: center;
        font-size: 16px;
        margin: 8px 0;
    }

    .info b {
        color: #355c99;
    }

    .footer {
        text-align: center;
        font-style: italic;
        color: #4e6b9e;
        margin-top: 15px;
        font-size: 15px;
    }

</style>
";

// Konten utama dashboard
echo "<div class='container'>";
echo "<h2>-- POLGAN MART --</h2>";

$jumlah_variasi = rand(3, 5);
echo "<p style='text-align:center; font-weight:500;'>Daftar Barang yang Dibeli:</p>";

$barang_dibeli = [];
for ($i = 0; $i < $jumlah_variasi; $i++) {
    $jumlah_beli = rand(1, 10);
    $barang_dibeli[] = [
        "kode" => $kode_barang[$i],
        "nama" => $nama_barang[$i],
        "harga" => $harga_barang[$i],
        "jumlah" => $jumlah_beli
    ];
}

echo "<table>";
echo "<tr>
        <th>Kode</th>
        <th>Nama Barang</th>
        <th>Harga (Rp)</th>
        <th>Jumlah Beli</th>
        <th>Total (Rp)</th>
      </tr>";

$grand_total = 0;
foreach ($barang_dibeli as $item) {
    $total = $item['harga'] * $item['jumlah'];
    $grand_total += $total;

    echo "<tr>
            <td>{$item['kode']}</td>
            <td style='text-align:left;'>{$item['nama']}</td>
            <td>" . number_format($item['harga'], 0, ',', '.') . "</td>
            <td>{$item['jumlah']}</td>
            <td>" . number_format($total, 0, ',', '.') . "</td>
          </tr>";
}

// Hitung diskon
if ($grand_total <= 50000) {
    $persen_diskon = 5;
} elseif ($grand_total <= 100000) {
    $persen_diskon = 10;
} else {
    $persen_diskon = 20;
}
$diskon = $grand_total * ($persen_diskon / 100);
$total_bayar = $grand_total - $diskon;

echo "<tr class='highlight'>
        <td colspan='4' align='right'>Grand Total</td>
        <td>Rp " . number_format($grand_total, 0, ',', '.') . "</td>
      </tr>";
echo "<tr class='discount'>
        <td colspan='4' align='right'>Diskon ({$persen_diskon}%)</td>
        <td>Rp " . number_format($diskon, 0, ',', '.') . "</td>
      </tr>";
echo "<tr class='totalbayar'>
        <td colspan='4' align='right'>Total Bayar</td>
        <td>Rp " . number_format($total_bayar, 0, ',', '.') . "</td>
      </tr>";
echo "</table>";

echo "<hr>";
echo "<p class='info'><b>Total Belanja Anda:</b> Rp " . number_format($total_bayar, 0, ',', '.') . "</p>";
echo "<p class='info'>Diskon: Rp " . number_format($diskon, 0, ',', '.') . " ({$persen_diskon}%)</p>";
echo "<p class='footer'>Terima kasih sudah berbelanja di POLGAN MART 💕</p>";
echo "</div>";
?>
