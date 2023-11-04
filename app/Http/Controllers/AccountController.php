<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    public function index()
    {
        $account  = Account::all();
        $user = Auth::user();

        return view('account.index', [
            'account' => $account,
            'user' => $user
        ]);
    }

    public function add()
    {
        return view('account.add');
    }

    public function save(Request $request)
    {
        $account = new Account();
        $user = Auth::user();
        $user_id = $user->id;

        $name = $request->input('name');
        $account->name = $name;
        $account->users_id = $user_id;

        $account->save();

        return redirect()->route('account.index')->with(['message' => 'Cuenta agregada con exito']);
    }

    public function edit($id)
    {
        $account = Account::find($id);

        return view('account.edit', [
            'account' => $account
        ]);
    }

    public function update(Request $request, $id)
    {
        $account = new Account();
        $user = Auth::user();
        $user_id = $user->id;

        $name = $request->input('name');
        $account->name = $name;
        $account->users_id = $user_id;

        if ($user_id == $account->users_id) {
            DB::table('account')
                ->where('id', $id)
                ->update([
                    'name' => $name,
                ]);
        }

        return redirect()->route('account.index')->with(['message' => 'Cuenta actualizada con exito']);
    }

    public function delete($id)
    {
        $user = Auth::user();
        $account = Account::find($id);

        if ($user->id == $account->users_id) {
            $account->delete();
        }

        return redirect()->route('account.index')->with(['message' => 'Cuenta eliminada con exito']);
    }
}
