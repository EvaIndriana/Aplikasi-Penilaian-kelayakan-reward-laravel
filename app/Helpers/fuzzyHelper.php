<?php

namespace App\Helpers;

class fuzzyHelper
{

    // Kinerja
    public static function kinerjaBuruk($kinerja)
    {
        if ($kinerja <= 40) {
            return 1;
        } elseif ($kinerja > 40 && $kinerja <= 70) {
            return (70 - $kinerja) / 30;
        } else {
            return 0;
        }
    }

    public static function kinerjaCukup($kinerja)
    {
        if ($kinerja < 30 || $kinerja > 80) {
            return 0;
        } elseif ($kinerja >= 30 && $kinerja <= 50) {
            return ($kinerja - 30) / 20;
        } elseif ($kinerja > 50 && $kinerja <= 70) {
            return 1;
        } else {
            return (80 - $kinerja) / 10;
        }
    }

    public static function kinerjaBaik($kinerja)
    {
        if ($kinerja >= 70) {
            return 1;
        } elseif ($kinerja > 40 && $kinerja <= 70) {
            return ($kinerja - 40) / 30;
        } else {
            return 0;
        }
    }

    public static function komunikasiBuruk($komunikasi)
    {
        if ($komunikasi <= 40) {
            return 1;
        } elseif ($komunikasi > 40 && $komunikasi <= 70) {
            return (70 - $komunikasi) / 30;
        } else {
            return 0;
        }
    }

    public static function komunikasiCukup($komunikasi)
    {
        if ($komunikasi < 30 || $komunikasi > 80) {
            return 0;
        } elseif ($komunikasi >= 30 && $komunikasi <= 50) {
            return ($komunikasi - 30) / 20;
        } elseif ($komunikasi > 50 && $komunikasi <= 70) {
            return 1;
        } else {
            return (80 - $komunikasi) / 10;
        }
    }

    public static function komunikasiBaik($komunikasi)
    {
        if ($komunikasi >= 70) {
            return 1;
        } elseif ($komunikasi > 40 && $komunikasi <= 70) {
            return ($komunikasi - 40) / 30;
        } else {
            return 0;
        }
    }


    public static function loyalitasBuruk($loyalitas)
    {
        if ($loyalitas <= 40) {
            return 1;
        } elseif ($loyalitas > 40 && $loyalitas <= 70) {
            return (70 - $loyalitas) / 30;
        } else {
            return 0;
        }
    }

    public static function loyalitasCukup($loyalitas)
    {
        if ($loyalitas < 30 || $loyalitas > 80) {
            return 0;
        } elseif ($loyalitas >= 30 && $loyalitas <= 50) {
            return ($loyalitas - 30) / 20;
        } elseif ($loyalitas > 50 && $loyalitas <= 70) {
            return 1;
        } else {
            return (80 - $loyalitas) / 10;
        }
    }

    public static function loyalitasBaik($loyalitas)
    {
        if ($loyalitas >= 70) {
            return 1;
        } elseif ($loyalitas > 40 && $loyalitas <= 70) {
            return ($loyalitas - 40) / 30;
        } else {
            return 0;
        }
    }

    // Implementasi fuzifikasi untuk Loyalitas dan Komunikasi (sama seperti Kinerja)

    // Implementasi fuzifikasi untuk Reward
    public static function rewardTidakLayak($rekomendasi)
    {
        if ($rekomendasi <= 40) {
            return 1;
        } elseif ($rekomendasi > 40 && $rekomendasi <= 70) {
            return (70 - $rekomendasi) / 30;
        } else {
            return 0;
        }
    }

    public static function rewardDipertimbangkan($rekomendasi)
    {
        if ($rekomendasi < 30 || $rekomendasi > 80) {
            return 0;
        } elseif ($rekomendasi >= 30 && $rekomendasi <= 50) {
            return ($rekomendasi - 30) / 20;
        } elseif ($rekomendasi > 50 && $rekomendasi <= 70) {
            return 1;
        } else {
            return (80 - $rekomendasi) / 10;
        }
    }

