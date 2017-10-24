<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = [
    	'user_id', 'bank_id', 'balance',
    ];

    public function bank() {
    	return $this -> belongsTo('App\Bank');
    }

    public function user() {
    	return $this -> belongsTo('App\User');
    }

    /**
    * Fetches all incoming and outgoing transactions for an account
    *
    * @return array of transactions
    */
    public function transactions() {
        return $this -> hasMany('App\Transaction', 'paying_id')
                    -> orWhere('receiving_id', $this -> id)
                    -> orderBy('created_at')
                    -> get();
    }

}
