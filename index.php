<?php

interface rumus
{
    public function hitungBangunRuang();
}

class LuasPersegiPanjang implements rumus
{
    public $panjang = 0;
    public $lebar = 0;
    public function hitungBangunRuang()
    {
        return ['Bangun Ruang : ' => 'Luas Persegi Panjang',
               'Panjang : ' => $this->panjang,
               'Lebar : ' => $this->lebar,
               'Luas Persegi Panjang : ' => ($this->panjang * $this->lebar)
        ];
    }
}

class VolumeBola implements rumus
{
    public $jari2 = 0;
    public $phi = 3.14;
    public $empatpertiga = 4/3;
    public function hitungBangunRuang()
    {
        return ['Bangun Ruang : ' => 'Volume Bola',
            'Panjang Jari-jari : ' => $this->jari2,
            'Volume Bola : ' => ($this->empatpertiga * $this->phi * pow($this->jari2,3))
        ];
    }
}

class VolumeKerucut implements rumus
{
    public $jari2 = 0;
    public $phi = 3.14;
    public $sepertiga = 1/3;
    public function hitungBangunRuang()
    {
        return ['Bangun Ruang : ' => 'Volume Kerucut',
            'Panjang Jari-jari: ' => $this->jari2,
            'Tinggi : ' => $this->jari2,
            'Volume Kerucut : ' => ($this->sepertiga * $this->phi * pow($this->jari2,3))
        ];
    }
}

class VolumeKubus implements rumus
{
    public $rusuk = 12;
    public function hitungBangunRuang()
    {
        return ['Bangun Ruang : ' => 'Volume Kubus',
            'Panjang Rusuk: ' => $this->rusuk,
            'Volume Kubus : ' => (pow($this->rusuk,3))
        ];
    }
}

class KelilingLingkaran implements rumus
{
    public $jari2 = 0;
    public $phi = 3.14;
    public $dua = 2;
    public function hitungBangunRuang()
    {
        return ['Bangun Ruang : ' => 'Keliling Lingkaran',
            'Panjang Jari-jari : ' => $this->jari2,
            'Volume Bola : ' => ($this->dua * $this->phi * $this->jari2)
        ];
    }
}

class BangunRuangWorks
{
    public function initializeBangunRuang($opsi,$satuan)
    {
        if ($opsi === 'LuasPersegiPanjang') {
            return new LuasPersegiPanjang();
        }
        if ($opsi === 'Volumebola') {
            return new VolumeBola();
        }
        if ($opsi === 'Volumekerucut') {
            return new VolumeKerucut();
        }
        if ($opsi === 'VolumeKubus') {
            return new VolumeKubus();
        }
        if ($opsi === 'Kelilinglingkaran') {
            return new KelilingLingkaran();
        }

        throw new Exception("tidak ada");
    }
}

$satuan = ['rusuk' => 12, 'panjang'=>0, 'lebar'=>0, 'jari2'=>0];
$opsi = 'VolumeKubus';
$BangunRuangWorks = new BangunRuangWorks();
$bangunRuang = $BangunRuangWorks->initializeBangunRuang($opsi,$satuan);
$tampilkan = $bangunRuang->hitungBangunRuang();
print_r($tampilkan);