<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tr_Indikator_Kinerja extends Model
{
    use HasFactory;
    protected $table = 'tr_indikator_kinerja';
    protected $primaryKey = 'id';
    protected $fillable = [
        'indikator_kinerja_1',
        'indikator_kinerja_2',
        'indikator_kinerja_3',
    ];

    public function nilaikinerja()
    {
        return $this->hasMany(Tr_Nilai_Kinerja::class, 'indikator_kinerja_id');
    }
}
