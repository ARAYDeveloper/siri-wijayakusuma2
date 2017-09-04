<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RumahSakitRujuk extends Model
{
    protected $table="rumah_sakit_rujuks";
    protected $primaryKey="id";
    protected $fillable=["id","nama_rs"];

    public $timestamps=true;
}
