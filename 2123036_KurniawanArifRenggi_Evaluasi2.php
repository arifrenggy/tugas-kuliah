<?php
// Evaluasi 2 PBO - Inheritance, Overriding, Polymorphism
// Nama : Kurniawan Arif Renggi
// NIM  : 2123036

// parent class
class Kendaraan {
    public $namaKendaraan;
    public $hargaSewaPerHari;

    public function __construct($namaKendaraan, $hargaSewaPerHari) {
        $this->namaKendaraan = $namaKendaraan;
        $this->hargaSewaPerHari = $hargaSewaPerHari;
    }

    // method yang nanti di-override oleh child class
    public function tampilkanInfo($lamaSewa) {
        echo "Nama Kendaraan  : " . $this->namaKendaraan . "\n";
        echo "Harga Sewa/Hari : Rp" . $this->hargaSewaPerHari . "\n";
    }
}

// child class 1
class Mobil extends Kendaraan {

    // method overriding : versi Mobil
    public function tampilkanInfo($lamaSewa) {
        echo "=== DATA MOBIL ===\n";
        echo "Nama Kendaraan  : " . $this->namaKendaraan . "\n";
        echo "Harga Sewa/Hari : Rp" . $this->hargaSewaPerHari . "\n";
        echo "Lama Sewa       : " . $lamaSewa . " hari\n";
        echo "Total Sewa      : Rp" . $this->hitungBiayaSewa($lamaSewa) . "\n";
        echo "\n";
    }

    public function hitungBiayaSewa($lamaSewa) {
        // mobil ada biaya layanan 50000
        return ($this->hargaSewaPerHari * $lamaSewa) + 50000;
    }
}

// child class 2
class Motor extends Kendaraan {

    // method overriding : versi Motor
    public function tampilkanInfo($lamaSewa) {
        echo "=== DATA MOTOR ===\n";
        echo "Nama Kendaraan  : " . $this->namaKendaraan . "\n";
        echo "Harga Sewa/Hari : Rp" . $this->hargaSewaPerHari . "\n";
        echo "Lama Sewa       : " . $lamaSewa . " hari\n";
        echo "Total Sewa      : Rp" . $this->hitungBiayaSewa($lamaSewa) . "\n";
        echo "\n";
    }

    public function hitungBiayaSewa($lamaSewa) {
        // motor ada biaya layanan 20000
        return ($this->hargaSewaPerHari * $lamaSewa) + 20000;
    }
}

// program utama
echo "SISTEM PENYEWAAN KENDARAAN\n";
echo "===========================\n\n";

$mobil = new Mobil("Toyota Avanza", 300000);
$motor = new Motor("Honda Vario", 100000);

$lamaSewa = 3;

// polymorphism : method sama dipanggil pada object yang berbeda
$mobil->tampilkanInfo($lamaSewa);
$motor->tampilkanInfo($lamaSewa);

?>
