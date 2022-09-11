<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Arr;

class CheckoutController extends Controller
{
    public function AuthLogin() {
        $admin_id = session()->get('admin_id');

        if($admin_id) {
            Redirect::to('dasboard');
        } else {
            Redirect::to('admin')->send();
        }
    }

    public function login_checkout() {
        // $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderBy('category_id', 'desc')->get();

        return view('pages.checkout.login_checkout');
    }

    public function add_customer(Request $request) {
        $data = array() ;
        $data['customer_name'] = $request->customer_name;
        $data['customer_phone'] = $request->customer_phone;
        $data['customer_email'] = $request->customer_email;
        $data['customer_password'] = md5($request->customer_password);

        $customer_id = DB::table('tbl_customer')->insertGetId($data);
        session()->put('customer_id', $customer_id);
        session()->put('customer_name', $request->customer_name);
        return Redirect::to('/checkout');
    }

    public function checkout() {
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderBy('category_id', 'desc')->get();
// 
        return view('pages.checkout.checkout')->with('category', $cate_product);
    }

    public function signup() {
        return view('pages.checkout.signup');
    }

    public function save_checkout_customer(Request $request) {
        $data = array() ;
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_address'] = $request->shipping_address;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_note'] = $request->shipping_note;

        $shipping_id = DB::table('tbl_shipping')->insertGetId($data);
        session()->put('shipping_id', $shipping_id);
        return Redirect::to('/payment');
    }

    public function payment() {
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderBy('category_id', 'desc')->get();
        return view('pages.checkout.payment')->with('category', $cate_product);
    }

    public function log_out() {
        session()->flush();
        return Redirect::to('/trang-chu');
    }

    public function login_customer(Request $request) {
        $email = $request->account_email;
        $pass = md5($request->account_password);
        $result = DB::table('tbl_customer')->where('customer_email', $email)->where('customer_password', $pass)->first();

        if($result) {
            session()->put('customer_id', $result->customer_id);
            session()->put('customer_name', $result->customer_name);
            return Redirect::to('/');
        } else {
            return Redirect::to('/login-customer');
        }
    }

    public function order_place(Request $request) {

        //insert payment method
        $data = array() ;
        $data['payment_method'] = $request->payment_option;
        $data['payment_status'] = 'Dang cho xu ly';
        $payment_id = DB::table('tbl_payment')->insertGetId($data);

        //insert order method
        $order_data = array() ;
        $order_data['customer_id'] = $request->session()->get('customer_id');
        $order_data['shipping_id'] = $request->session()->get('shipping_id');
        $order_data['payment_id'] = $payment_id;
        $order_data['order_total'] = Cart::total();
        $order_data['order_status'] = 'Dang cho xu ly';
        $order_id = DB::table('tbl_order')->insertGetId($order_data);

        //insert order_detail method
        $content = Cart::content();
        foreach ($content as $v_content) {
            $order_d_data = array() ;
            $order_d_data['order_id'] = $order_id;
            $order_d_data['product_id'] = $v_content->id;
            $order_d_data['product_name'] = $v_content->name;
            $order_d_data['product_price'] = $v_content->price;
            $order_d_data['product_sale_quantity'] = $v_content->qty;
            DB::table('tbl_order_detail')->insert($order_d_data);
        }
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderBy('category_id', 'desc')->get();
        
        if($data['payment_method'] == 1) {
            Cart::destroy();
            return view('pages.checkout.cod')->with('category', $cate_product);
        }
        elseif($data['payment_method'] == 2) {
            
            Cart::destroy();
            echo 'Chuyen khoan';
        }
        
        // return Redirect::to('/payment');
    }

    public function manage_order() {
        $this->AuthLogin();
        $all_order = DB::table('tbl_order')->join('tbl_customer', 'tbl_customer.customer_id','=','tbl_order.customer_id')
        ->select('tbl_order.*', 'tbl_customer.customer_name')
        ->orderBy('tbl_order.order_id', 'desc')->get();
        $manager_order = view('admin.manage')->with('all_order', $all_order);
        return view('admin-layout')->with('admin.manage', $manager_order);
    }

    public function view_order($orderId) {
        $this->AuthLogin();
        $order_by_id = DB::table('tbl_order')->join('tbl_customer', 'tbl_customer.customer_id','=','tbl_order.customer_id')
        ->join('tbl_shipping', 'tbl_shipping.shipping_id','=','tbl_order.shipping_id')
        ->join('tbl_order_detail', 'tbl_order.order_id','=','tbl_order_detail.order_id')
        ->select('tbl_order.*', 'tbl_customer.*', 'tbl_shipping.*', 'tbl_order_detail.*')->first();
        $manager_order_by_id = view('admin.view_order')->with('order_by_id', $order_by_id);
        return view('admin-layout')->with('admin.view_order', $manager_order_by_id);
    }
}
