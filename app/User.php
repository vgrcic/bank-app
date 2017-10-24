<?php

namespace App;

use DB;
use App\Bank;
use App\Transaction;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'admin',
    ];

    protected $casts = [
        'admin' => 'boolean',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setPasswordAttribute($value) {
        $this -> attributes['password'] = bcrypt($value);
    }

    public function accounts($bank = null) {
        if ($bank == null)
            return $this -> hasMany('App\Account')->with('bank');
        return $this -> hasMany('App\Account')
                    -> where('bank_id', ($bank instanceof Bank)? $bank -> id : $bank)->get();
    }

    /**
    * Returns an array of all incoming and outgoing transactions for a User
    *
    * @return array
    */
    public function getTransactionsAttribute() {
        return DB::table('transactions')
                -> leftjoin('accounts as paying', 'transactions.paying_id', '=', 'paying.id')
                -> leftjoin('accounts as receiving', 'transactions.receiving_id', '=', 'receiving.id')
                -> leftjoin('banks as paying_bank', 'paying.bank_id', '=', 'paying_bank.id')
                -> leftjoin('banks as receiving_bank', 'receiving.bank_id', '=', 'receiving_bank.id')
                -> leftjoin('users as payer', 'paying.user_id', '=', 'payer.id')
                -> leftjoin('users as receiver', 'receiving.user_id', '=', 'receiver.id')
                -> where('payer.id', $this -> id)
                -> orWhere('receiver.id', $this -> id)
                -> get(['transactions.id',
                        'paying.id as paying_account_id',
                        'payer.first_name as paying_first',
                        'payer.last_name as paying_last',
                        'paying_bank.id as paying_bank_id',
                        'paying_bank.name as paying_bank_name',
                        'receiving.id as receiving_account_id',
                        'receiver.first_name as receiving_first',
                        'receiver.last_name as receiving_last',
                        'receiving_bank.id as receiving_bank_id',
                        'receiving_bank.name as receiving_bank_name',
                        'transactions.ammount as ammount',
                        'transactions.created_at as created_at']) -> all();
    }

}
