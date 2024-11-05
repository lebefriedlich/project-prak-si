<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubKriteriaModel extends Model
{
    use HasFactory;

    protected $table = 'sub_kriteria';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    public $incrementing = true;
    protected $fillable = [
        'kriteria_id',
        'nilai_min',
        'nilai_max',
        'bobot',
        'keterangan'
    ];

    protected $guarded = [
        'id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function kriteria()
    {
        return $this->belongsTo(KriteriaModel::class, 'kriteria_id', 'id');
    }
}
