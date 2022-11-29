@extends('layout')
@section('content')

<!-- Start Content -->
<div class="container py-8">
    <div class="row justify-content-around">

        <div class="row">
            {{-- <h1 class="h2 pb-4">Danh mục</h1> --}}
            <ul class="list-unstyled templatemo-accordion">
                <li class="row pb-3">
                    <form action="" class="col-8 dropdown">
                        <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                            Danh mục
                            {{-- <i class="fa fa-fw fa-chevron-circle-down mt-1" id="dropdownMenuButton"></i> --}}
                        </a>
                        {{-- aria-labelledby="dropdownMenuButton" --}}
                        <ul class="collapse list-unstyled pl-3 dropdown-menu" style="margin-left: 1rem" >
                            @foreach ($category as $key => $cate)
                                <li ><a class="text-decoration-none my-1" href="{{ URL::to('/tat-ca-san-pham/'.$cate->category_id)}}">{{$cate->category_name}}</a></li>
                                
                            @endforeach
                        </ul>
                    </form>
                    <form action="" class="col-4">
                        <div class="">
                            <select class="form-control" name="sap" onchange="this.form.submit();" style="border: 1px solid #ccc; border-radius: 2rem">
                                <option value="-1">Sắp xếp</option>
                                <option value="0">Giá từ thấp đến cao</option>
                                <option value="1">Giá từ cao đến thấp</option>
                            </select>
                        </div>
                    </form>
                </li>
            </ul>
        </div>

        <div class="row">
            <div class="row">

                @foreach ($all_product as $key => $pro)
                <div class="col-12 col-md-2 mb-4">
                    <div class="card h-100 rounded-4 border border-0 shadow">
                        <a href="{{ URL::to('/chi-tiet-san-pham/'.$pro->product_id)}}">
                            <img src="{{ URL::to('./upload/product/'.$pro->product_image)}}" class="card-img-top" alt="...">
                        </a>
                        <div class="card-body text-center">
                            <ul class="list-unstyled d-flex justify-content-between mb-1">
                                {{-- <li>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                </li> --}}
                                <li class="text-danger text-right fw-bold m-auto">{{number_format($pro->product_price, 0, ',', ' ').' '.'VND'}}</li>
                            </ul>
                            <a href="{{ URL::to('/chi-tiet-san-pham/'.$pro->product_id)}}" class="h2 text-decoration-none text-dark fw-bolder product-title">{{$pro->product_name}}</a>
                            {{-- <p class="card-text">
                                {{$pro->product_desc}}
                            </p>
                            <p class="text-muted">Reviews (24)</p> --}}
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>

    </div>
</div>
<!-- End Content -->

@endsection