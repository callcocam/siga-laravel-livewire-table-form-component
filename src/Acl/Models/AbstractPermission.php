<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call\Acl\Models;

use Call\AbstractModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Call\Acl\Concerns\RefreshesPermissionCache;
use Call\Acl\Contracts\Permission as PermissionContract;

abstract class AbstractPermission extends AbstractModel implements PermissionContract
{
    use RefreshesPermissionCache;

    /**
     * The attributes that are fillable via mass assignment.
     *
     * @var array
     */
    protected $fillable = ['name','name', 'slug','grupo', 'description'];

    /**
     * Create a new Permission instance.
     *
     * @param  array  $attributes
     * @return void
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setTable(config('acl.tables.permissions'));
    }

    /**
     * Permissions can belong to many roles.
     *
     * @return Model
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(config('acl.models.role'))->withTimestamps();
    }

}
