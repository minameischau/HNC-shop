<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Đăng nhập</title>

    <!-- Custom fonts for this template-->
    <link href="{{ URL::asset('./admins/assets/vendor/fontawesome-free/css/all.min.css')}} " rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ URL::asset('./admins/assets/css/sb-admin-2.min.css')}} " rel="stylesheet">

    <link rel="shortcut icon" href="{{ URL::asset('./admins/assets/img/icons8-checked-user-96.png')}}" type="image/x-icon">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block">
                                <img src="{{ URL::asset('./admins/assets/img/mana.png')}}" class="" style="width: 90% !important" alt="">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Chào mừng Quản trị viên!</h1>
                                    </div>

                                    {{-- Start to Login --}}
                                    <form class="user" action="{{ URL::to('/admin-dashboard')}}" method="POST" >

                                        <?php
                                            $message = Session::get('message');
                                            if($message) {
                                                echo '<span style="padding: 16px; color: red;">'.$message.'</span>';
                                                session()->put('message', null);
                                            }
                                        ?>

                                        <div class="form-group mt-3">
                                            <input name="admin_email" type="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Nhập email">
                                        </div>
                                        <div class="form-group">
                                            <input name="admin_password" type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Mật khẩu">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck" checked>
                                                <label class="custom-control-label" for="customCheck"> 
                                                    Ghi nhớ tôi
                                                </label>
                                            </div>
                                        </div>
                                        {{ csrf_field() }}

                                        <button type="submit" class="btn btn-primary btn-user btn-block" name="login">
                                            Đăng nhập
                                        </button>
                                    </form>
                                    {{-- End Login --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ URL::asset('./admins/assets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ URL::asset('./admins/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ URL::asset('./admins/assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ URL::asset('./admins/assets/js/sb-admin-2.min.js')}}"></script>

</body>

</html>