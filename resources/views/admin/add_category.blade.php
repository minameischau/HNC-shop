@extends('admin-layout')
@section('admin-content')
    <h1>Thêm danh mục</h1>

    <?php
        $message = Session::get('message');
        if($message) {
            echo '<span style="padding: 16px; color: red;">'.$message.'</span>';
            session()->put('message', null);
        }
    ?>

    <form action="{{ URL::to('/save_category')}}" method="POST">

        {{ csrf_field() }}

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Tên danh mục</label>
            <input name="category_product_name" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Tên danh mục">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Mô tả danh mục</label>
            <textarea name="category_product_desc" class="form-control" style="resize: none" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Hiển thị</label>
            <select name="category_product_status" class="form-select" aria-label="Default select example">
                <option value="0">Ẩn</option>
                <option value="1">Hiện</option>
            </select>
        </div>
        <button name="add_category_product" type="submit">Đồng ý</button>
    </form>
@endsection