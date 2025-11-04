<?php
// Commit 1 – Setup awal
$kode_barang = ["B001", "B002", "B003", "B004", "B005"];
$nama_barang = ["Pensil", "Buku Tulis", "Penghapus", "Pulpen", "Spidol"];
$harga_barang = [2000, 5000, 1500, 3000, 4500];

echo "<h2 style='text-align:center;'>-- POLGAN MART --</h2>";

// Commit 2 – Memilih Barang & Jumlah Acak
$jumlah_variasi = rand(3, 5);
echo "<b>Daftar Barang yang Dibeli:</b><br><br>";

// Array untuk menampung data pembelian
$barang_dibeli = [];

for ($i = 0; $i < $jumlah_variasi; $i++) {
    $index = $i; // ambil urutan sesuai indeks agar tidak duplikat
    $jumlah_beli = rand(1, 10);

    $barang_dibeli[] = [
        "nama" => $nama_barang[$index],
        "harga" => $harga_barang[$index],
        "jumlah" => $jumlah_beli
    ];
}

// Commit 4 – Rapikan tampilan tabel dan tampilkan total belanja
echo "<table border='1' cellpadding='8' cellspacing='0' width='80%' align='center' style='border-collapse:collapse;'>";
echo "<tr style='background-color:#f2f2f2; text-align:center; font-weight:bold;'>
        <td>Nama Barang</td>
        <td>Harga (Rp)</td>
        <td>Jumlah Beli</td>
        <td>Total (Rp)</td>
      </tr>";

$grand_total = 0;
foreach ($barang_dibeli as $item) {
    $total = $item['harga'] * $item['jumlah'];
    $grand_total += $total;

    echo "<tr align='center'>
            <td align='left'>{$item['nama']}</td>
            <td>" . number_format($item['harga'], 0, ',', '.') . "</td>
            <td>{$item['jumlah']}</td>
            <td>" . number_format($total, 0, ',', '.') . "</td>
          </tr>";
}

// Baris grand total
echo "<tr style='font-weight:bold; background-color:#f9f9f9;'>
        <td colspan='3' align='right'>Grand Total</td>
        <td>Rp " . number_format($grand_total, 0, ',', '.') . "</td>
      </tr>";
echo "</table>";

// Garis pemisah dan total belanja
echo "<hr width='80%'>";
echo "<p align='center'><b>Total Belanja Anda:</b> Rp " . number_format($grand_total, 0, ',', '.') . "</p>";

// Pesan penutup
echo "<p align='center'><i>Terima kasih sudah berbelanja di POLGAN MART 💕</i></p>";
?>
