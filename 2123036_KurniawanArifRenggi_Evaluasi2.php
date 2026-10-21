<?php
class Kendaraan {
    public $namaKendaraan;
    public $hargaSewaPerHari;

    public function __construct($namaKendaraan, $hargaSewaPerHari) {
        $this->namaKendaraan = $namaKendaraan;
        $this->hargaSewaPerHari = $hargaSewaPerHari;
    }

    public function tampilkanInfo($lamaSewa) {
        echo "Nama : " . $this->namaKendaraan . "\n";
        echo "Harga/Hari : Rp" . $this->hargaSewaPerHari . "\n";
    }
}

class Mobil extends Kendaraan {

    public function tampilkanInfo($lamaSewa) {
        echo "=== DATA MOBIL ===\n";
        echo "Nama : " . $this->namaKendaraan . "\n";
        echo "Harga/Hari : Rp" . $this->hargaSewaPerHari . "\n";
        echo "Lama Sewa : " . $lamaSewa . " hari\n";
        echo "Total Sewa : Rp" . $this->hitungBiayaSewa($lamaSewa) . "\n";
        echo "\n";
    }

    public function hitungBiayaSewa($lamaSewa) {
        return ($this->hargaSewaPerHari * $lamaSewa) + 50000;
    }
}

class Motor extends Kendaraan {

    public function tampilkanInfo($lamaSewa) {
        echo "=== DATA MOTOR ===\n";
        echo "Nama : " . $this->namaKendaraan . "\n";
        echo "Harga/Hari : Rp" . $this->hargaSewaPerHari . "\n";
        echo "Lama Sewa : " . $lamaSewa . " hari\n";
        echo "Total Sewa : Rp" . $this->hitungBiayaSewa($lamaSewa) . "\n";
    }

    public function hitungBiayaSewa($lamaSewa) {
        return ($this->hargaSewaPerHari * $lamaSewa) + 20000;
    }
}

$mobil = new Mobil("Toyota Avanza", 300000);
$motor = new Motor("Honda Vario", 100000);

$lamaSewa = 3;

$mobil->tampilkanInfo($lamaSewa);
$motor->tampilkanInfo($lamaSewa);

?>
