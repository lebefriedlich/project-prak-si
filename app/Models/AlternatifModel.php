<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlternatifModel extends Model
{
    use HasFactory;

    protected $table = 'alternatif';

    protected $fillable = [
        'nama',
    ];

    public function dataAlternatif()
    {
        return $this->hasMany(DataAlternatifModel::class, 'id_alternatif');
    }
}
