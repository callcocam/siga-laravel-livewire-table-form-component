<?php

namespace App;

use Call\Acl\Models\AbstractRole;
use Call\Scopes\UuidGenerate;
use Call\Suports\Sluggable\HasSlug;
use Call\Suports\Tenant\BelongsToTenants;

class Role extends AbstractRole
{
    use UuidGenerate, HasSlug, BelongsToTenants;

    protected $keyType = "string";

}
