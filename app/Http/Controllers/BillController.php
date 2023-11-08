<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bill;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Client;
use App\Models\Product;

class BillController extends Controller
{
    public function index()
    {
        $bill = Bill::all();
        $user = Auth::user();

        return view('bill.index', [
            'bill' => $bill,
            'user' => $user
        ]);
    }

    public function add()
    {
        $product = Product::all();
        $client = Client::all();

        return view('bill.add', [
            'client' => $client,
            'product' => $product
        ]);
    }

    public function save(Request $request)
    {
        $bill = new Bill();
        $user_id = Auth::user()->id;

        $attendedby = $request->input('attendedby');
        $volume = $request->input('volume');
        $client = $request->input('client');

        $bill->attendedby = $attendedby;
        $bill->volume = $volume;
        $bill->users_id = $user_id;
        $bill->clients_id = $client;

        $bill->save();

        return redirect()->route('bill.index')->with(['message' => 'Factura agregada con correctamente']);
    }

    public function delete($id)
    {
    }
}
