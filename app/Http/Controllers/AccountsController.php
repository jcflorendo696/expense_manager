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

    public function showCreateAccount()
    {
        return view('/create_account');
    }

    public function createAccount(Request $request)
    {
        $validateNewUser = $request->validate([
            'name'      => ['required'],
            'email'     => ['required', 'unique:users', 'email'],
            'password'  => ['required','string'],
            'role'      => ['required']
        ]);

        DB::table('users')->insert(
            [
                'name'      => $request->name, 
                'email'     => $request->email,
                'password'  => Hash::make($request->password),
                'role'      => $request->role,
                'created_at'=> date("Y-m-d H:i:s"),
                'updated_at'=> date("Y-m-d H:i:s"),
            ]
        );

        return redirect('/accounts');
    }

    public function deleteAccount(Request $request)
    {
        DB::table('users')->where('id','=', $request->btnDelete)->delete();
        return redirect('/accounts');
    }

    public function showUpdateAccountForm(Request $request)
    {
        $user = Accounts::find($request->id);

        return view('/edit_account', ['user' => $user]);
    }

    public function updateAccount(Request $request)
    {
        // $validateNewUser = $request->validate([
        //     'name'      => ['required'],
        //     'email'     => ['required', 'unique:users', 'email'],
        //     'password'  => ['required','string'],
        //     'role'      => ['required']
        // ]);
        //dd($request);

        $user = array(
                'name'  => $request->name,
                'email' => $request->email,
                'role'  => $request->role
            );

        isset($request->password) ? array_push($user, 'password', $request->password ) : null;
        
        $affected = DB::table('users')
                        ->where('id', $request->id)
                        ->update($user);

        return redirect('/accounts');
    }

    /* ----------------------------------------------------------
    *   Members Dashboard 
    * ---------------------------------------------------------*/
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
