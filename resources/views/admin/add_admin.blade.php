@extends('admin-layout')
@section('admin-content')
    <h1 class="h1 mb-0 text-gray-800 text-center">Thêm quản trị viên</h1>

    <?php
        $message = Session::get('message');
        if($message) {
            echo '<span style="padding: 16px; color: red;">'.$message.'</span>';
            session()->put('message', null);
        }
    ?>

    <form action="{{ URL::to('/save_admin')}}" method="POST">

        {{ csrf_field() }}

        <div class="row">
            <div class="col-8 m-auto">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label text-gray-800">Tên quản trị viên</label>
                    <input required name="admin_name" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Tên quản trị viên">
                </div>
                
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label text-gray-800">Email</label>
                    <input required name="admin_email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="Email">
                </div>
                
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label text-gray-800">Số điện thoại</label>
                    <input required name="admin_phone" type="tel" class="form-control" id="exampleFormControlInput1" placeholder="Số điện thoại">
                </div>
                
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label text-gray-800">Password</label>
                    <input required name="admin_password" type="password" class="form-control" id="exampleFormControlInput1" placeholder="Password">
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <button name="add_category_product" class=" btn-accept" type="submit">Đồng ý</button>
        </div>
        


    </form>
@endsection