    public static function rewardLayak($rekomendasi)
    {
        if ($rekomendasi >= 70) {
            return 1;
        } elseif ($rekomendasi > 40 && $rekomendasi <= 70) {
            return ($rekomendasi - 40) / 30;
        } else {
            return 0;
        }
    }
    // public static function getRekomendasi($kinerja, $komunikasi, $loyalitas)
    // {
    //     $kinerjaBuruk = self::kinerjaBuruk($kinerja);
    //     $kinerjaCukup = self::kinerjaCukup($kinerja);
    //     $kinerjaBaik = self::kinerjaBaik($kinerja);

    //     $komunikasiBuruk = self::komunikasiBuruk($komunikasi);
    //     $komunikasiCukup = self::komunikasiCukup($komunikasi);
    //     $komunikasiBaik = self::komunikasiBaik($komunikasi);

    //     $loyalitasBuruk = self::loyalitasBuruk($loyalitas);
    //     $loyalitasCukup = self::loyalitasCukup($loyalitas);
    //     $loyalitasBaik = self::loyalitasBaik($loyalitas);
    //     // Aturan fuzzy
    //     // Implementasikan aturan fuzzy sesuai kebutuhan Anda
    //     // Contoh: Jika kinerja cukup DAN komunikasi baik DAN loyalitas baik, maka layak

    //     if ($kinerjaBuruk && $komunikasiBuruk && $loyalitasBuruk) return "Tidak Layak";
    //     if ($kinerjaBuruk && $komunikasiBuruk && $loyalitasCukup) return "Tidak Layak";
    //     if ($kinerjaBuruk && $komunikasiBuruk && $loyalitasBaik) return "Tidak Layak";
    //     if ($kinerjaBuruk && $komunikasiCukup && $loyalitasBuruk) return "Dipertimbangkan";
    //     if ($kinerjaBuruk && $komunikasiCukup && $loyalitasCukup) return "Dipertimbangkan";
    //     if ($kinerjaBuruk && $komunikasiCukup && $loyalitasBaik) return "Dipertimbangkan";
    //     if ($kinerjaBuruk && $komunikasiBaik && $loyalitasBuruk) return "Dipertimbangkan";
    //     if ($kinerjaBuruk && $komunikasiBaik && $loyalitasCukup) return "Dipertimbangkan";
    //     if ($kinerjaBuruk && $komunikasiBaik && $loyalitasBaik) return "Dipertimbangkan";
    //     if ($kinerjaCukup && $komunikasiBuruk && $loyalitasBuruk) return "Tidak Layak";
    //     if ($kinerjaCukup && $komunikasiBuruk && $loyalitasCukup) return "Tidak Layak";
    //     if ($kinerjaCukup && $komunikasiBuruk && $loyalitasBaik) return "Tidak Layak";
    //     if ($kinerjaCukup && $komunikasiCukup && $loyalitasBuruk) return "Dipertimbangkan";
    //     if ($kinerjaCukup && $komunikasiCukup && $loyalitasCukup) return "Dipertimbangkan";
    //     if ($kinerjaCukup && $komunikasiCukup && $loyalitasBaik) return "Layak";
    //     if ($kinerjaCukup && $komunikasiBaik && $loyalitasBuruk) return "Dipertimbangkan";
    //     if ($kinerjaCukup && $komunikasiBaik && $loyalitasCukup) return "Dipertimbangkan";
    //     if ($kinerjaCukup && $komunikasiBaik && $loyalitasBaik) return "Layak";
    //     if ($kinerjaBaik && $komunikasiBuruk && $loyalitasBuruk) return "Tidak Layak";
    //     if ($kinerjaBaik && $komunikasiBuruk && $loyalitasCukup) return "Tidak Layak";
    //     if ($kinerjaBaik && $komunikasiBuruk && $loyalitasBaik) return "Dipertimbangkan";
    //     if ($kinerjaBaik && $komunikasiCukup && $loyalitasBuruk) return "Dipertimbangkan";
    //     if ($kinerjaBaik && $komunikasiCukup && $loyalitasCukup) return "Layak";
    //     if ($kinerjaBaik && $komunikasiCukup && $loyalitasBaik) return "Layak";
    //     if ($kinerjaBaik && $komunikasiBaik && $loyalitasBuruk) return "Layak";
    //     if ($kinerjaBaik && $komunikasiBaik && $loyalitasCukup) return "Layak";
    //     if ($kinerjaBaik && $komunikasiBaik && $loyalitasBaik) return "Layak";

