@extends('account')
@section('content')
<div class="card-body p-0">
    <!-- Nested Row within Card Body -->
    <div class="row">
        {{-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> --}}
        <div class="col-lg-6 bg-login-image d-flex">
            <img src="{{ URL::asset('./admins/assets/img/laycorgi.gif')}}" alt="">
        </div>
        <div class="col-lg-6">
            <div class="p-5">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Tạo tài khoản</h1>
                </div>


                <form method="POST" class="user" action="{{ URL::to('/add-customer')}}">
                    {{ csrf_field() }}
                    <div class="my-2 mb-3 mb-sm-0">
                        <input name="customer_name" type="text" class="form-control form-control-user" id="exampleFirstName"
                            placeholder="Tên tài khoản">
                    </div>
                    {{-- <div class="col-sm-6">
                        <input name="customer_" type="text" class="form-control form-control-user" id="exampleLastName"
                            placeholder="Last Name">
                    </div> --}}
                    <div class="my-2 mb-3 mb-sm-0">
                        <input name="customer_email" type="email" class="form-control form-control-user" id="exampleInputEmail"
                            placeholder="Email">
                    </div>
                    {{-- <div class="form-group row"> --}}
                    <div class="my-2 mb-3 mb-sm-0">
                        <input name="customer_password" type="password" class="form-control form-control-user"
                            id="exampleInputPassword" placeholder="Mật khẩu">
                    </div>
                    <div class="my-2 mb-3 mb-sm-0">
                        <input name="customer_phone" type="tel" class="form-control form-control-user"
                            id="" placeholder="Số điện thoại">
                    </div>
                    {{-- </div> --}}
                    <button name="" type="submit" class="btn btn-primary btn-user btn-block mt-3">
                        Đăng kí
                    </button>
                    <hr>
                    <a href="index.html" class="btn btn-google btn-user btn-block">
                        <i class="fab fa-google fa-fw"></i> Register with Google
                    </a>
                    <a href="index.html" class="btn btn-facebook btn-user btn-block">
                        <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                    </a>
                </form>


                <hr>
                <div class="text-center">
                    <a class="" href="forgot-password.html">Quên mật khẩu</a>
                </div>
                <div class="text-center">
                    <a class="" href="{{ URL::to('/login-checkout')}}">Đã có tài khoản? Đăng nhập</a>
                </div>
            </div>
        </div>
    </div>
</div>    
@endsection

