<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\RekamMedis;


class Dokter extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'spesialis'];

    public function rekamMedis()
    {
        return $this->hasMany(RekamMedis::class);
    }

}
