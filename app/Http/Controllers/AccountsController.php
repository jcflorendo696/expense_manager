<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Accounts;
use Auth;
use DB;
use Illuminate\Support\Facades\Hash;

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

    public function createAccount(Request $request)
    {
        $validateNewUser = $request->validate([
            'name'      => ['required'],
            'email'     => ['required'],
            'password'  => ['required'],
            'role'      => ['required']
        ]);

        DB::table('users')->insert(
            [
                'name'      => $request->name, 
                'email'     => $request->email,
                'password'  => $request->password,
                'role'      => $request->role
            ]
        );

        return redirect('/accounts');
    }

    public function deleteAccount(Request $request)
    {
        DB::table('users')->where('id','=', $request->btnDelete)->delete();
        return redirect('/accounts');
    }

    public function updateAccount(Request $request)
    {
        
    }

    public function changePassword(Request $request)
    {
        $validatePassword = $request->validate([
            'password' => ['required','bail']
        ]);
        
        
        $affected = DB::table('users')
                        ->where('id', Auth::user()->id)
                        ->update(['password'=> Hash::make($request->password)]);
        
        Auth::logout();

        $notif = $request->session()->flash('status','Password changed successfully.');

        return redirect('/', [ 
                "message" => $notif
        ]);
    }
}
