<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataAlternatifModel extends Model
{
    use HasFactory;

    protected $table = 'data_alternatif';

    protected $fillable = [
        'id_alternatif',
        'id_kriteria',
        'nilai',
    ];

    public function alternatif()
    {
        return $this->belongsTo(AlternatifModel::class, 'id_alternatif');
    }

    public function kriteria()
    {
        return $this->belongsTo(KriteriaModel::class, 'id_kriteria');
    }
}
