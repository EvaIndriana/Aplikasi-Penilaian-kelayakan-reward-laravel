<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tr_Karyawan extends Model
{
    use HasFactory;
    protected $table = 'tr_karyawan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'departments_id',
        'nama_karyawan',
        'email',
        'nik_karyawan',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'no_hp',
        'jenis_kelamin',
        'agama',
        'status',
        'status_pekerjaan',
        'pendidikan',
        'foto',
        'status_aktif_karyawan',
        'tanggal_nonaktif'
    ];

    public function departments()
{
    return $this->belongsTo(Department::class, 'departments_id');
}
    public function nilaiKinerja()
{
    return $this->hasMany(NilaiKinerja::class, 'karyawan_id', 'id');
}

    public function nilaiKomunikasi()
    {
        return $this->hasOne(Tr_Nilai_Komunikasi::class, 'karyawan_id');
    }

    public function nilaiLoyalitas()
    {
        return $this->hasOne(Tr_Nilai_Loyalitas::class, 'karyawan_id');
    }
    public function user()
{
    return $this->belongsTo(User::class);
}

public function karyawan() {
    return $this->belongsTo(Tr_Karyawan::class, 'karyawan_id');
}
public function penilaianFuzzy()
    {
        return $this->hasMany(Penilaian_fuzzy::class, 'karyawan_id');
    }

}
