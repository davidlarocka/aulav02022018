<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Cmgmyr\Messenger\Traits\Messagable;

class User extends Authenticatable
{
    use Messagable;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table= "users";
    protected $fillable = [
        'name','segundo_nombre','primer_apellido','segundo_apellido','rut','genero','direccion','telefono', 'email','type', 'password',
    ];

    /*    public function articulos()
    {
        return $this ->hasMany('App\Articulo');
    }  */

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function img_user()
    {
        return $this ->hasMany('App\img_user');
    }

    public function Admin()
    {
        return $this->type==='admin';
    }
}
