<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table='users';
    protected $primaryKey='id';
    protected $fillable = [
        'id_level','id_petugas','name', 'email', 'password',
    ];

    public $timestamps=true;
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function pegawai()
    {
        return $this->belongsTo(petugas::class,'id_petugas','id');
    }

    public function keuserlevel(){
        return $this->belongsTo(Level::class,'id_level','id');
    }

    public function punyaRule($namaRule){

        if ($this->keuserlevel->level == $namaRule){
            return true;
        }

        return false;
    }
}
