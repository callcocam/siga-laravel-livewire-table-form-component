<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App;

use Call\Acl\Models\AbstractRole;
use Call\Scopes\UuidGenerate;
use Call\Suports\Sluggable\HasSlug;

class Role extends AbstractRole
{
    use UuidGenerate, HasSlug;

    protected $keyType = "string";

}
