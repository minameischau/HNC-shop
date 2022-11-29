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

class AccountController extends Controller
{
    public function AuthLogin() {
        $admin_id = session()->get('admin_id');

        if($admin_id) {
            Redirect::to('dasboard');
        } else {
            Redirect::to('admin')->send();
        }
    }

    public function all_customers() {
        $this->AuthLogin();
        $all_customers = DB::table('tbl_customer')
        ->orderBy('customer_id', 'desc')->get();
        return view('admin.all_customer')->with('all_customer', $all_customers);
    }
    public function delete_customer($customer_id) {
        $this->AuthLogin();
        
        DB::table('tbl_customer')->where('customer_id', $customer_id)->delete();
        session()->put('message', 'Xoa thanh cong');
        return Redirect::to('all-customer');
    }


    public function all_admins() {
        $this->AuthLogin();
        $all_admins = DB::table('tbl_admin')
        ->orderBy('admin_id', 'desc')->get();
        return view('admin.all_admin')->with('all_admin', $all_admins);
    }

    public function add_admin() {
        $this->AuthLogin();
        return view('admin.add_admin');
    }

    public function save_admin(Request $request) {
        $account_check = $request->admin_email;

        $check = DB::table('tbl_admin')
        ->where('tbl_admin.admin_email', $account_check)
        ->get();
        
        if($check->isEmpty()) {
            $data = array() ;
            $data['admin_name'] = $request->admin_name;
            $data['admin_phone'] = $request->admin_phone;
            $data['admin_email'] = $request->admin_email;
            $data['admin_password'] = md5($request->admin_password);

            // $get_image = $request->file('customer_image');
            // if($get_image) {

                // $get_name_image = $get_image->getClientOriginalName(); 
                // $name_image = current(explode('.', $get_name_image));
                // $new_image = $name_image.time().'.'.$get_image->getClientOriginalExtension();
                // $get_image->move('./upload/avatar', $new_image);
                // $data['customer_image'] = $new_image;
                // DB::table('tbl_admin')->insert($data);

                DB::table('tbl_admin')->insertGetId($data);
                // session()->put('admin_id', $admin_id);
                // session()->put('admin_name', $request->admin_name);
                // session()->put('customer_image', $request->customer_image);
                // return Redirect::to('login-checkout');
            // }
            // $data['customer_image'] = '';

            // $customer_id = DB::table('tbl_admin')->insertGetId($data);
            // session()->put('customer_id', $customer_id);
            // session()->put('admin_name', $request->admin_name);
            // return Redirect::to('/login-checkout');
        }
        // session()->put('message', 'Email da on tai');
        return Redirect::to('/all-admin');
        // return $check->isEmpty();
    }

    public function delete_admin($admin_id) {
        $this->AuthLogin();
        
        DB::table('tbl_admin')->where('admin_id', $admin_id)->delete();
        session()->put('message', 'Xoa thanh cong');
        return Redirect::to('all-admin');
    }

    public function show_profile() {
        $cate_product = DB::table('tbl_category_product')
        ->where('category_status', '1')
        ->orderBy('category_id', 'desc')->get(); //Footer

        $customer_id = session()->get('customer_id');

        $customer = DB::table('tbl_customer')
        ->where('customer_id', $customer_id)->get();

        return view('pages.profile.profile')->with('category', $cate_product)->with('customer', $customer);
    }
    public function edit_profile() {
        $cate_product = DB::table('tbl_category_product')
        ->where('category_status', '1')
        ->orderBy('category_id', 'desc')->get(); //Footer

        $customer_id = session()->get('customer_id');

        $customer = DB::table('tbl_customer')
        ->where('customer_id', $customer_id)->get();

        return view('pages.profile.edit_profile')->with('category', $cate_product)->with('customer', $customer);
    }

    public function save_edit(Request $request) {
        $customer_id = session()->get('customer_id');
        $data = array() ;
        $data['customer_name'] = $request->customer_name;
        $data['customer_phone'] = $request->customer_phone;
        $data['customer_email'] = $request->customer_email;

        $get_image = $request->file('customer_image');
        if($get_image) {

            $get_name_image = $get_image->getClientOriginalName(); 
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image.time().'.'.$get_image->getClientOriginalExtension();
            $get_image->move('./upload/avatar', $new_image);
            $data['customer_image'] = $new_image;
            // DB::table('tbl_customer')->insert($data);

            DB::table('tbl_customer')->where('customer_id', $customer_id)->update($data);
            session()->put('customer_id', $customer_id);
            session()->put('customer_name', $request->customer_name);
            return Redirect::to('/edit_profile');
        }
        $old_image = DB::table('tbl_customer')->where('customer_id', $customer_id)->value('customer_image');
        $data['customer_image'] = $old_image;

        DB::table('tbl_customer')->where('customer_id', $customer_id)->update($data);
        session()->put('customer_id', $customer_id);
        session()->put('customer_name', $request->customer_name);
        return Redirect::to('/edit_profile');
    }

    public function edit_password() {
        $cate_product = DB::table('tbl_category_product')
        ->where('category_status', '1')
        ->orderBy('category_id', 'desc')->get(); //Footer

        $customer_id = session()->get('customer_id');

        $customer = DB::table('tbl_customer')
        ->where('customer_id', $customer_id)->get();

        return view('pages.profile.edit_password')->with('category', $cate_product)->with('customer', $customer);
    }
    public function save_edit_password(Request $request) {
        $customer_id = session()->get('customer_id');
        
        // Check nhập lại mk
        if($request->new_pass != $request->new_pass_2) {
            session()->put('message', 'Nhập lại không chính xác');
            return Redirect::to('/edit_password');
        }

        $db_old_pass = DB::table('tbl_customer')->where('customer_id', $customer_id)->get();

        foreach ($db_old_pass as $key => $db_o_p) {
            // return $db_o_p->customer_password;
            // print_r(md5($request->old_pass));
            if($db_o_p->customer_password != md5($request->old_pass)) {
                session()->put('message', 'Nhập mật khẩu không chính xác');
                return Redirect::to('/edit_password');
            }
        }

        $data = array() ;
        $data['customer_password'] = md5($request->new_pass);
        // $data['old_pass'] = $request->old_pass;
        // $data['new_pass_2'] = $request->new_pass_2;

        // $get_image = $request->file('customer_image');
        // if($get_image) {

            // $get_name_image = $get_image->getClientOriginalName(); 
            // $name_image = current(explode('.', $get_name_image));
            // $new_image = $name_image.time().'.'.$get_image->getClientOriginalExtension();
            // $get_image->move('./upload/avatar', $new_image);
            // $data['customer_image'] = $new_image;
            // DB::table('tbl_customer')->insert($data);

            DB::table('tbl_customer')->where('customer_id', $customer_id)->update($data);
            session()->put('customer_id', $customer_id);
            // session()->put('new_pass', $request->new_pass);
            return Redirect::to('/profile');
        // }
        // $data['customer_image'] = '';

        // DB::table('tbl_customer')->where('customer_id', $customer_id)->update($data);
        // session()->put('customer_id', $customer_id);
        // session()->put('new_pass', $request->new_pass);
        // return Redirect::to('/edit_profile');
    }
}
