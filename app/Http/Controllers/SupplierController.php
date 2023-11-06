<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SupplierController extends Controller
{
    public function index()
    {
        $supplier = Supplier::all();
        $user = Auth::user();

        return view('suppliers.index', [
            'user' => $user,
            'supplier' => $supplier
        ]);
    }

    public function add()
    {
        $user = Auth::user();
        return view('suppliers.add', [
            'user' => $user
        ]);
    }

    public function save(Request $request)
    {
        $supplier = new Supplier();
        $user_id = Auth::user()->id;

        $name = $request->input('name');
        $address = $request->input('address');
        $phone = $request->input('phone');
        $email = $request->input('email');

        $supplier->name = $name;
        $supplier->address = $address;
        $supplier->phone = $phone;
        $supplier->email = $email;
        $supplier->users_id = $user_id;

        $supplier->save();

        return redirect()->route('supplier.index')->with(['message' => 'Suplidor agregado con exito']);
    }

    public function edit($id)
    {
        $supplier = Supplier::find($id);

        return view('suppliers.edit', [
            'supplier' => $supplier
        ]);
    }

    public function update(Request $request, $id)
    {

        $supplier = new Supplier();

        $user = Auth::user();
        $user_id = $user->id;

        $name = $request->input('name');
        $address = $request->input('address');
        $phone = $request->input('phone');
        $email = $request->input('email');

        $supplier->address = $address;
        $supplier->phone = $phone;
        $supplier->email = $email;
        $supplier->users_id = $user_id;


        if ($user_id == $supplier->users_id) {
            DB::table('suppliers')
                ->where('id', $id)
                ->update([
                    'name' => $name,
                    'address' => $address,
                    'phone' => $phone,
                    'email' => $email,
                ]);
        }

        return redirect()->route('supplier.index')->with(['message' => 'Suplidor actualizado con exito']);
    }

    public function delete($id)
    {
        $supplier = Supplier::find($id);
        $user = Auth::user();
        $user_id = $user->id;

        if ($user_id == $supplier->users_id) {
            $supplier->delete();
        }

        return redirect()->route('supplier.index')->with(['message' => 'Suplidor eliminado con exito']);
    }
}
