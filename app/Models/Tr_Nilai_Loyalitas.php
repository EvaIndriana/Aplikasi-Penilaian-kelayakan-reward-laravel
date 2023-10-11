<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tr_Nilai_Loyalitas extends Model
{
    use HasFactory;
    protected $table = 'nilai_loyalitas';

    protected $fillable = [
        'karyawan_id',
        'departments_id',
        // 'indikator_komunikasi_id',
        'tgl_input',
        'nilai_1',
        'nilai_2',
        'nilai_3',
        'status_data_loyalitas',
        'total_nilai_loyalitas',
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

}
