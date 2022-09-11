@extends('layout')
@section('content')

    <!-- Start Banner Hero -->
    <div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
        </ol>
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="{{ URL:: asset('./client/assets/image/poster-fsnl.png')}}" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="{{ URL:: asset('./client/assets/image/poster-newitem.png')}}" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="{{ URL:: asset('./client/assets/image/poster-shopnow.png')}}" class="d-block w-100" alt="...">
              </div>
            </div>
        </div>
        <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="prev">
            <i class="fas fa-chevron-left"></i>
        </a>
        <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="next">
            <i class="fas fa-chevron-right"></i>
        </a>
    </div>
    <!-- End Banner Hero -->


    <!-- Start Categories of The Month -->
    <section class="container py-5">
        <div class="row text-center pt-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Danh mục sản phẩm</h1>
                <p>
                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                    deserunt mollit anim id est laborum.
                </p>
            </div>
        </div>
        <div class="row">
            @foreach ($category as $key => $cate)
                <div class="col-12 col-md-3 p-5 mt-3">
                    <a href="{{ URL::to('danh-muc-san-pham/'.$cate->category_id)}}">
                        <img src="{{ URL:: asset('./client/assets/img/category_img_01.jpg')}}" class="rounded-circle img-fluid border border-0">
                    </a>
                    <h5 class="text-center mt-3 mb-3">{{$cate->category_name}}</h5>
                    <p class="text-center">
                        <a href="{{ URL::to('danh-muc-san-pham/'.$cate->category_id)}}" class="text-white bg-dark btn--login rounded-4 btn--shop">Mua ngay</a>
                    </p>
                </div>
            @endforeach
        
        </div>
    </section>
    <!-- End Categories of The Month -->


    <!-- Start Featured Product -->
    <section class="bg-light">
        <div class="container py-5">
            <div class="row text-center py-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1">Sản phẩm mới nhất</h1>
                    <p>
                        Reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                        Excepteur sint occaecat cupidatat non proident.
                    </p>
                </div>
            </div>
            <div class="row">

                @foreach ($all_product as $key => $pro)
                    <div class="col-12 col-md-3 mb-4">
                        <div class="card h-100 rounded-4 border border-0 shadow">
                            <a href="{{ URL::to('/chi-tiet-san-pham/'.$pro->product_id)}}">
                                <img src="{{ URL::to('./upload/product/'.$pro->product_image)}}" class="card-img-top rounded-4 img--height" alt="...">
                            </a>
                            <div class="card-body text-center">
                                <ul class="list-unstyled d-flex justify-content-between">
                                    {{-- <li>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-muted fa fa-star"></i>
                                        <i class="text-muted fa fa-star"></i>
                                    </li> --}}
                                    <li class="text-danger text-right fw-bold m-auto">{{number_format($pro->product_price, 0, ',', ' ').' '.'VND'}}</li>
                                </ul>
                                <a href="{{ URL::to('/chi-tiet-san-pham/'.$pro->product_id)}}" class="h2 text-decoration-none text-dark fw-bolder">{{$pro->product_name}}</a>
                                <p class="card-text">
                                    {{$pro->product_desc}}
                                </p>
                                <p class="text-muted">Reviews (24)</p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- End Featured Product -->
@endsection