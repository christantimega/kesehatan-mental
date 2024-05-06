<?php
// Cek apakah ada data yang dikirimkan melalui metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Periksa apakah semua input diterima dengan benar
    if (isset($_POST["nama"]) && isset($_POST["email"]) && isset($_POST["nomor-telepon"]) && isset($_POST["pesan"])) {
        // Ambil nilai input dari formulir
        $nama = $_POST["nama"];
        $email = $_POST["email"];
        $nomorTelepon = $_POST["nomor-telepon"];
        $pesan = $_POST["pesan"];

        // Di sini Anda dapat menambahkan logika untuk menyimpan data transaksi ke dalam database
        // atau melakukan tindakan lainnya sesuai dengan kebutuhan aplikasi Anda

        // Contoh: Simpan data transaksi ke dalam file teks
        $file = fopen("transaksi_dokter.txt", "a");
        if ($file) {
            fwrite($file, "Nama: $nama\n");
            fwrite($file, "Email: $email\n");
            fwrite($file, "Nomor Telepon: $nomorTelepon\n");
            fwrite($file, "Pesan: $pesan\n\n");
            fclose($file);
        } else {
            echo "Gagal menyimpan data transaksi.";
        }

        // Redirect pengguna ke halaman sukses atau halaman lainnya setelah proses transaksi selesai
        header("Location: transaksi_sukses.php");
        exit();
    } else {
        // Jika ada data yang tidak diterima, berikan pesan kesalahan
        echo "Ada kesalahan dalam pengiriman data transaksi.";
    }
} else {
    // Jika tidak ada data yang dikirimkan melalui metode POST, kembalikan pengguna ke halaman sebelumnya
    header("Location: transaksi_dokter.php");
    exit();
}
?>
