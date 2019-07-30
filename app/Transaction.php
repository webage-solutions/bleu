<?php

namespace App;

use App\Scopes\CurrentUserScope;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Transaction
 * @package App
 * @mixin \Eloquent
 * @property int user_id
 * @property int from_account_id
 * @property int to_account_id
 * @property float from_amount
 * @property float to_amount
 * @property Carbon from_time
 * @property Carbon to_time
 * @property string description
 * @property Account from_account
 * @property Account to_account
 */
class Transaction extends Model
{
    protected $fillable = [
        'description', 'user_id', 'from_account_id', 'to_account_id', 'from_amount', 'to_amount', 'from_time', 'to_time'
    ];

    protected $dates = ['from_time', 'to_time'];

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new CurrentUserScope());
    }

    public function from_account()
    {
        return $this->belongsTo(Account::class, 'from_account_id');
    }

    public function to_account()
    {
        return $this->belongsTo(Account::class, 'to_account_id');
    }
}