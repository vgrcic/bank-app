<?php

namespace App\Http\Controllers;

use Auth;
use App\Account;
use Validator;
use Illuminate\Http\Request;

class AccountsController extends Controller
{

	public function index() {
		return view('accounts');
	}

	public function adminIndex() {
		return view('admin.accounts');
	}

	public function show(Account $account) {
		return view('account', compact('account'));
	}

	public function delete(Account $account) {
		$account->delete();
		return view('accounts');
	}

	/*
    * Saves a account record after validation
    */
	public function store(Request $request) {
		$validator = $this -> validator($request -> all());
		if ($validator -> fails())
			return redirect('accounts') -> withErrors($validator);
		Account::create([
			'user_id' => Auth::id(),
			'bank_id' => $request -> bank_id,
			'balance' => 0,
		]);
		return view('accounts');
	}

	public function validator(array $data) {
		return Validator::make($data, [
			'bank_id' => 'required|exists:banks,id',
		]);
	}

}
