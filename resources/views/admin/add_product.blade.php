@extends('admin-layout')
@section('admin-content')
    <h1 class="h1 mb-0 text-gray-800 text-center">Thêm sản phẩm</h1>

    <?php
        $message = Session::get('message');
        if($message) {
            echo '<span style="padding: 16px; color: red;">'.$message.'</span>';
            session()->put('message', null);
        }
    ?>

    <form action="{{ URL::to('/save_product')}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-8">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Tên sản phẩm</label>
                    <input required name="product_name" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Tên sản phẩm">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Mô tả sản phẩm</label>
                    <textarea required name="product_desc" class="form-control" style="resize: none" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput3" class="form-label">Giá sản phẩm</label>
                    <input required name="product_price" type="" class="form-control" id="exampleFormControlInput3">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput2" class="">Hình ảnh đại diện sản phẩm</label> <br>
                    {{-- <input required name="product_image" type="file" class="form-control" id="exampleFormControlInput2"> --}}
                    <input required type="file" accept=".png, .jpg, .jpeg" class="" name="product_image" placeholder="" multiple>
                </div>
            </div>
            <div class="col-4">
                <div class="mb-3">
                    <label for="" class="form-label" style="margin-right: 15rem;">Danh mục</label>
                    <select required name="product_cate" style="width: 10rem; height:2rem; border: 1px solid #ccc; border-radius: 2rem;
                    padding-left: 0.6rem;" class="form-select" aria-label="Default select example">
                        @foreach ($cate_product as $key => $cate)
                            <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                        @endforeach
                        
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput2" class="">Hình ảnh theo loại sản phẩm</label>
                    {{-- <input required name="product_image" type="file" class="form-control" id="exampleFormControlInput2"> --}}
                    <input required type="file" accept=".png, .jpg, .jpeg" class="" name="product_image_list[]" placeholder="address" multiple>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label" style="margin-right: 15rem;">Hiển thị</label>
                    <select required name="product_status" style="width: 10rem; height:2rem; border: 1px solid #ccc; border-radius: 2rem;
                    padding-left: 0.6rem;" class="form-select" aria-label="Default select example">
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
@endsection