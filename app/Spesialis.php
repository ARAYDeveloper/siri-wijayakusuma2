<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spesialis extends Model
{
    protected $table='spesialis';
    protected $primaryKey='id';
    protected $fillable=["id","spesialis"];

    public $timestamps=true;

    public function petugas()
    {
        return $this->hasMany(petugas::class,'id_spesialis','id');
    }

}
