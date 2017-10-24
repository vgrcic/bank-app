<?php

namespace App\Http\Controllers;

use Auth;
use Log;
use Validator;
use App\Account;
use App\Transaction;
use Illuminate\Http\Request;

class TransactionsController extends Controller
{
    
	public function index() {
		return view('transactions');
	}

	public function adminIndex() {
		return view('admin.transactions');
	}

	public function show(Transaction $transaction) {
		return view('transaction', compact('transaction'));
	}

	/**
	* Performs and persists a transaction
	*
	* @param Paying account $paying
	* @param Transaction request $request
	*/
	public function store(Account $paying, Request $request) {
		if ($this -> validator($paying, $request->all())) {
			$receiving = Account::find($request -> receiving);
			$ammount = (float) $request -> ammount;
			Transaction::transferFunds($paying, $receiving, $ammount);
		}
		return redirect('/accounts/' . $paying -> id);
	}

	/**
	* Checks if the paying account has enough funds and if the receiving account exists
	*
	* @param Paying account $paying
	* @param Transaction request $data
	* @return boolean
	*/
	public function validator($paying, $data) {
		$validator = Validator::make($data, [
			'receiving' => 'required|integer|exists:accounts,id',
			'ammount' => 'required|numeric|min:0',
		]);
		$hasFunds = $paying->balance >= (float) $data['ammount'];

		if ($validator->fails() || !$hasFunds)
			return false;
		return true;
	}

}
