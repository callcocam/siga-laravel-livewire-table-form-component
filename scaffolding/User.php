<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App;

use Call\Acl\Concerns\HasRolesAndPermissions;
use Call\Scopes\UuidGenerate;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, UuidGenerate, HasRolesAndPermissions;

    protected $keyType = "string";

    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type','name','fantasy','email','document','ie','rg','phone','cover','password','status', 'description'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime','cover' => 'array'
    ];

    public function companies(){

        return $this->belongsToMany(Company::class);

    }

    public function company(){

        return $this->belongsTo(Company::class);

    }

    public function address()
    {

        return $this->morphOne(Addres::class, 'addresable')->select(['id', 'name', 'slug', 'zip', 'city', 'state', 'country', 'street', 'district', 'number', 'complement', 'status']);
    }

    public function getAddressAttribute()
    {

        return $this->address()->first();
    }

    public function getAccessAttribute()
    {

        return $this->roles()->pluck(  'id','name');
    }

    public function access()
    {

        return $this->roles();
    }



}
