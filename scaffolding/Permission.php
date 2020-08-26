<?php

namespace App;

use Call\Acl\Models\AbstractPermission;
use Call\Scopes\UuidGenerate;
use Call\Suports\Sluggable\HasSlug;
use Call\Suports\Tenant\BelongsToTenants;
use Illuminate\Database\Eloquent\Model;

class Permission extends AbstractPermission
{

    use UuidGenerate, HasSlug, BelongsToTenants;

    protected $keyType = "string";

}
