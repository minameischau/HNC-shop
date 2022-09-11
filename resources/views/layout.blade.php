<!DOCTYPE html>
<html lang="en">

<head>
    <title>HNC Shop</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="{{ URL::asset('./client/assets/img/apple-icon.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ URL::asset('./client/assets/img/icon-fashion-96.png')}}">

    <link rel="stylesheet" href="{{ URL::asset('./client/assets/css/bootstrap.min.css')}}">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('./client/assets/css/templatemo.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('./client/assets/css/theme.css')}}">

    <link rel="stylesheet" href="{{ URL::asset('./client/assets/css/custom.css')}}">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="{{ URL::asset('./client/assets/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Slick -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('./client/assets/css/slick.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('./client/assets/css/slick-theme.css')}}">

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('./client/assets/css/sweetalert.css')}}">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
<!--
    
TemplateMo 559 Zay Shop

https://templatemo.com/tm-559-zay-shop

-->
</head>

<body>
    <!-- Start Top Nav -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-light" id="templatemo_nav_top">
        <div class="container text-light">
            <div class="w-100 d-flex justify-content-between">
                <div>
                    <i class="fa fa-envelope mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="mailto:hnc.shop@gmail.com">hnc.shop@gmail.com</a>
                    <i class="fa fa-phone mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="tel:0888-888-888">0888-888-888</a>
                </div>
                <div class="">
                    <span>
                        <?php
                            $customer_id = session()->get('customer_id');
                            $customer_name = session()->get('customer_name');
                            if ($customer_name != NULL) {
                        ?>
                        🟢 <?php echo $customer_name?>
                        <?php
                            }
                        ?>
                    </span>
                </div>
                <div>
                    <a class="text-light" href="https://facebook.com" target="_blank" rel="sponsored"><i class="fab fa-facebook-f fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://twitter.com/" target="_blank"><i class="fab fa-twitter fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://www.linkedin.com/" target="_blank"><i class="fab fa-linkedin fa-sm fa-fw"></i></a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Close Top Nav -->


    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light shadow ">
        <div class="container d-flex justify-content-between align-items-center">

            <a class="navbar-brand text-brown logo h1 align-self-center" href="{{ URL::to('/trang-chu')}}">
                HNC
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ URL::to('/trang-chu')}}">Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ URL::to('/about')}}">Về chúng tôi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ URL::to('/trang-chu')}}">Sản phẩm</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ URL::to('/contact')}}">Liên hệ</a>
                        </li>
                    </ul>
                </div>
                <div class="navbar align-self-center d-flex">
                    <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                        <div class="input-group">
                            <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ...">
                            <div class="input-group-text">
                                <i class="fa fa-fw fa-search"></i>
                            </div>
                        </div>
                    </div>

                    


                    <a class="nav-icon d-none d-lg-inline" href="#" data-bs-toggle="modal" data-bs-target="#templatemo_search">
                        <i class="fa fa-fw fa-search text-dark mr-2"></i>
                    </a>

                    <?php
                        $customer_id = session()->get('customer_id');
                        if ($customer_id != NULL) {
                    ?>
                            <a class="nav-icon position-relative text-decoration-none" href="{{ URL::to('/show-cart')}}">
                                <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                                <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">
                                    <?php
                                        $qty = Cart::count();
                                        echo $qty;
                                    ?>
                                </span >
                            </a>
                    <?php
                        }
                    ?>
                    <nav class="nav nav-pills nav-fill">

                        <?php
                            $customer_id = session()->get('customer_id');
                            if ($customer_id != NULL) {
                        ?>
                                <a class="nav-link" href="{{ URL::to('/log-out')}}">
                                    Đăng xuất
                                </a>
                        <?php
                            } else {
                        ?>
                                <a class="nav-link" href="{{ URL::to('/signup')}}">
                                    Đăng ký
                                </a>
                                <a class="nav-link text-white bg-dark active btn--login rounded-4" href="{{ URL::to('/login-checkout')}}">
                                    Đăng nhập
                                </a>
                        <?php
                            }
                        ?>
                        
                    </nav>
                </div>
            </div>

        </div>
    </nav>
    <!-- Close Header -->
    

    <!-- Modal SEARCH -->
    <div class="modal fade" id="templatemo_search" tabindex="-1" role="dialog" 
        aria-labelledby="exampleModalLabel" aria-hidden="true" style="top: 32px;">
        <div class="modal-dialog modal-lg" role="document">
            <form action="{{ URL::to('/tim-kiem')}}" method="POST" class="modal-content modal-body border-0 p-0">
                {{ csrf_field() }}
                <div class="input-group rounded-4">
                    <input type="text" class="form-control border-0 my-1 ml-1" id="inputModalSearch" 
                    name="keyword_submit" placeholder="Tìm kiếm ..." style="border-radius: 30px 0px 0px 30px">
                    <button type="submit" class="input-group-text bg-white text-dark border border-0" 
                    name="search_button" style="border-radius: 30px">
                        <i class="fa fa-fw fa-search text-dark"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>


    @yield('content')


    <!-- Start Footer -->
    <footer class="bg-dark" id="tempaltemo_footer">
        <div class="container">
            <div class="row">

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light logo">HNC Shop</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li>
                            <i class="fas fa-map-marker-alt fa-fw"></i>
                            Đại học Cần Thơ
                        </li>
                        <li>
                            <i class="fa fa-phone fa-fw"></i>
                            <a class="text-decoration-none" href="tel:0888-888-888">0888-888-888</a>
                        </li>
                        <li>
                            <i class="fa fa-envelope fa-fw"></i>
                            <a class="text-decoration-none" href="mailto:hnc.shop@gmail.com">hnc.shop@gmail.com</a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Sản Phẩm</h2>
                    <ul class="list-unstyled text-light footer-link-list">

                        @foreach ($category as $key => $cate)
                            <li><a class="text-decoration-none" href="#">{{$cate->category_name}}</a></li>
                        @endforeach

                        
                        {{-- <li><a class="text-decoration-none" href="#">Sport Wear</a></li>
                        <li><a class="text-decoration-none" href="#">Men's Shoes</a></li>
                        <li><a class="text-decoration-none" href="#">Women's Shoes</a></li>
                        <li><a class="text-decoration-none" href="#">Popular Dress</a></li>
                        <li><a class="text-decoration-none" href="#">Gym Accessories</a></li>
                        <li><a class="text-decoration-none" href="#">Sport Shoes</a></li> --}}
                    </ul>
                </div>

                <div class="col-md-4 pt-5">
                    <h2 class="h2 text-light border-bottom pb-3 border-light">Thông Tin</h2>
                    <ul class="list-unstyled text-light footer-link-list">
                        <li><a class="text-decoration-none" href="#">Trang chủ</a></li>
                        <li><a class="text-decoration-none" href="#">Về chúng tôi</a></li>
                        <li><a class="text-decoration-none" href="#">Sản phẩm</a></li>
                        <li><a class="text-decoration-none" href="#">Liên hệ</a></li>
                    </ul>
                </div>

            </div>

            <div class="row text-light mb-4">
                <div class="col-12 mb-3">
                    <div class="w-100 my-3 border-top border-light"></div>
                </div>
                <div class="col-auto me-auto">
                    <ul class="list-inline text-left footer-icons">
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="http://facebook.com/"><i class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://www.instagram.com/"><i class="fab fa-instagram fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://twitter.com/"><i class="fab fa-twitter fa-lg fa-fw"></i></a>
                        </li>
                        <li class="list-inline-item border border-light rounded-circle text-center">
                            <a class="text-light text-decoration-none" target="_blank" href="https://www.linkedin.com/"><i class="fab fa-linkedin fa-lg fa-fw"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-auto">
                    <label class="sr-only" for="subscribeEmail">Email address</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control bg-dark border-light" id="subscribeEmail" placeholder="Email address">
                        <div class="input-group-text btn-success text-light">Subscribe</div>
                    </div>
                </div>
            </div>
        </div>

    </footer>
    <!-- End Footer -->

    <!-- Start Script -->
    <script src="{{ URL::asset('./client/assets/js/jquery-1.11.0.min.js')}}"></script>
    <script src="{{ URL::asset('./client/assets/js/jquery-migrate-1.2.1.min.js')}}"></script>
    <script src="{{ URL::asset('./client/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ URL::asset('./client/assets/js/templatemo.js')}}"></script>
    <script src="{{ URL::asset('./client/assets/js/custom.js')}}"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap');
    </style>

    <!-- Start Slider Script -->
<script src="{{ URL::to('./client/assets/js/slick.min.js')}}"></script>
{{-- Sweet Alert --}}
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $('#carousel-related-product').slick({
        infinite: true,
        arrows: false,
        slidesToShow: 4,
        slidesToScroll: 3,
        dots: true,
        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 3
                }
            }
        ]
    });
</script>
    <!-- End Script -->

    {{-- <script type="text/javascript">
        $(document).ready(function() {
            $('.add-to-cart').click(function(){
                swal("Herer");
            });
        });
    </script> --}}
    <script>
        $(function(){
            var txt = $('p.card-text').html();
            var txtStart = jQuery.trim(txt).substring(0, 50).split(" ").slice(0, -1).join(" ") + "...";;
            $('p.card-text').html(txtStart);
            
        });
    </script>
</body>

</html>

