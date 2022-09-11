@extends('layout')
@section('content')

    <!-- Start Featured Product -->
    <section class="bg-light">
        <div class="container py-5">
            <div class="row text-center py-3">
                <div class="col-lg-6 m-auto">
                    @foreach ($category_name as $key => $cate_name)
                        <h1 class="h1">Các sản phẩm thuộc về <strong>{{$cate_name->category_name}}</strong> </h1>
                    @endforeach
                    <p>
                        Reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                        Excepteur sint occaecat cupidatat non proident.
                    </p>
                </div>
            </div>
            <div class="row">

                @foreach ($category_by_id as $key => $pro)
                    <div class="col-12 col-md-3 mb-4">
                        <div class="card h-100 rounded-4 border border-0 shadow">
                            <a href="{{ URL::to('/chi-tiet-san-pham/'.$pro->product_id)}}">
                                <img src="{{ URL::to('./upload/product/'.$pro->product_image)}}" class="card-img-top" alt="...">
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