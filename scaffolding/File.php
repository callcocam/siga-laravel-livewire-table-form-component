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

class File extends AbstractModel
{
    use UuidGenerate, HasSlug;

    protected $keyType = "string";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','name','status', 'description'
    ];

    protected $casts = [
        'name'=>'array'
    ];

    public function fileable(){

        return $this->morphTo();
    }
}
