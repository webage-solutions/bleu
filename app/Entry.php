<?php

namespace App;

use App\Scopes\CurrentUserScope;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Entry
 * @package App
 * @property int id
 * @property int user_id
 * @property int account_id
 * @property string description
 * @property float value
 * @property Carbon time
 * @property Account account
 * @property Tag[] tags
 */
class Entry extends Model
{

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(CurrentUserScope::class);
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
