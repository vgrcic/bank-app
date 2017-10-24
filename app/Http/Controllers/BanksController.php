<?php

namespace App\Http\Controllers;

use Auth;
use App\Bank;
use Validator;
use Illuminate\Http\Request;

class BanksController extends Controller
{

    public function index() {
    	return view('banks');
    }

    public function show(Bank $bank) {
        $accounts = Auth::user() -> accounts($bank);
    	return view('bank', compact('bank', 'accounts'));
    }

    public function edit(Bank $bank) {
    	return view('banks', ['edit' => $bank]);
    }

    public function delete(Bank $bank) {
        $bank -> delete();
        return view('banks');
    }

    /**
    * Updates a bank record after validation
    */
    public function update(Bank $bank, Request $request) {
    	$validator = $this -> validator($request -> all());
    	if ($validator -> fails())
    		return redirect('/banks') -> withErrors($validator);
    	$bank -> update($request -> all());
    	return view('banks');
    }

    /*
    * Saves a bank record after validation
    */
    public function store(Request $request) {
    	$validator = $this -> validator($request -> all());
    	if ($validator -> fails()) 
    		return redirect('/banks') -> withErrors($validator);
   		Bank::create($request -> all());
   		return view('banks');
    }


    public function validator(array $data) {

        $rules = [
            'name' => 'required|min:3',
        ];

        $messages = [
            'required' => 'The :attribute is required.',
            'min' => 'The :attribute must be at least 3 characters long.',
        ];

    	return Validator::make($data, $rules, $messages);
    }

}
