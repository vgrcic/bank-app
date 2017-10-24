<?php

namespace App;

use DB;
use App\Account;
use App\Transaction;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

	protected $fillable = [
		'paying_id', 'receiving_id', 'ammount',
	];

	public function paying() {
		return $this->belongsTo('App\Account', 'paying_id');
	}

	public function receiving() {
		return $this->belongsTo('App\Account', 'receiving_id');
	}
    
    /**
    * Performs a funds transfer between two accounts
    * Validation should be performed beforehand
    * 
    * @param Account $paying
    * @param Account $receiving
    * @param float $ammount
    * @return void
    */
	public static function transferFunds(Account $paying, Account $receiving, float $ammount) {
		DB::beginTransaction();
		$paying -> update(['balance' => $paying -> balance - $ammount]);
		$receiving -> update(['balance' => $receiving -> balance + $ammount]);
		Transaction::create([
			'paying_id' => $paying -> id,
			'receiving_id' => $receiving -> id,
			'ammount' => $ammount,
		]);
		DB::commit();
	}

}
