<?php

namespace App\Http\Controllers;

use DateTime;
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

    public function all_product(Request $request) {
        $this->AuthLogin();
        $cate_product = DB::table('tbl_category_product')
        ->where('category_status', '1')
        ->orderBy('category_id', 'desc')->get(); //Footer 
        
        

        if($request->sap == 1) {
            $all_product = DB::table('tbl_product')->join('tbl_category_product', 'tbl_category_product.category_id','=','tbl_product.category_id')
            ->where('product_status', '1')
            ->orderBy('product_price', 'desc')->get(); //Footer
        } else if($request->sap == 0) {
            $all_product = DB::table('tbl_product')->join('tbl_category_product', 'tbl_category_product.category_id','=','tbl_product.category_id')
            ->where('product_status', '1')
            ->orderBy('product_price', 'asc')->get(); //Footer
        } else {
            $all_product = DB::table('tbl_product')->join('tbl_category_product', 'tbl_category_product.category_id','=','tbl_product.category_id')
            ->orderBy('tbl_product.product_id', 'desc')->get();
        }
        
        $manager_product = view('admin.all_product')->with('all_product', $all_product)->with('category', $cate_product);
        
        
        return view('admin-layout')->with('admin.all_product', $manager_product);
        // return $cate_product;
    }

    public function show_all_product_by_id_admin($cate_id, Request $request) {
        $this->AuthLogin();
        $cate_product = DB::table('tbl_category_product')
        ->where('category_status', '1')
        ->orderBy('category_id', 'desc')->get(); //Footer
        if($request->sap == 1) {
            $all_product = DB::table('tbl_product')->join('tbl_category_product', 'tbl_category_product.category_id','=','tbl_product.category_id')
            ->where('tbl_product.category_id', $cate_id)
            ->where('product_status', '1')
            ->orderBy('product_price', 'desc')->get(); //Footer
        } else if($request->sap == 0) {
            $all_product = DB::table('tbl_product')->join('tbl_category_product', 'tbl_category_product.category_id','=','tbl_product.category_id')
            ->where('product_status', '1')
            ->where('tbl_product.category_id', $cate_id)
            ->orderBy('product_price', 'asc')->get(); //Footer
        } else {
            $all_product = DB::table('tbl_product')->join('tbl_category_product', 'tbl_category_product.category_id','=','tbl_product.category_id')
            ->where('tbl_product.category_id', $cate_id)
            ->where('product_status', '1')
            ->orderBy('product_id', 'asc')->get(); //Footer
        }
        // return $all_product;
        $manager_product = view('admin.all_product')->with('category', $cate_product)->with('all_product', $all_product);
        
        return view('admin-layout')->with('admin.all_product', $manager_product);
        // return $all_product;
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
        session()->put('message', 'Hiển thị danh mục thành công');
        return Redirect::to('all_product');
    }

    public function save_product(Request $request) {
        $this->AuthLogin();
        $data = array();
        $datalist = array();
        
        $get_image = $request->file('product_image');
        $get_image_list = $request->file('product_image_list');

        if($get_image) {
            $data['product_name'] = $request->product_name;
            $data['category_id'] = $request->product_cate   ;
            $data['product_price'] = $request->product_price;
            $data['product_desc'] = $request->product_desc;
            $data['product_status'] = $request->product_status;

            $get_name_image = $get_image->getClientOriginalName(); 
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image.time().'.'.$get_image->getClientOriginalExtension();
            $get_image->move('./upload/product', $new_image);
            $data['product_image'] = $new_image;
            $id = DB::table('tbl_product')->insertGetId($data);

            foreach($get_image_list as $file) {
                $datalist['product_id'] = $id;

                $get_name_image = $file->getClientOriginalName(); 
                $name_image = current(explode('.', $get_name_image));
                $new_image = $name_image.time().'.'.$file->getClientOriginalExtension();
                $file->move('./upload/product', $new_image);

                $datalist['product_img'] = $new_image;
                DB::table('tbl_product_img')->insert($datalist);
            }

            session()->put('message', 'Them san pham thanh cong');
            return Redirect::to('add_product');
        }
        $data['product_image'] = '';
        DB::table('tbl_product')->insert($data);
        session()->put('message', 'Them san pham thanh cong');
        return Redirect::to('add_product');
    }

    public function save_comment(Request $request) {
        $data = array();
        $data['product_id'] = $request->product_id;
        $data['customer_id'] = $request->customer_id;
        $data['comment_content'] = $request->comment_content;
        $data['comment_time'] = date('H:i:s Y-m-d');

        DB::table('tbl_comment')->insert($data);
        // session()->put('message', 'Them san pham thanh cong');
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
        // session()->put('message', 'Them san pham thanh cong');
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

    public function show_all_product(Request $request) {
        $cate_product = DB::table('tbl_category_product')
        ->where('category_status', '1')
        ->orderBy('category_id', 'desc')->get(); //Footer

        // $all_product = DB::table('tbl_product')
        //     ->where('product_status', '1')
        //     ->orderBy('product_price', 'desc')->get();
        // return $all_product;

        if($request->sap == 1) {
            $all_product = DB::table('tbl_product')
            ->where('product_status', '1')
            ->orderBy('product_price', 'desc')->get(); //Footer
        } else if($request->sap == 0) {
            $all_product = DB::table('tbl_product')
            ->where('product_status', '1')
            ->orderBy('product_price', 'asc')->get(); //Footer
        } else {
            $all_product = DB::table('tbl_product')
            ->where('product_status', '1')->get(); //Footer
        }

        return view('pages.product.show_all_product')->with('all_product', $all_product)->with('category', $cate_product);
        // return $all_product;
    }

    public function show_all_product_by_id($cate_id, Request $request) {
        $cate_product = DB::table('tbl_category_product')
        ->where('category_status', '1')
        ->orderBy('category_id', 'desc')->get(); //Footer
        if($request->sap == 1) {
            $all_product = DB::table('tbl_product')
            ->where('category_id', $cate_id)
            ->where('product_status', '1')
            ->orderBy('product_price', 'desc')->get(); //Footer
        } else if($request->sap == 0) {
            $all_product = DB::table('tbl_product')
            ->where('product_status', '1')
            ->where('category_id', $cate_id)
            ->orderBy('product_price', 'asc')->get(); //Footer
        } else {
            $all_product = DB::table('tbl_product')
            ->where('category_id', $cate_id)
            ->where('product_status', '1')
            ->orderBy('product_id', 'asc')->get(); //Footer
        }
        return view('pages.product.show_all_product')->with('all_product', $all_product)->with('category', $cate_product);
        // return $all_product;
    }
//----------- DETAIL PRODUCT -------------- // 
    public function detail_product($product_id) {
        $cate_product = DB::table('tbl_category_product')
        ->where('category_status', '1')
        ->orderBy('category_id', 'desc')->get(); //Footer

        $details_product = DB::table('tbl_product')
        ->join('tbl_category_product', 'tbl_category_product.category_id','=','tbl_product.category_id')
        ->where('tbl_product.product_id', $product_id)->get();

        $cate_product_by_id = DB::table('tbl_product')->select('category_id')
        ->where('tbl_product.product_id', $product_id)->limit(1)->value('category_id');
        $dvt_by_id = DB::table('tbl_category_product')->select('dvt_id')
        ->where('tbl_category_product.category_id', $cate_product_by_id)->limit(1)->value('dvt_id');
        
        $dvt_name = DB::table('tbl_dvt_detail')
        ->where('tbl_dvt_detail.dvt_id', $dvt_by_id)->get();

        $dvt_type_name = DB::table('tbl_dvt')
        ->where('tbl_dvt.dvt_id', $dvt_by_id)->get();

        //Image relate 
        $related_img = DB::table('tbl_product_img')
        ->where('tbl_product_img.product_id', $product_id)->limit(3)->get();

        //Comment
        $all_cmt = DB::table('tbl_comment')
        ->join('tbl_customer', 'tbl_customer.customer_id','=','tbl_comment.customer_id')
        ->where('product_id', '=', $product_id)->orderBy('comment_id', 'desc')->get();


        //Related
        foreach ($details_product as $key => $value) {
            $category_id = $value->category_id;
        }
        $related_product = DB::table('tbl_product')
        ->join('tbl_category_product', 'tbl_category_product.category_id','=','tbl_product.category_id')
        ->where('tbl_category_product.category_id', $category_id)->whereNotIn('tbl_product.product_id', [$product_id])->get();
        
        return view('pages.product.show_detail')->with('category', $cate_product)->with('details_product', $details_product)->with('related_img', $related_img)
        ->with('related',$related_product)->with('all_comment',$all_cmt)->with('dvt_name',$dvt_name)->with('dvt_type_name',$dvt_type_name);
        return $all_cmt;
    }
}
