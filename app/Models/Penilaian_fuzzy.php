<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian_fuzzy extends Model
{
    use HasFactory;
    protected $table = 'penilaian_fuzzy';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nilai_kinerja_id',
        'nilai_komunikasi_id',
        'nilai_loyalitas_id',
        'karyawan_id',
        'status',
        'tahun_input_reward',
        'tgl_input',
        'status_ket_kinerja',
        'status_ket_komunikasi',
        'status_ket_loyalitas',
        'defuzzyfikasi'
    ];

    public function karyawan()
    {
        return $this->belongsTo(Tr_Karyawan::class, 'karyawan_id');
    }

    public function nilaiKinerja()
    {
        return $this->belongsTo(Tr_Nilai_Kinerja::class, 'nilai_kinerja_id', 'id');
    }

    //Definisikan relasi dengan tabel nilai_kinerja
    public function nilai_Kinerja()
    {
        return $this->hasMany(Tr_Nilai_Kinerja::class, 'karyawan_id');
    }
    public function nilai_Komunikasi()
    {
        return $this->hasMany(Tr_Nilai_Komunikasi::class, 'karyawan_id');
    }

    public function nilai_Loyalitas()
    {
        return $this->hasMany(Tr_Nilai_Loyalitas::class, 'karyawan_id');
    }


    public function nilaiKomunikasi()
    {
        return $this->belongsTo(Tr_Nilai_Komunikasi::class, 'nilai_komunikasi_id', 'id');
    }

    public function nilaiLoyalitas()
    {
        return $this->belongsTo(Tr_Nilai_Loyalitas::class, 'nilai_loyalitas_id', 'id');
    }

}