    //     return "Undefined";  // jika ada kombinasi yang tidak didefinisikan
    // }
//     public static function defuzzification($kinerja, $komunikasi, $loyalitas)
// {
//     // Perhitungan tingkat rekomendasi berdasarkan fuzifikasi
//     $tingkatRekomendasi = [
//         'Tidak Layak' => self::getRekomendasi($kinerja, $komunikasi, $loyalitas) == 'Tidak Layak' ? 1 : 0,
//         'Dipertimbangkan' => self::getRekomendasi($kinerja, $komunikasi, $loyalitas) == 'Dipertimbangkan' ? 1 : 0,
//         'Layak' => self::getRekomendasi($kinerja, $komunikasi, $loyalitas) == 'Layak' ? 1 : 0
//     ];

//     // Menghitung nilai tengah untuk masing-masing tingkat rekomendasi
//     $nilaiTengah = [
//         'Tidak Layak' => (0 + 40) / 2,
//         'Dipertimbangkan' => (30 + 80) / 2,
//         'Layak' => (70 + 100) / 2
//     ];

//     // Menghitung total bobot
//     $totalBobot = 0;
//     foreach ($tingkatRekomendasi as $rekomendasi => $value) {
//         $totalBobot += $nilaiTengah[$rekomendasi] * $value;
//     }

//     // Menghitung total bobot normalisasi
//     $totalBobotNormalisasi = array_sum($tingkatRekomendasi);

//     // Defuzifikasi menggunakan metode Center Average Defuzzifier
//     $defuzzifiedValue = $totalBobot / $totalBobotNormalisasi;

//     return $defuzzifiedValue;
// }




// Contoh penggunaan
// $kinerja = 50; // Ganti dengan nilai kinerja sesuai kebutuhan
// $komunikasi = 60; // Ganti dengan nilai komunikasi sesuai kebutuhan
// $loyalitas = 75; // Ganti dengan nilai loyalitas sesuai kebutuhan

// $defuzzifiedValue = self::defuzzification($kinerja, $komunikasi, $loyalitas);
// echo "Defuzzified Value: $defuzzifiedValue\n";


    // public static function defuzzify($kinerja, $loyalitas, $komunikasi) {
    //     // Anggap sudah ada rekomendasi dari tahap inferensi fuzzy sebelumnya
    //     $rekomendasi = self::getRekomendasi($kinerja, $loyalitas, $komunikasi);

    //     // Menentukan Himpunan Tengah
    //     $tengahTidakLayak = 20 + (40 - 0) / 2;
    //     $tengahDipertimbangkan = 60 + (80 - 30) / 2;
    //     $tengahLayak = 80 + (100 - 70) / 2;

    //     // Menyesuaikan dengan Rekomendasi
    //     $defuzzifiedValue = 0;
    //     switch ($rekomendasi) {
    //         case "Tidak Layak":
    //             $defuzzifiedValue = $tengahTidakLayak;
    //             break;
    //         case "Dipertimbangkan":
    //             $defuzzifiedValue = $tengahDipertimbangkan;
    //             break;
    //         case "Layak":
    //             $defuzzifiedValue = $tengahLayak;
    //             break;
    //         default:
    //             // Handle kondisi undefined
    //             break;
    //     }

    //     return $defuzzifiedValue;
    // }


    }
