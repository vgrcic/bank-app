<?php

namespace App\Policies;

use App\Bank;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BankPolicy
{
    use HandlesAuthorization;

    public function create(User $user) {
        return $user->admin;
    }

    public function view(User $user, Bank $bank) {
        return true;
    }

    public function update(User $user, Bank $bank) {
    	return $user->admin;
    }

    public function delete(User $user, Bank $bank) {
    	return $user->admin;
    }
    
}
