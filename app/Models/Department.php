<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends Model
{
    use HasFactory;
    protected $fillable = ['name']; // Daftar kolom yang dapat diisi secara massal

    // Jika nama tabel Anda bukan "departements", Anda dapat menentukan nama tabel seperti ini:
    protected $table = 'departments';

    // Jika Anda ingin menggunakan timestamp (created_at dan updated_at), tambahkan ini:
    public $timestamps = true;

    // Jika Anda ingin menonaktifkan incrementing primary key (ID), tambahkan ini:
    // public $incrementing = false;

    // Jika primary key bukan kolom "id", tambahkan ini:
    protected $primaryKey = 'id';
    public function karyawan(): HasMany
    {
        return $this->hasMany(Tr_Karyawan::class, 'departments_id');
    }
    public function nilaiKomunikasi()
    {
        return $this->hasMany(Tr_Nilai_Komunikasi::class, 'departments_id');
    }
}
