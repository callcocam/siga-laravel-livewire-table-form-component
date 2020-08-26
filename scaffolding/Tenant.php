<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App;

use Call\AbstractModel;
use Call\Scopes\UuidGenerate;

class Tenant extends AbstractModel
{
    use UuidGenerate;

    protected $keyType = "string";

    public $incrementing = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'status'
    ];


    public function company()
    {

        return $this->belongsTo(Company::class)->select(['id', 'name','fantasy','slug','email','document','ie','phone','site','cover','status', 'description']);
    }



    public function getAddressAttribute()
    {

        return $this->company()->with('address')->first();
    }

    public function getCompanyAttribute()
    {

        return $this->belongsTo(Company::class)->first();
    }
}
