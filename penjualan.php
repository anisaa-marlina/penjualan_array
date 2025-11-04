<?php
// Commit 1 – Setup awal
$nama_barang = ["Laptop", "Printer", "Scanner", "Mouse", "Keyboard"];
$harga_barang = [7000000, 1500000, 1200000, 150000, 250000];

echo "<h2>-- POLGAN MART --</h2><hr>";

// Commit 2 – Memilih Barang & Jumlah Acak

// Menentukan berapa variasi barang yang dibeli (acak 1–5)
$jumlah_variasi = rand(1, 5);
echo "Jumlah variasi barang dibeli: <b>$jumlah_variasi</b><br><br>";

// Array untuk menampung data pembelian
$barang_dibeli = [];

for ($i = 0; $i < $jumlah_variasi; $i++) {
    // Pilih index acak dari array barang
    $index = rand(0, count($nama_barang) - 1);

    // Jumlah barang dibeli (acak 1–5)
    $jumlah_beli = rand(1, 5);

    // Simpan ke array pembelian
    $barang_dibeli[] = [
        "nama" => $nama_barang[$index],
        "harga" => $harga_barang[$index],
        "jumlah" => $jumlah_beli
    ];
}

// Tampilkan hasil pembelian acak
echo "<table border='1' cellpadding='6' cellspacing='0'>";
echo "<tr><th>No</th><th>Nama Barang</th><th>Harga</th><th>Jumlah</th></tr>";

$no = 1;
foreach ($barang_dibeli as $item) {
    echo "<tr>";
    echo "<td>$no</td>";
    echo "<td>{$item['nama']}</td>";
    echo "<td>Rp " . number_format($item['harga'], 0, ',', '.') . "</td>";
    echo "<td>{$item['jumlah']}</td>";
    echo "</tr>";
    $no++;
}
echo "</table>";
?>
