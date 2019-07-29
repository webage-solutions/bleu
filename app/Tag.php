<?php

namespace App;

use App\Scopes\CurrentUserScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Tag
 * @package App
 * @mixin \Eloquent
 * @property int id
 * @property int user_id
 * @property int tag_group_id
 * @property int parent_id
 * @property string slug
 * @property TagGroup tagGroup
 * @property Tag parent
 * @property Tag[]|Collection children
 * @property Entry[]|Collection entries
 * @property string path
 * @method static Builder leaves()
 */
class Tag extends Model
{
    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new CurrentUserScope());
    }

    public function tagGroup()
    {
        return $this->belongsTo(TagGroup::class);
    }

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id', 'id');
    }

    public function children()
    {
        return $this->hasMany(static::class, 'parent_id', 'id');
    }

    public function entries()
    {
        return $this->belongsToMany(Entry::class);
    }

    public function getPathAttribute()
    {
        return $this->parent === null ? $this->slug : "{$this->parent->path}/{$this->slug}";
    }

    public function scopeLeaves(Builder $query)
    {
        $query->whereDoesntHave('children');
    }
}
