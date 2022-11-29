@extends('admin-layout')
@section('admin-content')
    <h1>Cập nhật danh mục</h1>

    <?php
        $message = Session::get('message');
        if($message) {
            echo '<span style="padding: 16px; color: red;">'.$message.'</span>';
            session()->put('message', null);
        }
    ?>
    @foreach ($edit_category_product as $key => $edit_value)

    <form action="{{ URL::to('/update_category_product/'.$edit_value->category_id)}}" method="POST">

        {{ csrf_field() }}

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Tên danh mục</label>
            <input name="category_product_name" type="text" class="form-control" 
            id="exampleFormControlInput1" value="{{$edit_value->category_name}}">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Mô tả danh mục</label>
            <textarea name="category_product_desc" class="form-control" 
                style="resize: none" id="exampleFormControlTextarea1" rows="3">{{$edit_value->category_desc}}</textarea>
        </div>
        <div class="row justify-content-center">
            <button name="update_category_product" class="btn-accept" type="submit">Đồng ý</button>
        </div>
    </form>
    @endforeach
@endsection