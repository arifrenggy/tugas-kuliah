<?php
/**
 * EVALUASI 2 - PEMROGRAMAN BERORIENTASI OBJEK
 * Inheritance, Method Overriding, dan Polymorphism
 * Studi kasus: Sistem Penyewaan Kendaraan
 *
 * Nama : Kurniawan Arif Renggi
 * NIM  : 2123036
 */

// ============================================================
// PARENT CLASS
// ============================================================
class Kendaraan {
    // Property umum milik semua kendaraan
    public $namaKendaraan;
    public $hargaSewaPerHari;

    // Constructor: dijalankan setiap object dibuat.
    // Child class (Mobil/Motor) mewarisi constructor ini,
    // jadi object child bisa langsung memakai struktur parent.
    public function __construct($namaKendaraan, $hargaSewaPerHari) {
        $this->namaKendaraan  = $namaKendaraan;
        $this->hargaSewaPerHari = $hargaSewaPerHari;
    }

    // Method tampilkanInfo() versi parent (informasi umum)
    public function tampilkanInfo($lamaSewa = null) {
        echo "Nama       : " . $this->namaKendaraan . "\n";
        echo "Harga/Hari : Rp" . number_format($this->hargaSewaPerHari, 0, ',', '.') . "\n";
    }
}

// ============================================================
// CHILD CLASS 1: Mobil
// ============================================================
class Mobil extends Kendaraan {

    // METHOD OVERRIDING: tampilkanInfo() milik Kendaraan
    // ditimpa dengan versi Mobil (informasi khusus mobil).
    public function tampilkanInfo($lamaSewa = null) {
        $lamaSewa = $lamaSewa ?: 0;
        echo "=== DATA MOBIL ===\n";
        parent::tampilkanInfo(); // gunakan bagian struktur milik parent class
        echo "Lama Sewa  : " . $lamaSewa . " hari\n";
        echo "Total Sewa : Rp" . number_format($this->hitungBiayaSewa($lamaSewa), 0, ',', '.') . "\n";
        echo "Catatan    : sudah termasuk biaya layanan mobil Rp50.000\n";
        echo "\n";
    }

    // Perhitungan sewa khusus mobil: dasar + Rp50.000
    public function hitungBiayaSewa($lamaSewa) {
        return ($this->hargaSewaPerHari * $lamaSewa) + 50000;
    }
}

// ============================================================
// CHILD CLASS 2: Motor
// ============================================================
class Motor extends Kendaraan {

    // METHOD OVERRIDING versi Motor
    public function tampilkanInfo($lamaSewa = null) {
        $lamaSewa = $lamaSewa ?: 0;
        echo "=== DATA MOTOR ===\n";
        parent::tampilkanInfo(); // struktur parent dipakai ulang
        echo "Lama Sewa  : " . $lamaSewa . " hari\n";
        echo "Total Sewa : Rp" . number_format($this->hitungBiayaSewa($lamaSewa), 0, ',', '.') . "\n";
        echo "Catatan    : sudah termasuk biaya layanan motor Rp20.000\n";
        echo "\n";
    }

    // Perhitungan sewa khusus motor: dasar + Rp20.000
    public function hitungBiayaSewa($lamaSewa) {
        return ($this->hargaSewaPerHari * $lamaSewa) + 20000;
    }
}

// ============================================================
// PROGRAM UTAMA
// ============================================================

// Membuat object: 1 Mobil dan 1 Motor
$mobil = new Mobil("Toyota Avanza", 300000);
$motor = new Motor("Honda Vario", 100000);

$lamaSewa = 3;

// POLYMORPHISM: method yang sama (tampilkanInfo()) dipanggil
// pada object yang berbeda, hasilnya menyesuaikan class masing-masing.
$mobil->tampilkanInfo($lamaSewa);
$motor->tampilkanInfo($lamaSewa);

?>
