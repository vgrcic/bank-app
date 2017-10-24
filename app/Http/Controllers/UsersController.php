<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{

	public function index() {
		return view('users');
	}

	public function show(User $user) {
		return view('user', ['u' => $user]);
	}

	public function delete(User $user) {
		$user -> delete();
		return view('users');
	}
	
    public function home() {
    	return view('home');
    }

    public function togglePrivileges(User $user) {
    	$user -> update(['admin' => !$user -> admin]);
    	return redirect('/users');
    } 

}
