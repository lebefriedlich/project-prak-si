<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataAlternatifModel extends Model
{
    use HasFactory;

    protected $table = 'data_alternatif';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    public $incrementing = true;
    protected $fillable = [
        'nama',
        'IPK',
        'tes_pemrograman',
        'kemampuan_mengajar',
        'nilai_referensi',
        'kerja_sama'
    ];

    protected $guarded = [
        'id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
