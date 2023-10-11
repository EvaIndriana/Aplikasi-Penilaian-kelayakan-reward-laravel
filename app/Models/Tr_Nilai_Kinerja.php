<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tr_Nilai_Kinerja extends Model
{
    use HasFactory;
    protected $table = 'nilai_kinerja';
    protected $primaryKey = 'id';
    protected $fillable = [
        'karyawan_id',
        'departments_id',
        'penilaian_fuzzy_id',
        // 'indikator_komunikasi_id',
        'tgl_input',
        'nilai_1',
        'nilai_2',
        'nilai_3',
        'status_data_kinerja',
        'total_nilai_kinerja',
        'catatan_revisi'
    ];

    public function karyawan()
    {
        return $this->belongsTo(Tr_Karyawan::class, 'karyawan_id', 'id');
    }

    public function penilaianFuzzy() {
        return $this->belongsTo(Penilaian_fuzzy::class, 'karyawan_id');
    }

    public function departments()
    {
        return $this->belongsTo(Department::class, 'departments_id','id');
    }

    public function indikatorKinerja()
{
    return $this->belongsTo(Tr_Indikator_Kinerja::class, 'indikator_kinerja_id');
}

}
