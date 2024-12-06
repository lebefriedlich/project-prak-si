<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubKriteriaModel extends Model
{
    use HasFactory;

    protected $table = 'sub_kriteria';

    protected $fillable = [
        'kriteria_id',
        'nilai_min',
        'nilai_max',
        'bobot',
        'keterangan',
    ];

    public function kriteria()
    {
        return $this->belongsTo(KriteriaModel::class, 'kriteria_id');
    }
}
