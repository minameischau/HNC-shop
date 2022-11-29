<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;

class AdminController extends Controller
{
    public function AuthLogin() {
        $admin_id = session()->get('admin_id');

        if($admin_id) {
            Redirect::to('dasboard');
        } else {
            Redirect::to('admin')->send();
        }
    }

    public function index() {
        return view('admin-login');
    }

    public function show_dashboard(Request $req) {
        $this->AuthLogin();
        // $adm_id = $req->

        // Thu nhap
        $order = DB::table('tbl_order')->get();
        $thu_nhap = 0;
        foreach ($order as $ord) {
            $thu_nhap += (int)$ord->order_total;
        }
        $chua_xu_ly = 0;
        foreach ($order as $ord) {
            if($ord->order_status==0 || $ord->order_status==1)
                $chua_xu_ly++;
        }
        $da_giao = 0;
        foreach ($order as $ord) {
            if($ord->order_status==2)
                $da_giao++;
        }

        // Nguoi dung
        $customer = DB::table('tbl_customer')->get();
        $nguoi_dung = 0;
        foreach ($customer as $cus) {
            $nguoi_dung++;
        }
        // admin
        $admin = DB::table('tbl_admin')->get();
        $qtv = 0;
        foreach ($admin as $cus) {
            $qtv++;
        }

        // San pham
        $product = DB::table('tbl_product')->get();
        $san_pham = 0;
        foreach ($product as $cus) {
            $san_pham++;
        }
        
        // San pham
        $category_product = DB::table('tbl_category_product')->get();
        $cate = 0;
        foreach ($category_product as $cus) {
            $cate++;
        }

        return view('admin.dashboard')->with('thu_nhap', $thu_nhap*1000)
            ->with('nguoi_dung', $nguoi_dung)->with('qtv', $qtv)->with('chua_xu_ly', $chua_xu_ly)
            ->with('order', $order)->with('san_pham', $san_pham)->with('da_giao', $da_giao)
            ->with('cate', $cate);
    }

    public function dashboard(Request $request) {
        $admin_email = $request->admin_email;
        $admin_password = md5($request->admin_password);

        $result = DB::table('tbl_admin')->where('admin_email', $admin_email)->where('admin_password', $admin_password)->first();
        if($result) {
            $request->session()->put('admin_name', $result->admin_name);
            $request->session()->put('admin_id', $result->admin_id);
            return Redirect::to('/dashboard');
        } else {
            $request->session()->put('message', 'Email hoặc mật khẩu sai');
            return Redirect::to('/admin');
        }
    }

    public function logout(Request $request) {
        $request->session()->put('admin_name', null);
        $request->session()->put('admin_id', null);
        return Redirect::to('/admin');
    }

    public function all_contacts() {
        $this->AuthLogin();
        $cate_product = DB::table('tbl_category_product')
        ->where('category_status', '1')
        ->orderBy('category_id', 'desc')->get(); //Footer
        $all_contacts = DB::table('tbl_contact')
        ->orderBy('tbl_contact.contact_id', 'desc')->get();
        $manager_contact = view('admin.all_contact')->with('all_contacts', $all_contacts)->with('cate_product', $cate_product);
        
        return view('admin-layout')->with('admin.all_contact', $manager_contact);
    }
}
