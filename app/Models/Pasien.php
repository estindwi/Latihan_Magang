<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\RekamMedis;

class Pasien extends Model
{
    use HasFactory;
    protected $table = 'pasiens'; 

    protected $fillable = [
        'nik',
        'nama',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'no_hp'
    ];

    public function rekamMedis()
    {
        return $this->hasMany(RekamMedis::class);
    }

}
