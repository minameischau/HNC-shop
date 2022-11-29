@extends('admin-layout')
@section('admin-content')
    <h1>Cập nhật sản phẩm</h1>

    <?php
        $message = Session::get('message');
        if($message) {
            echo '<span style="padding: 16px; color: red;">'.$message.'</span>';
            session()->put('message', null);
        }
    ?>

    @foreach ($edit_product as $key => $pro)
        <form action="{{ URL::to('/update_product/'.$pro->product_id)}}" method="POST" enctype="multipart/form-data">

            {{ csrf_field() }}

            <div class="row">
                <div class="col-8">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Tên sản phẩm</label>
                        <input name="product_name" type="text" class="form-control" 
                            value="{{$pro->product_name}}" id="exampleFormControlInput1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Mô tả sản phẩm</label>
                        <textarea name="product_desc" class="form-control" style="resize: none" 
                        id="exampleFormControlTextarea1" rows="3">{{$pro->product_desc}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput3" class="form-label">Giá sản phẩm</label>
                        <input name="product_price" type="" class="form-control" 
                        value="{{$pro->product_price}}" id="exampleFormControlInput3">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput2" class="">Hình ảnh sản phẩm</label> <br>
                        <input name="product_image" type="file" class=""
                        id="exampleFormControlInput2">
                        {{-- <img src="{{ U7RL::to('./upload/product/'.$pro->product_image)}}" alt="" height="100" width="100"> --}}
                    </div>
                </div>
                <div class="col-4">
                    <div class="mb-3">
                        <label for="" class="form-label"  style="margin-right: 15rem;">Danh mục</label>
                        <select name="product_cate" class="form-select"  style="width: 10rem; height:2rem; border: 1px solid #ccc; border-radius: 2rem" class="form-select" aria-label="Default select example">
                            @foreach ($cate_product as $key => $cate)
        
                                @if ($cate->category_id==$pro->category_id) 
                                    <option selected value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                @else 
                                    <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                @endif
        
                            @endforeach
                            
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label" style="margin-right: 15rem;">Hiển thị</label>
                        <select name="product_status" class="" style="width: 10rem; height:2rem; border: 1px solid #ccc; border-radius: 2rem" class="form-select" aria-label="Default select example">
                            <option value="0">Ẩn</option>
                            <option value="1">Hiện</option>
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="row justify-content-center">
                <button name="add_product" class="btn-accept" type="submit">Đồng ý</button>
            </div>
        </form>
    @endforeach

    
@endsection