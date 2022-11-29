<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\CategoryModel;

class CategoryController extends Controller
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

    public function add_category_product() {
        $this->AuthLogin();
        return view('admin.add_category');
    }

    public function all_category_product() {
        $this->AuthLogin();
        $all_category_product = DB::table('tbl_category_product')->get();
        $manager_category_product = view('admin.all_category')->with('all_category_product', $all_category_product);
        return view('admin-layout')->with('admin.all_category', $manager_category_product);
    }

    public function unactive_category_product($category_product_id) {
        $this->AuthLogin();
        DB::table('tbl_category_product')->where('category_id', $category_product_id)->update(['category_status'=>0]);
        // Session::put('message', 'An hien thi danh muc thanh cong');
        session()->put('message', 'An hien thi danh muc thanh cong');
        return Redirect::to('all_category_product');
    }

    public function active_category_product($category_product_id) {
        $this->AuthLogin();
        DB::table('tbl_category_product')->where('category_id', $category_product_id)->update(['category_status'=>1]);
        // Session::put('message', 'An hien thi danh muc thanh cong');
        session()->put('message', 'Hien thi danh muc thanh cong');
        return Redirect::to('all_category_product');
    }

    public function save_category(Request $request) {
        $this->AuthLogin();
        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_desc;
        // $data['category_image'] = $request->category_product_image;
        $data['dvt_id'] = $request->dvt_id;
        $data['category_status'] = $request->category_product_status;

        $get_image = $request->file('category_product_image');
        if($get_image) {

            $get_name_image = $get_image->getClientOriginalName(); 
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image.time().'.'.$get_image->getClientOriginalExtension();
            $get_image->move('./upload/cate', $new_image);
            $data['category_image'] = $new_image;
            DB::table('tbl_category_product')->insert($data);

            session()->put('message', 'Them san pham thanh cong');
            return Redirect::to('all_category_product');
        }
        $data['category_image'] = '';
        DB::table('tbl_category_product')->insert($data);
        session()->put('message', 'Them danh muc thanh cong');
        return Redirect::to('/add_category_product');
    }

    public function edit_category_product($category_product_id) {
        $this->AuthLogin();
        $edit_category_product = DB::table('tbl_category_product')->where('category_id', $category_product_id)->get();
        $manager_category_product = view('admin.edit_category')->with('edit_category_product', $edit_category_product);
        return view('admin-layout')->with('admin.edit_category', $manager_category_product);
    }

    public function update_category_product(Request $request , $category_product_id) {
        $this->AuthLogin();
        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['category_desc'] = $request->category_product_desc;

        DB::table('tbl_category_product')->where('category_id', $category_product_id)->update($data);
        session()->put('message', 'Cap nhat thanh cong');
        return Redirect::to('all_category_product');
    }

    public function delete_category_product($category_product_id) {
        $this->AuthLogin();
        
        DB::table('tbl_category_product')->where('category_id', $category_product_id)->delete();
        session()->put('message', 'Xoa thanh cong');
        return Redirect::to('all_category_product');
    }
    
//----------- SHOW CATEGORY PRODUCT-------------- // 
    public function show_category_home($category_id) {
        // $cate_product = DB::table('tbl_product')->select('product_id')
        // ->where('tbl_product.category_id', $category_id)->limit(1)->get(); //[{"product_id":23}]
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')
        ->orderBy('category_id', 'desc')->get();
        $category_by_id = DB::table('tbl_product')
        ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
        ->where('tbl_product.category_id', '=', $category_id)->get();
        $category_name = DB::table('tbl_category_product')
        ->where('tbl_category_product.category_id', $category_id)->limit(1)->get();
        return view('pages.category.show_category')->with('category', $cate_product)
        ->with('category_by_id', $category_by_id)->with('category_name', $category_name);
    }

}
