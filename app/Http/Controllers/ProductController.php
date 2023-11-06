<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::all();
        $user = Auth::user();
        return view('products.index', [
            'product' => $product,
            'user' => $user
        ]);
    }

    public function add()
    {
        $user = Auth::user();

        return view('products.add', [
            'user' => $user
        ]);
    }

    public function save(Request $request)
    {
        $product = new Product();
        $user = Auth::user()->id;

        $name = $request->input('name');
        $type = $request->input('type');
        $color = $request->input('color');
        $stock = $request->input('stock');
        $description = $request->input('description');

        $product->name = $name;
        $product->type = $type;
        $product->color = $color;
        $product->stock = $stock;
        $product->description = $description;
        $product->users_id = $user;

        $product->save();

        return redirect()->route('product.index')->with(['message' => 'Producto agregado con exito']);
    }

    public function edit($id)
    {
        $product = Product::find($id);

        return view('products.edit', [
            'product' => $product
        ]);
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $user = Auth::user();

        $name = $request->input('name');
        $type = $request->input('type');
        $color = $request->input('color');
        $stock = $request->input('stock');
        $description = $request->input('description');

        $product->name = $name;
        $product->type = $type;
        $product->color = $color;
        $product->stock = $stock;
        $product->description = $description;

        if ($user->id == $product->users_id) {
            DB::table('products')
                ->where('id', $id)
                ->update([
                    'name' => $name,
                    'type' => $type,
                    'color' => $color,
                    'stock' => $stock,
                    'description' => $description
                ]);
        }

        return redirect()->route('product.index')->with(['message' => 'Producto actualizado con exito']);
    }

    public function delete($id)
    {
        $product = Product::find($id);
        $user = Auth::user();

        if ($user->id == $product->users_id) {
            $product->delete();
        }

        return redirect()->route('product.index')->with(['message' => 'Producto eliminado con exito']);
    }
}
