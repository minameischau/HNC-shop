<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Arr;
use function PHPUnit\Framework\isEmpty;

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
        $account_check = $request->customer_email;

        $check = DB::table('tbl_customer')
        ->where('tbl_customer.customer_email', $account_check)
        ->get();
        
        if(strlen($request->customer_phone) < 10) {
            session()->put('message', 'Số điện thoại chưa đúng');
            return Redirect::to('/signup');
        }

        if($check->isEmpty()) {
            $data = array() ;
            $data['customer_name'] = $request->customer_name;
            $data['customer_phone'] = $request->customer_phone;
            $data['customer_email'] = $request->customer_email;
            $data['customer_password'] = md5($request->customer_password);

            $get_image = $request->file('customer_image');
            if($get_image) {

                $get_name_image = $get_image->getClientOriginalName(); 
                $name_image = current(explode('.', $get_name_image));
                $new_image = $name_image.time().'.'.$get_image->getClientOriginalExtension();
                $get_image->move('./upload/avatar', $new_image);
                $data['customer_image'] = $new_image;
                // DB::table('tbl_customer')->insert($data);

                $customer_id = DB::table('tbl_customer')->insertGetId($data);
                session()->put('customer_id', $customer_id);
                session()->put('customer_name', $request->customer_name);
                // session()->put('customer_image', $request->customer_image);
                return Redirect::to('login-checkout');
            }
            $data['customer_image'] = '';

            $customer_id = DB::table('tbl_customer')->insertGetId($data);
            session()->put('customer_id', $customer_id);
            session()->put('customer_name', $request->customer_name);
            return Redirect::to('/login-checkout');
        }
        session()->put('message', 'Email đã tồn tại');
        return Redirect::to('/signup');
        // return $check->isEmpty();
    }

    public function checkout(Request $req) {
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderBy('category_id', 'desc')->get();
        $cus_id = $req->session()->get('customer_id');
        $profile = DB::table('tbl_customer')->where('customer_id', $cus_id)->get();
        return view('pages.checkout.checkout')->with('category', $cate_product)->with('profile', $profile);
    }

    public function signup() {
        return view('pages.checkout.signup');
    }

    public function save_checkout_customer(Request $request) {
        
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
            session()->put('message', 'Email hoặc mật khẩu sai');
            return Redirect::to('/login-checkout');
        }
    }

    public function order_place(Request $request) {
        $data_checkout = array() ;
        $data_checkout['shipping_name'] = $request->shipping_name;
        $data_checkout['shipping_address'] = $request->shipping_address;
        $data_checkout['shipping_phone'] = $request->shipping_phone;
        $data_checkout['shipping_email'] = $request->shipping_email;
        $data_checkout['shipping_note'] = $request->shipping_note;

        $shipping_id = DB::table('tbl_shipping')->insertGetId($data_checkout);
        // session()->put('shipping_id', $shipping_id);
        
        $time_code = time();

        //insert payment method
        // $data = array() ;
        // $data['payment_method'] = $request->payment_option;
        // $data['payment_status'] = 'Dang cho xu ly';
        // $payment_id = DB::table('tbl_payment')->insertGetId($data);

        //insert order method
        $order_data = array() ;
        $order_data['customer_id'] = $request->session()->get('customer_id');
        $order_data['shipping_id'] = $shipping_id;
        $order_data['payment_method'] = $request->payment_option;
        $order_data['order_time'] = date('H:i:s d-m-Y');
        $order_data['order_id_code'] = $time_code;
        $order_data['order_total'] = Cart::total();
        $order_data['order_status'] = 0;
        $order_id = DB::table('tbl_order')->insertGetId($order_data);

        //insert order_detail method
        $content = Cart::content();
        foreach ($content as $v_content) {
            $order_d_data = array() ;
            // $order_d_data['order_id'] = $order_id;
            $order_d_data['product_id'] = $v_content->id;
            $order_d_data['order_id_code'] = $time_code;
            $order_d_data['product_name'] = $v_content->name;
            $order_d_data['product_price'] = $v_content->price;
            $order_d_data['product_sale_quantity'] = $v_content->qty;
            DB::table('tbl_order_detail')->insert($order_d_data);
        }
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderBy('category_id', 'desc')->get();
        
        // if($order_data['payment_method'] == 1) {
            Cart::destroy();
            return view('pages.checkout.cod')->with('category', $cate_product);
        // }
        // elseif($order_data['payment_method'] == 2) {
            
        //     Cart::destroy();
        //     echo 'Chuyen khoan';
        // }
        
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
        $manager_order_by_id = view('admin.view_order')->with('orderby_id', $order_by_id);
        // return view('admin-layout')->with('admin.view_order', $manager_order_by_id);
        return $manager_order_by_id;
    }
}
