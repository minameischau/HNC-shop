<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;

class HomeController extends Controller
{
    public function index() {
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderBy('category_id', 'desc')->get();
        $all_product = DB::table('tbl_product')->where('product_status', '1')->orderBy('product_id', 'desc')->limit(4)->get();

        return view('pages.home')->with('category', $cate_product)->with('all_product', $all_product);
    }

    public function about() {
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderBy('category_id', 'desc')->get();
        $all_product = DB::table('tbl_product')->where('product_status', '1')->orderBy('product_id', 'desc')->limit(4)->get();

        return view('pages.about')->with('category', $cate_product)->with('all_product', $all_product);
    }

    public function contact() {
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderBy('category_id', 'desc')->get();
        $all_product = DB::table('tbl_product')->where('product_status', '1')->orderBy('product_id', 'desc')->limit(4)->get();

        return view('pages.contact')->with('category', $cate_product)->with('all_product', $all_product);
    }

    public function tim_kiem(Request $request) {
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderBy('category_id', 'desc')->get();
        $keyword = $request->keyword_submit;
        $search_product = DB::table('tbl_product')->where('product_name', 'like', '%'.$keyword.'%')->get();

        return view('pages.product.search')->with('category', $cate_product)->with('search_product', $search_product);
    }
}
