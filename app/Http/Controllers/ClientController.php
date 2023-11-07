<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use App\Models\Account;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $client = Client::all();

        return view('client.index', [
            'client' => $client,
            'user' => $user
        ]);
    }

    public function add()
    {
        $user = Auth::user();
        $client = Client::all();
        $account = Account::all();
        $product = Product::all();

        return view('client.add', [
            'user' => $user,
            'client' => $client,
            'account' => $account,
            'product' => $product
        ]);
    }

    public function save(Request $request)
    {
        $user = Auth::user()->id;
        $client = new Client();

        $name = $request->input('name');
        $address = $request->input('address');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $nick = $request->input('nick');
        $account = $request->input('account');
        $product = $request->input('product');

        $client->fullname = $name;
        $client->address = $address;
        $client->phone = $phone;
        $client->email = $email;
        $client->nick = $nick;
        $client->account_id = $account;
        $client->products_id = $product;
        $client->users_id = $user;

        $client->save();

        return redirect()->route('client.index')->with(['message' => 'Cliente agregado con exito']);
    }

    public function edit($id)
    {
        $client = Client::find($id);
        $account = Account::all();
        $product = Product::all();

        return view('client.edit', [
            'client' => $client,
            'account' => $account,
            'product' => $product
        ]);
    }

    public function update(Request $request, $id)
    {
        $user = Auth::user()->id;
        $client = new Client();

        $name = $request->input('name');
        $address = $request->input('address');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $nick = $request->input('nick');
        $account = $request->input('account');
        $product = $request->input('product');

        $client->fullname = $name;
        $client->address = $address;
        $client->phone = $phone;
        $client->email = $email;
        $client->nick = $nick;
        $client->account_id = $account;
        $client->products_id = $product;

        if ($user == $client->users_id) {
            DB::table('clients')
                ->where('id', $id)
                ->update([
                    'name' => $name,
                    'address' => $address,
                    'phone' => $phone,
                    'email' => $email,
                    'nick' => $nick,
                    'email' => $email,
                    'account_id' => $account,
                    'products_id' => $product
                ]);
        }

        return redirect()->route('client.index')->with(['message' => 'Cliente actualizado con correctamente']);
    }


    public function delete($id)
    {
        $user = Auth::user()->id;
        $client = Client::find($id);

        if ($user == $client->users_id) {
            $client->delete();
        }

        return redirect()->route('client.index')->with(['message' => 'Cliente eliminado con exito']);
    }
}
