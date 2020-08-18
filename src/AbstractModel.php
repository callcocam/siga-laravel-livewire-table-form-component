<?php
/**
 * Created by Claudio Campos.
 * User: callcocam@gmail.com, contato@sigasmart.com.br
 * https://www.sigasmart.com.br
 */
namespace Call;

use Call\Suports\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;

class AbstractModel extends Model
{

    public function getSlugOptions()
    {
        if (is_string($this->slugTo())) {
            if (in_array($this->slugTo(), $this->fillable)) {
                return SlugOptions::create()
                    ->allowDuplicateSlugs()
                    ->generateSlugsFrom($this->slugFrom())
                    ->saveSlugsTo($this->slugTo());
            }
        }
    }


    protected  function slugTo()
    {
        return "slug";
    }

    protected  function slugFrom()
    {
        return 'name';
    }
}