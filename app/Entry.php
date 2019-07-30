<?php

namespace App;

use App\Scopes\CurrentUserScope;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Entry
 * @package App
 * @mixin \Eloquent
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

    protected $fillable = ['user_id', 'account_id', 'description', 'value', 'time'];

    protected $dates = ['time'];

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new CurrentUserScope());
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
