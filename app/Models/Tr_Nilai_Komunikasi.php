<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tr_Nilai_Komunikasi extends Model
{
    use HasFactory;
    protected $table = 'nilai_komunikasi';

    protected $fillable = [
        'karyawan_id',
        'departments_id',
        // 'indikator_komunikasi_id',
        'tgl_input',
        'nilai_1',
        'nilai_2',
        'nilai_3',
        'status_data_komunikasi',
        'total_nilai_komunikasi',
        'catatan_revisi'
    ];

    public function karyawan()
    {
        return $this->belongsTo(Tr_Karyawan::class, 'karyawan_id');
    }

    public function departments()
    {
        return $this->belongsTo(Department::class, 'departments_id');
    }

    public function indikatorKomunikasi()
    {
        return $this->belongsTo(Tr_Indikator_Komunikasi::class, 'indikator_komunikasi_id');
    }

    // public function hitungRataRataNilai()
    // {
    //     $total = $this->nilai_1 + $this->nilai_2 + $this->nilai_3;
    //     return $total / 3;
    // }

}
