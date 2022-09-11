<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;

class ProductController extends Controller
{

//----------- ADMIN -------------- // 
    public function AuthLogin() {
        $admin_id = session()->get('admin_id');

        if($admin_id) {
            Redirect::to('dasboard');
        } else {
            Redirect::to('admin')->send();
        }
    }

    public function add_product() {
        $this->AuthLogin();
        $cate_product = DB::table('tbl_category_product')->orderBy('category_id', 'asc')->get();
        return view('admin.add_product')->with('cate_product', $cate_product);
    }

    public function all_product() {
        $this->AuthLogin();
        $all_product = DB::table('tbl_product')->join('tbl_category_product', 'tbl_category_product.category_id','=','tbl_product.category_id')->orderBy('tbl_product.product_id', 'asc')->get();
        $manager_product = view('admin.all_product')->with('all_product', $all_product);
        return view('admin-layout')->with('admin.all_product', $manager_product);
    }

    public function unactive_product($product_id) {
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id', $product_id)->update(['product_status'=>0]);
        // Session::put('message', 'An hien thi danh muc thanh cong');
        session()->put('message', 'An hien thi danh muc thanh cong');
        return Redirect::to('all_product');
    }

    public function active_product($product_id) {
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id', $product_id)->update(['product_status'=>1]);
        // Session::put('message', 'An hien thi danh muc thanh cong');
        session()->put('message', 'Hien thi danh muc thanh cong');
        return Redirect::to('all_product');
    }

    public function save_product(Request $request) {
        $this->AuthLogin();
        $data = array();
        
        $get_image = $request->file('product_image');

        if($get_image) {
            foreach($get_image as $file) {
                $data['product_name'] = $request->product_name;
                $data['category_id'] = $request->product_cate   ;
                $data['product_price'] = $request->product_price;
                $data['product_desc'] = $request->product_desc;
                $data['product_status'] = $request->product_status;

                $get_name_image = $file->getClientOriginalName(); 
                $name_image = current(explode('.', $get_name_image));
                $new_image = $name_image.time().'.'.$file->getClientOriginalExtension();
                $file->move('./upload/product', $new_image);
                $data['product_image'] = $new_image;
                DB::table('tbl_product')->insert($data);
            }

            session()->put('message', 'Them san pham thanh cong');
            return Redirect::to('all_product');
        }
        $data['product_image'] = '';
        DB::table('tbl_product')->insert($data);
        session()->put('message', 'Them san pham thanh cong');
        return Redirect::to('all_product');
    }

    public function save_comment(Request $request) {
        $data = array();
        $data['product_id'] = $request->product_id;
        $data['customer_id'] = $request->customer_id;
        $data['comment_content'] = $request->comment_content;

        DB::table('tbl_comment')->insert($data);
        session()->put('message', 'Them san pham thanh cong');
        return Redirect::to('/chi-tiet-san-pham/'.$request->product_id);
    }

    public function save_contact(Request $request) {
        $data = array();
        $data['customer_id'] = $request->customer_id;
        $data['contact_name'] = $request->contact_name;
        $data['contact_title'] = $request->contact_title;
        $data['contact_email'] = $request->contact_email;
        $data['contact_phone'] = $request->contact_phone;
        $data['contact_content'] = $request->contact_content;

        DB::table('tbl_contact')->insert($data);
        session()->put('message', 'Them san pham thanh cong');
        return Redirect::to('contact');
    }

    public function edit_product($product_id) {
        $this->AuthLogin();
        $cate_product = DB::table('tbl_category_product')->orderBy('category_id', 'desc')->get();

        $edit_product = DB::table('tbl_product')->where('product_id', $product_id)->get();
        $manager_product = view('admin.edit_product')->with('edit_product', $edit_product)->with('cate_product', $cate_product);
        return view('admin-layout')->with('admin.edit_product', $manager_product);
        // print_r($cate_product);
    }

    public function update_product(Request $request , $product_id) {
        $this->AuthLogin();
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['category_id'] = $request->product_cate   ;
        $data['product_price'] = $request->product_price;
        $data['product_desc'] = $request->product_desc;
        $data['product_status'] = $request->product_status;
        $get_image = $request->file('product_image');

        if($get_image) {
            $get_name_image = $get_image->getClientOriginalName(); 
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image.time().'.'.$get_image->getClientOriginalExtension();
            $get_image->move('./upload/product', $new_image);
            $data['product_image'] = $new_image;
            DB::table('tbl_product')->where('product_id', $product_id)->update($data);
            session()->put('message', 'Cập nhật sản phẩm thành công');
            return Redirect::to('all_product');
        }
        DB::table('tbl_product')->where('product_id', $product_id)->update($data);
        session()->put('message', 'Cập nhật sản phẩm thành công');
        return Redirect::to('all_product');
    }

    public function delete_product($product_id) {
        $this->AuthLogin();
        
        DB::table('tbl_product')->where('product_id', $product_id)->delete();
        session()->put('message', 'Xoa thanh cong');
        return Redirect::to('all_product');
    }


//----------- DETAIL PRODUCT -------------- // 
    public function detail_product($product_id) {
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderBy('category_id', 'desc')->get();
        $details_product = DB::table('tbl_product')
        ->join('tbl_category_product', 'tbl_category_product.category_id','=','tbl_product.category_id')
        ->where('tbl_product.product_id', $product_id)->get();

        $all_cmt = DB::table('tbl_comment')
        ->join('tbl_customer', 'tbl_customer.customer_id','=','tbl_comment.customer_id')
        ->where('product_id', '=', $product_id)->orderBy('comment_id', 'desc')->get();

        foreach ($details_product as $key => $value) {
            $category_id = $value->category_id;

        }
        $related_product = DB::table('tbl_product')
        ->join('tbl_category_product', 'tbl_category_product.category_id','=','tbl_product.category_id')
        ->where('tbl_category_product.category_id', $category_id)->whereNotIn('tbl_product.product_id', [$product_id])->get();
        
        return view('pages.product.show_detail')->with('category', $cate_product)->with('details_product', $details_product)
        ->with('related',$related_product)->with('all_comment',$all_cmt);
    }
}
