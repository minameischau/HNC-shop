<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{

    public function UserLogin() {
        $customer_id = session()->get('customer_id');

        if($customer_id) {
            Redirect::to('dasboard');
        } else {
            Redirect::to('admin')->send();
        }
    }

    public function save_cart(Request $request) {
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderBy('category_id', 'desc')->get();
        $productId = $request->product_id_hidden;
        $quantity = $request->quantity;
        $product_info = DB::table('tbl_product')->where('product_id', $productId)->first();
        $size = $request->product_size;
        $name = 'qty'.$productId;
        // return $name;

        if($size==null) {
            $request->session()->put('message', 'Vui lòng chọn kích thước');
            return Redirect::to('/chi-tiet-san-pham/'.$productId);
        }

        $data['id'] = $product_info->product_id;
        $data['qty'] = $quantity;
        $data['name'] = $product_info->product_name;
        $data['price'] = $product_info->product_price;
        $data['weight'] = $product_info->product_price;
        $data['options']['image'] = $product_info->product_image;
        $data['options']['size'] = $size;
        $data['options'][$name] = $quantity;

        Cart::add($data);
        // Cart::destroy();
        return Redirect::to('/show-cart');
        // return $size==null; 1
    }

    public function show_cart(Request $req) {
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderBy('category_id', 'desc')->get();

        return view('pages.cart.show_cart')->with('category', $cate_product);
    }

    public function delete_to_cart($rowId) {
        Cart::update($rowId, 0);
        return Redirect::to('/show-cart');
    }

    public function update_cart_quantity(Request $request) {
       
        
        $product = Cart::content();
        foreach ($product as $key => $pro) {
            // echo $pro->rowId;
            $name = 'qty'.$pro->id;
            $req = $request->$name;

            Cart::update($pro->rowId, $req);
        }
        return Redirect::to('/show-cart');
    }

    public function increaseQty($rowId) {
        $product = Cart::get($rowId);
        $qty = $product->qty + 1;
        return $rowId;
        // Cart::update($rowId, $qty);
    }

    public function decreaseQty($rowId) {
        $product = Cart::get($rowId);
        $qty = $product->qty - 1;
        return $rowId;
        // Cart::update($rowId, $qty);
        // return Redirect::to('/show-cart');

    }
}
