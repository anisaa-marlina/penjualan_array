<?php
// Commit 1 – Setup awal
$nama_barang = ["Laptop", "Printer", "Scanner", "Mouse", "Keyboard"];
$harga_barang = [7000000, 1500000, 1200000, 150000, 250000];

echo "<h2>-- POLGAN MART --</h2><hr>";

// Commit 2 – Memilih Barang & Jumlah Acak
$jumlah_variasi = rand(1, 5);
echo "Jumlah variasi barang dibeli: <b>$jumlah_variasi</b><br><br>";

// Array untuk menampung data pembelian
$barang_dibeli = [];

for ($i = 0; $i < $jumlah_variasi; $i++) {
    $index = rand(0, count($nama_barang) - 1);
    $jumlah_beli = rand(1, 5);

    $barang_dibeli[] = [
        "nama" => $nama_barang[$index],
        "harga" => $harga_barang[$index],
        "jumlah" => $jumlah_beli
    ];
}

// Commit 3 – Tambahkan total per barang & grand total
echo "<table border='1' cellpadding='6' cellspacing='0'>";
echo "<tr>
        <th>No</th>
        <th>Nama Barang</th>
        <th>Harga</th>
        <th>Jumlah</th>
        <th>Total</th>
      </tr>";

$no = 1;
$grand_total = 0;

foreach ($barang_dibeli as $item) {
    // Hitung total per barang
    $total = $item['harga'] * $item['jumlah'];

    // Tambahkan ke grand total
    $grand_total += $total;

    echo "<tr>";
    echo "<td>$no</td>";
    echo "<td>{$item['nama']}</td>";
    echo "<td>Rp " . number_format($item['harga'], 0, ',', '.') . "</td>";
    echo "<td>{$item['jumlah']}</td>";
    echo "<td>Rp " . number_format($total, 0, ',', '.') . "</td>";
    echo "</tr>";

    $no++;
}

// Tampilkan Grand Total
echo "<tr style='font-weight:bold; background-color:#f2f2f2;'>
        <td colspan='4' align='right'>Grand Total</td>
        <td>Rp " . number_format($grand_total, 0, ',', '.') . "</td>
      </tr>";

echo "</table>";
?>
