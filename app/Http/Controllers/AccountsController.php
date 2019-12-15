<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Accounts;
use Auth;

class AccountsController extends Controller
{
    public function index()
    {
        $accounts = Accounts::all();

        return view('/accounts', [
            'accounts' => $accounts
        ]);
    }

    public function myAccount()
    {
        $id = Auth::user()->id;
        
        $myaccount = Accounts::find($id);

        return view('/myaccount', [
                'myaccount' => $myaccount
            ]);
    }

    public function viewCreateAccount()
    {
        return view('/create_account');
    }

    public function changePassword(Request $request)
    {
        $validatePassword = $request->validate([
            'password' => ['required','bail']
        ]);
    }
}
