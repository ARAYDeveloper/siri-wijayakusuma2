<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jenisPelayanan extends Model
{
    protected $table = "jenis_pelayanans";
    protected $primaryKey = "id";
    protected $fillable = ['id', 'jenis_pelayanan'];

    public $timestamps = true;

    public function kamar()
    {
        return $this->hasMany(kamar::class, 'id_pelayanan','id');
    }
}
