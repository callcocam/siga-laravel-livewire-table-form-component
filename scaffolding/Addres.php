<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App;

use Call\AbstractModel;
use Call\Scopes\UuidGenerate;
use Call\Suports\Sluggable\HasSlug;
use Call\Suports\Tenant\BelongsToTenants;

class Addres extends AbstractModel
{
    use UuidGenerate, HasSlug, BelongsToTenants;

    protected $keyType = "string";

    protected $table = 'address';

    public $incrementing = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable =[
        'user_id','name','slug','zip','city','state','country', 'street','district','number','complement','status', 'updated_at','created_at'
    ];

    public function addresable(){

        return $this->morphTo();
    }
}
