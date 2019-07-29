<?php

namespace App;

use App\Scopes\CurrentUserScope;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TagGroup
 * @package App
 * @mixin \Eloquent
 * @property int id
 * @property int user_id
 * @property string slug
 * @property string description
 * @property Tag[]|Collection tags
 * @property Tag[]|Collection leafTags
 *
 */
class TagGroup extends Model
{
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new CurrentUserScope());
    }

    public function tags()
    {
        return $this->hasMany(Tag::class);
    }

    public function leafTags()
    {
        return $this->hasMany(Tag::class)->leaves();
    }

}
