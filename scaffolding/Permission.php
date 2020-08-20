<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace App;

use Call\Acl\Models\AbstractPermission;
use Call\Scopes\UuidGenerate;
use Call\Suports\Sluggable\HasSlug;
use Illuminate\Database\Eloquent\Model;

class Permission extends AbstractPermission
{

    use UuidGenerate, HasSlug;

    protected $keyType = "string";

}
