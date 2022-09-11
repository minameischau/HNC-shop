@extends('account')
@section('content')
<div class="card-body p-0">
    <!-- Nested Row within Card Body -->
    <div class="row">
        <div class="col-lg-6 bg-login-image d-flex">
            <img src="{{ URL::asset('./admins/assets/img/hicorgi.gif')}}" alt="">
        </div>
        <div class="col-lg-6">
            <div class="p-5">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Chào mừng quý khách</h1>
                </div>

                {{-- Start to Login --}}
                <form class="user" action="{{ URL::to('/login-customer')}}" method="POST" >

                    <?php
                        $message = Session::get('message');
                        if($message) {
                            echo '<span style="padding: 16px; color: red;">'.$message.'</span>';
                            session()->put('message', null);
                        }
                    ?>

                    <div class="form-group mt-3">
                        <input name="account_email" type="email" class="form-control form-control-user"
                            id="exampleInputEmail" aria-describedby="emailHelp"
                            placeholder="Nhập email">
                    </div>
                    <div class="form-group">
                        <input name="account_password" type="password" class="form-control form-control-user"
                            id="exampleInputPassword" placeholder="Mật khẩu">
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox small">
                            <input type="checkbox" class="custom-control-input" id="customCheck">
                            <label class="custom-control-label" for="customCheck">Ghi nhớ tôi</label>
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-primary btn-user btn-block" name="login">
                        Đăng nhập
                    </button>
                    <hr>
                    <a href="index.html" class="btn btn-google btn-user btn-block">
                        <i class="fab fa-google fa-fw"></i> Login with Google
                    </a>
                    <a href="index.html" class="btn btn-facebook btn-user btn-block">
                        <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                    </a>
                </form>
                {{-- End Login --}}

                <hr>
                <div class="text-center">
                    <a class="" href="forgot-password.html">Quên mật khẩu</a>
                </div>
                <div class="text-center">
                    <a class="" href="{{ URL::to('/signup')}}">Tạo tài khoản</a>
                </div>
            </div>
        </div>
    </div>
</div>    
@endsection

