<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tr_Indikator_Komunikasi extends Model
{
    use HasFactory;
    protected $table = 'tr_indikator_komunikasi';
    protected $primaryKey = 'id';
    protected $fillable = [
        'indikator_komunikasi_1',
        'indikator_komunikasi_2',
        'indikator_komunikasi_3',
    ];

    public function nilaiKomunikasi()
    {
        return $this->hasMany(Tr_Nilai_Komunikasi::class, 'indikator_komunikasi_id');
    }

}
