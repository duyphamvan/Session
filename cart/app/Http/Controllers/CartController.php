<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function storeCart($id)
    {

        $product = Product::find($id);
        $arr = [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'img'  => $product->image,
            'total' => 1
        ];


        Session::push('cart', $arr);
        return redirect()->route('show.cart');
    }
    public function showCart()
    {
        $total =0;
        $carts = Session::get('cart');
        return view('cart', compact('carts','total'));
    }
    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $carts = Session::get('cart');
        foreach ($carts as $key => $item) {
            if ($item['id'] == $product->id) {
                unset($carts[$key]);
            }
        }
        Session::put('cart', $carts);
        //put là tạo 1 session mới và đẩy dữ liệu sau khi thay đổi ở session cũ vào.
        return redirect()->route('show.cart');
    }

    public function deleteAll()
    {
        //Session::get('cart');
        Session::flush();
        return redirect()->route('show.cart');
    }
//    public function update($id)
//    {
//        $product = Product::findOrFail($id);
//        $carts = Session::get('cart');
//        foreach ($carts as $key => $item)
//        {
//            if ($item['id']==$product->id){
//                $item['total']++;
//            }
//        }
//        Session::put('cart', $carts);
//        return redirect()->route('show.cart');
//    }
}
