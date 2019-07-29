<?php

namespace App;

use App\Scopes\CurrentUserScope;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Account
 * @package App
 * @mixin \Eloquent
 * @property int id
 * @property int user_id
 * @property string slug
 * @property string description
 * @property float initial_balance
 * @property float balance
 * @property Carbon balance_time
 * @property int bill_close_day - Day of the month when the credit card is closed (just applies to credit cards)
 * @property int bill_due_day - Day of the month when the credit card bill is due (just applies to credit cards)
 * @property Entry[] entries
 */
class Account extends Model
{
    use SoftDeletes;

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new CurrentUserScope());
    }

    public function entries()
    {
        return $this->hasMany(Entry::class);
    }
}
