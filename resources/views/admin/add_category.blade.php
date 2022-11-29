@extends('admin-layout')
@section('admin-content')
    <h1 class="h1 mb-0 text-gray-800 text-center">Thêm danh mục</h1>

    <?php
        $message = Session::get('message');
        if($message) {
            echo '<span style="padding: 16px; color: red;">'.$message.'</span>';
            session()->put('message', null);
        }
    ?>

    <form action="{{ URL::to('/save_category')}}" method="POST" enctype="multipart/form-data">

        {{ csrf_field() }}

        <div class="row">
            <div class="col-8">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label text-gray-800">Tên danh mục</label>
                    <input required name="category_product_name" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Tên danh mục">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label text-gray-600">Mô tả danh mục</label>
                    <textarea required name="category_product_desc" class="form-control" style="resize: none" id="exampleFormControlTextarea1" rows="2"></textarea>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label text-gray-600">Hình ảnh</label> <br>
                    <input required name="category_product_image" type="file" accept=".png, .jpg, .jpeg" class="" id="exampleFormControlInput1" placeholder="Tên danh mục">
                </div>

            </div>
            <div class="col-4">
                <div class="mb-3">
                    <label for="select--hien" class="form-label text-gray-600" style="margin-right: 15rem;">Hiển thị</label>
                    <select required name="category_product_status" id="select--hien" style="width: 10rem; height:2rem; border: 1px solid #ccc; border-radius: 2rem;
                                                                                    padding-left: 0.6rem;" 
                    class="form-select" aria-label="Default select example" style="">
                        <option value="0">Ẩn</option>
                        <option value="1">Hiện</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label text-gray-600" style="margin-right: 15rem;">Đơn vị tính</label>
                    <select required name="dvt_id" class="form-select" style="width: 10rem; height:2rem;border: 1px solid #ccc; border-radius: 2rem;
                    padding-left: 0.6rem;" aria-label="Default select example"
                        style="">
                        <option value="1">Màu sắc</option>
                        <option value="2">Kích thước</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <button name="add_category_product" class=" btn-accept" type="submit">Đồng ý</button>
        </div>
        


    </form>
@endsection