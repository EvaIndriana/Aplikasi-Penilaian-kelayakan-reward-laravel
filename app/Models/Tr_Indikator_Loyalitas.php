<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tr_Indikator_Loyalitas extends Model
{
    use HasFactory;
    protected $table = 'tr_indikator_loyalitas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'indikator_loyalitas_1',
        'indikator_loyalitas_2',
        'indikator_loyalitas_3',
    ];

    public function nilaiKomunikasi()
    {
        return $this->hasMany(Tr_Nilai_Komunikasi::class, 'indikator_komunikasi_id');
    }

}
