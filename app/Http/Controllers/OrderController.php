<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;
use App\Models\OrderModel;
use App\Models\OrderDetailModel;
use App\Models\ProductModel;

class OrderController extends Controller
{
    public function show_order(Request $request) {
        $cate_product = DB::table('tbl_category_product')
        ->where('category_status', '1')
        ->orderBy('category_id', 'desc')->get(); //Footer

        $customer_id = $request->session()->get('customer_id');
        // $order = DB::table('tbl_order')
        // ->where('customer_id', $customer_id)
        // ->get();

        // $order_by_id = DB::table('tbl_order')->select('order_id')
        // ->where('customer_id', $customer_id)
        // ->get();

        // $result = DB::table('tbl_order')
        // ->join('tbl_order_detail', 'tbl_order_detail.order_id', '=', 'tbl_order.order_id')
        // ->get();
        
        
        // return view('pages.order.show_order')->with('category', $cate_product)
        // ->with('order', $order)->with('result', $result);
        // return $result;

        // $order_detail = DB::table('tbl_order_detail')->where('order_id_code', $order_id_code)->get();
        // $order = DB::table('tbl_order')->where('order_id_code', $order_id_code)->get();

        // foreach($order as $key => $ord) {
        //     $customer_id = $ord->customer_id;
        //     $shipping_id = $ord->shipping_id;
        // }

        $customer = DB::table('tbl_order')->where('customer_id', $customer_id)->orderBy('tbl_order.order_id', 'desc')->get();
        // $customer = DB::table('tbl_order')->where('customer_id', $customer_id)->get();
        // $shipping = DB::table('tbl_shipping')->where('shipping_id', $shipping_id)->first();
            
        // $order_detail = OrderDetailModel::with('product')->where('order_id_code', $order_id_code)->get();
        return view('pages.order.show_order')->with('category', $cate_product)->with('customer', $customer);
        // return $customer;
    }   

    public function manage_order() {
        // $this->AuthLogin();
        $all_order = DB::table('tbl_order')->join('tbl_customer', 'tbl_customer.customer_id','=','tbl_order.customer_id')
        ->select('tbl_order.*', 'tbl_customer.customer_name')
        ->orderBy('tbl_order.order_id', 'desc')->get();
        $manager_order = view('admin.manage')->with('all_order', $all_order);
        return view('admin-layout')->with('admin.manage', $manager_order);
    }

    public function view_order($order_id_code) {
        // $this->AuthLogin();
        // $order_by_id = DB::table('tbl_order')->join('tbl_customer', 'tbl_customer.customer_id','=','tbl_order.customer_id')
        // ->join('tbl_shipping', 'tbl_shipping.shipping_id','=','tbl_order.shipping_id')
        // ->join('tbl_order_detail', 'tbl_order.order_id','=','tbl_order_detail.order_id')
        // ->select('tbl_order.*', 'tbl_customer.*', 'tbl_shipping.*', 'tbl_order_detail.*')->first();
        // $manager_order_by_id = view('admin.view_order')->with('orderby_id', $order_by_id);
        // // return view('admin-layout')->with('admin.view_order', $manager_order_by_id);
        // return $manager_order_by_id;
        $order_detail = DB::table('tbl_order_detail')->where('order_id_code', $order_id_code)->get();
        $order = DB::table('tbl_order')->where('order_id_code', $order_id_code)->get();

        foreach($order as $key => $ord) {
            $customer_id = $ord->customer_id;
            $shipping_id = $ord->shipping_id;
        }
        $customer = DB::table('tbl_customer')->where('customer_id', $customer_id)->first();
        $shipping = DB::table('tbl_shipping')->where('shipping_id', $shipping_id)->first();

        $order_detail = OrderDetailModel::with('product')->where('order_id_code', $order_id_code)->get();
        
        return view('admin.view_order')->with(compact('order_detail', 'customer', 'shipping', 'order_detail'));
        // return $customer_id;
    }

    public function delete_order($order_id_code) {
        DB::table('tbl_order')->where('order_id_code', $order_id_code)->delete();
        DB::table('tbl_order_detail')->where('order_id_code', $order_id_code)->delete();
        session()->put('message', 'Xoa thanh cong');
        return Redirect::to('/don-hang');

    }
    public function change_order_status(Request $req ,$order_id_code) {
        $order_select = DB::table('tbl_order')->where('order_id_code', $order_id_code)->get();
        $data = array();
        $data['order_status'] = $req->change_order_status;
        DB::table('tbl_order')->where('order_id_code', $order_id_code)->update($data);
        return Redirect::to('/manage-order');
    }

    public function cus_detail_order($order_id_code) {
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderBy('category_id', 'desc')->get();

        $order_detail = DB::table('tbl_order_detail')->where('order_id_code', $order_id_code)->get();
        $order = DB::table('tbl_order')->where('order_id_code', $order_id_code)->get();

        foreach($order as $key => $ord) {
            $customer_id = $ord->customer_id;
            $shipping_id = $ord->shipping_id;
        }
        $customer = DB::table('tbl_customer')->where('customer_id', $customer_id)->first();
        $shipping = DB::table('tbl_shipping')->where('shipping_id', $shipping_id)->first();
        $payment = DB::table('tbl_order')->where('order_id_code', $order_id_code)->value('payment_method');

        $order_detail = OrderDetailModel::with('product')->where('order_id_code', $order_id_code)->get();
        // return $payment;
        return view('pages.order.order_detail')->with('order', $order)->with('category', $cate_product)->with('payment', $payment)->with(compact('order_detail', 'customer', 'shipping', 'order_detail'));
    }
}
