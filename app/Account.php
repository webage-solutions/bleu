<?php

namespace App;

use App\Scopes\CurrentUserScope;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
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
 * @property string currency
 * @property float initial_balance
 * @property float balance
 * @property Carbon balance_time
 * @property int bill_close_day - Day of the month when the credit card is closed (just applies to credit cards)
 * @property int bill_due_day - Day of the month when the credit card bill is due (just applies to credit cards)
 * @property Collection|Entry[] entries
 * @property float current_balance
 * @property Collection|Transaction[] deposits
 * @property Collection|Transaction[] withdrawals
 */
class Account extends Model
{
    use SoftDeletes;

    protected $fillable = ['user_id', 'slug', 'description', 'currency', 'initial_balance'];

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new CurrentUserScope());
    }

    public function entries()
    {
        return $this->hasMany(Entry::class);
    }


    public function deposits()
    {
        return $this->hasMany(Transaction::class, 'to_account_id');
    }

    public function withdrawals()
    {
        return $this->hasMany(Transaction::class, 'from_account_id');
    }

    public function getCurrentBalanceAttribute()
    {
        $entriesSum = $this->entries->reduce(function (float $carry, Entry $entry) {
            return $carry + $entry->value;
        }, 0);

        $withdrawals = $this->withdrawals->reduce(function (float $carry, Transaction $transaction) {
            return $carry + $transaction->from_amount;
        }, 0);

        $deposits = $this->deposits->reduce(function (float $carry, Transaction $transaction) {
            return $carry + $transaction->to_amount;
        }, 0);

        return $this->initial_balance + $entriesSum + $deposits - $withdrawals;
    }
}
