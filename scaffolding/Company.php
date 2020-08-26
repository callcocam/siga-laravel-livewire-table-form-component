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
use Call\Suports\Sluggable\SlugOptions;
use Call\Suports\Tenant\BelongsToTenants;
use Illuminate\Database\Eloquent\Model;

class Company extends  AbstractModel
{

     use UuidGenerate, BelongsToTenants, HasSlug;

     protected $keyType = 'string';
     /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
     protected $fillable = [
         'user_id','name','fantasy','slug','email','document','ie','phone','site','cover','status', 'description'
     ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
      'cover' => 'array'
    ];

    public function address()
    {

        return $this->morphOne(Addres::class, 'addresable')->select(['id', 'name', 'slug', 'zip', 'city', 'state', 'country', 'street', 'district', 'number', 'complement', 'status']);
    }

    public function getAddressAttribute(){
        return $this->address()->first();
    }
}
