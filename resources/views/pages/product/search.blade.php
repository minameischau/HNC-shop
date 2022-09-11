@extends('layout')
@section('content')

    <!-- Start Featured Product -->
    <section class="bg-light">lllll
        <div class="container py-5">
            <div class="row text-center py-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1">Kết quả tìm kiếm</h1>
                </div>
            </div>
            <div class="row">

                @foreach ($search_product as $key => $search)
                    <div class="col-12 col-md-4 mb-4">
                        <div class="card h-100">
                            <a href="{{ URL::to('/chi-tiet-san-pham/'.$search->product_id)}}">
                                <img src="{{ URL::to('./upload/product/'.$search->product_image)}}" class="card-img-top" alt="...">
                            </a>
                            <div class="card-body">
                                <ul class="list-unstyled d-flex justify-content-between">
                                    <li>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-muted fa fa-star"></i>
                                        <i class="text-muted fa fa-star"></i>
                                    </li>
                                    <li class="text-muted text-right">{{number_format($search->product_price).' '.'VND'}}</li>
                                </ul>
                                <a href="{{ URL::to('/chi-tiet-san-pham/'.$search->product_id)}}" class="h2 text-decoration-none text-dark">{{$search->product_name}}</a>
                                <p class="card-text">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt in culpa qui officia deserunt.
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