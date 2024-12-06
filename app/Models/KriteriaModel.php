<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KriteriaModel extends Model
{
    use HasFactory;

    protected $table = 'kriteria';

    protected $fillable = [
        'nama',
        'tipe',
        'bobot',
    ];

    public function subKriteria()
    {
        return $this->hasMany(SubKriteriaModel::class, 'kriteria_id');
    }

    public function dataAlternatif()
    {
        return $this->hasMany(DataAlternatifModel::class, 'id_kriteria');
    }
}
