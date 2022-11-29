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
    <link href="{{ URL::asset('./admins/assets/css/sb-admin-2.css')}} " rel="stylesheet">
    <link href="{{ URL::asset('./admins/assets/css/custom.css')}} " rel="stylesheet">


    <link rel="shortcut icon" href="{{ URL::asset('./admins/assets/img/icons8-checked-user-96.png')}}" type="image/x-icon">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                
                    
                    @yield('content')

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