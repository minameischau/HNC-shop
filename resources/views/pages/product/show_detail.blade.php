@extends('layout')
@section('content')

@foreach ($details_product as $key => $value)
        <!-- Open Content -->

    <section class="bg-light">
        <div class="container pb-5">
            <div class="row">
                <div class="col-lg-5 mt-5">
                    <div class="card mb-3">
                        <img class="card-img img-fluid" src="{{ URL::to('./upload/product/'.$value->product_image)}}" alt="Card image cap" id="product-detail">
                    </div>
                    <div class="row">

                        <!--Start Controls-->
                        <div class="col-1 align-self-center">
                            <a href="#multi-item-example" role="button" data-bs-slide="prev">
                                <i class="text-dark fas fa-chevron-left"></i>
                                <span class="sr-only">Previous</span>
                            </a>
                        </div>
                        <!--End Controls-->

                        <!--Start Carousel Wrapper-->
                        <div id="multi-item-example" class="col-10 carousel slide carousel-multi-item" data-bs-ride="carousel">
                            <!--Start Slides-->
                            <div class="carousel-inner product-links-wap" role="listbox">

                                <!--First slide-->
                                <div class="carousel-item active">
                                    <div class="row">
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="{{ URL::to('./client/assets/img/product_single_01.jpg')}}" alt="Product Image 1">
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="{{ URL::to('./client/assets/img/product_single_02.jpg')}}" alt="Product Image 2">
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="{{ URL::to('./client/assets/img/product_single_03.jpg')}}" alt="Product Image 3">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!--/.First slide-->

                                <!--Second slide-->
                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="{{ URL::to('./client/assets/img/product_single_04.jpg')}}" alt="Product Image 4">
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="{{ URL::to('./client/assets/img/product_single_05.jpg')}}" alt="Product Image 5">
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="{{ URL::to('./client/assets/img/product_single_06.jpg')}}" alt="Product Image 6">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!--/.Second slide-->

                                <!--Third slide-->
                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="{{ URL::to('./client/assets/img/product_single_07.jpg')}}" alt="Product Image 7">
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="{{ URL::to('./client/assets/img/product_single_08.jpg')}}" alt="Product Image 8">
                                            </a>
                                        </div>
                                        <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid" src="{{ URL::to('./client/assets/img/product_single_09.jpg')}}" alt="Product Image 9">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!--/.Third slide-->
                            </div>
                            <!--End Slides-->
                        </div>
                        <!--End Carousel Wrapper-->
                        <!--Start Controls-->
                        <div class="col-1 align-self-center">
                            <a href="#multi-item-example" role="button" data-bs-slide="next">
                                <i class="text-dark fas fa-chevron-right"></i>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        <!--End Controls-->
                    </div>
                </div>
                <!-- col end -->

                <div class="col-lg-7 mt-5">
                    <div class="card">
                        <div class="card-body my-4 mx-3">
                            <h1 class="fs-1 fw-bold mt-2">{{$value->product_name}}</h1>
                            <p class="h3 py-2 mb-4">{{number_format($value->product_price, 0, ',', ' ').' '.'VND'}}</p>

                            {{-- Star rate --}}
                            {{-- <p class="py-2">
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-secondary"></i>
                                <span class="list-inline-item text-dark">Rating 4.8 | 36 Comments</span>
                            </p> --}}

                            {{-- <h6>Mô tả:</h6> --}}
                            <p class="mt-5">{{$value->product_desc}}</p>
                            <ul class="list-inline">
                                {{-- <li class="list-inline-item"> --}}
                                    {{-- <h6>Màu sắc</h6> --}}
                                {{-- </li>
                                <li class="list-inline-item"> --}}
                                    <p class="text-muted"><strong>White / Black</strong></p>
                                {{-- </li> --}}
                            {{-- </ul> --}}

                            {{-- Size --}}
                            <form action="{{ URL::to('/save-cart')}}" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="product-title" value="Activewear">
                                <div class="row">
                                    <div class="col-auto">
                                        <ul class="list-inline pb-3">
                                            <li class="list-inline-item">Kích cỡ :
                                                <input type="hidden" name="product-size" id="product-size" value="S">
                                            </li>
                                            <li class="list-inline-item"><span class="btn btn-success btn-size">S</span></li>
                                            <li class="list-inline-item"><span class="btn btn-success btn-size">M</span></li>
                                            <li class="list-inline-item"><span class="btn btn-success btn-size">L</span></li>
                                            <li class="list-inline-item"><span class="btn btn-success btn-size">XL</span></li>
                                        </ul>
                                    </div>
                                    <div class="col-auto">
                                        <ul class="list-inline pb-3">
                                            <li class="list-inline-item text-right">
                                                Số lượng
                                                <input type="hidden" name="qty" id="product-quanity" value="1">
                                                <input type="hidden" name="product_id_hidden" id="product-quanity" value="{{$value->product_id}}">
                                            </li>
                                            <li class="list-inline-item"><span class="btn btn-success" id="btn-minus">-</span></li>
                                            <li class="list-inline-item"><span class="badge bg-secondary" id="var-value">1</span></li>
                                            <li class="list-inline-item"><span class="btn btn-success" id="btn-plus">+</span></li>
                                        </ul>
                                    </div>
                                </div>
                                {{-- <div class="row pb-3">
                                    <div class="col d-grid">
                                        <button type="submit" class="btn btn-success btn-lg" name="submit" value="buy">Đặt hàng</button>
                                    </div> --}}
                                    <div class="col d-grid">
                                <?php 
                                    $customer_id = session()->get('customer_id');
                                    if($customer_id != NULL) {
                                ?>
                                        <button type="submit" class="btn btn-success btn-lg" name="submit" value="addtocard">Thêm vào giỏ hàng</button>
                                <?php
                                    } else {
                                ?>
                                        <a href="{{ URL::to('/login-checkout')}}" class="btn btn-success btn-lg">Thêm vào giỏ hàng</a>
                                <?php
                                    }
                                ?>
                                    </div>
                                {{-- </div> --}}
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- Close Content -->
@endforeach

<section>
    <div class="container mt-5 mb-5">
        <div class="d-flex justify-content-center row">
            <div class="d-flex flex-column col-md-8">
                {{-- <div class="d-flex flex-row align-items-center text-left comment-top p-2 bg-white border-bottom px-4">
                    <div class="profile-image"><img class="rounded-circle" src="https://i.imgur.com/t9toMAQ.jpg" width="70"></div>
                    <div class="d-flex flex-column-reverse flex-grow-0 align-items-center votings ml-1"><i class="fa fa-sort-up fa-2x hit-voting"></i><span>127</span><i class="fa fa-sort-down fa-2x hit-voting"></i></div>
                    <div class="d-flex flex-column ml-3">
                        <div class="d-flex flex-row post-title">
                            <h5>Is sketch 3.9.1 stable?</h5><span class="ml-2">(Jesshead)</span></div>
                        <div class="d-flex flex-row align-items-center align-content-center post-title"><span class="bdge mr-1">video</span><span class="mr-2 comments">13 comments&nbsp;</span><span class="mr-2 dot"></span><span>6 hours ago</span></div>
                    </div>
                </div> --}}
                <div class="coment-bottom bg-white p-2 px-4">
                    @foreach ($details_product as $key => $value)

                    <form action="{{ URL::to('/save_comment')}}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="customer_id" value="{{$customer_id}}">
                        <input type="hidden" name="product_id" value="{{$value->product_id}}">
                        <div class="d-flex flex-row add-comment-section mt-4 mb-4">
                        <img class="img-fluid img-responsive rounded-circle mr-2" src="https://i.imgur.com/qdiP4DB.jpg" width="38">
                        <input type="text" name="comment_content" class="form-control mr-3" placeholder="Add comment">
                        <button class="btn btn-primary" type="submit">Comment</button>
                    </div>
                    </form>

                    @endforeach
                    
                    @foreach ($all_comment as $key => $com)
                        <div
                            class="commented-section mt-2">
                            <div class="d-flex flex-row align-items-center commented-user">
                                <h5 class="mr-2">{{$com->customer_name}}</h5><span class="dot mb-1"></span><span class="mb-1 ml-2">4 hours ago</span></div>
                            <div class="comment-text-sm"><span>{{$com->comment_content}}</span></div>
                            {{-- <div class="reply-section">
                                <div class="d-flex flex-row align-items-center voting-icons"><i class="fa fa-sort-up fa-2x mt-3 hit-voting"></i><i class="fa fa-sort-down fa-2x mb-3 hit-voting"></i><span class="ml-2">10</span><span class="dot ml-2"></span>
                                    <h6 class="ml-2 mt-1">Reply</h6>
                                </div>
                            </div> --}}
                        </div>
                    @endforeach
                    
                    {{-- <div class="commented-section mt-2">
                        <div class="d-flex flex-row align-items-center commented-user">
                            <h5 class="mr-2">Samoya Johns</h5><span class="dot mb-1"></span><span class="mb-1 ml-2">5 hours ago</span></div>
                        <div class="comment-text-sm"><span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua..</span></div> --}}
                        {{-- <div class="reply-section">
                            <div class="d-flex flex-row align-items-center voting-icons"><i class="fa fa-sort-up fa-2x mt-3 hit-voting"></i><i class="fa fa-sort-down fa-2x mb-3 hit-voting"></i><span class="ml-2">15</span><span class="dot ml-2"></span>
                                <h6 class="ml-2 mt-1">Reply</h6>
                            </div>
                        </div> --}}
                    {{-- </div>
                    <div class="commented-section mt-2">
                        <div class="d-flex flex-row align-items-center commented-user">
                            <h5 class="mr-2">Makhaya andrew</h5><span class="dot mb-1"></span><span class="mb-1 ml-2">10 hours ago</span></div>
                        <div class="comment-text-sm"><span>Nunc sed id semper risus in hendrerit gravida rutrum. Non odio euismod lacinia at quis risus sed. Commodo ullamcorper a lacus vestibulum sed arcu non odio euismod. Enim facilisis gravida neque convallis a. In mollis nunc sed id. Adipiscing elit pellentesque habitant morbi tristique senectus et netus. Ultrices mi tempus imperdiet nulla malesuada pellentesque.</span></div> --}}
                        {{-- <div
                            class="reply-section">
                            <div class="d-flex flex-row align-items-center voting-icons"><i class="fa fa-sort-up fa-2x mt-3 hit-voting"></i><i class="fa fa-sort-down fa-2x mb-3 hit-voting"></i><span class="ml-2">25</span><span class="dot ml-2"></span>
                                <h6 class="ml-2 mt-1">Reply</h6>
                            </div>
                        </div> --}}
                    {{-- </div> --}}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Start Article -->
<section class="py-5">
    <div class="container">
        <div class="row text-left p-2 pb-3">
            <h4>Sản phẩm liên quan</h4>
        </div>

        <!--Start Carousel Wrapper-->
        <div id="carousel-related-product">

            @foreach ($related as $key => $rel)
                <div class="p-2 pb-3">
                    <div class="product-wap card rounded-0">
                        <div class="card rounded-0">
                            <img class="card-img rounded-0 img-fluid" src="{{ URL::to('./upload/product/'.$rel->product_image)}}">
                            <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                <ul class="list-unstyled">
                                    <li><a class="btn btn-success text-white" href="{{ URL::to('/chi-tiet-san-pham/'.$rel->product_id)}}"><i class="far fa-heart"></i></a></li>
                                    <li><a class="btn btn-success text-white mt-2" href="{{ URL::to('/chi-tiet-san-pham/'.$rel->product_id)}}"><i class="far fa-eye"></i></a></li>
                                    <li><a class="btn btn-success text-white mt-2" href="{{ URL::to('/chi-tiet-san-pham/'.$rel->product_id)}}"><i class="fas fa-cart-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body text-center">
                            <a href="{{ URL::to('/chi-tiet-san-pham/'.$rel->product_id)}}" class="h2 text-decoration-none text-dark fw-bolder">{{$rel->product_name}}</a>
                            {{-- <ul class="w-100 list-unstyled d-flex justify-content-between mb-0"> --}}
                                {{-- <li>M/L/X/XL</li> --}}
                                {{-- <li class="pt-2">
                                    <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                </li> --}}
                            {{-- </ul> --}}
                            <ul class="list-unstyled d-flex justify-content-between">
                                {{-- <li>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                </li> --}}
                                <li class="text-danger text-right fw-bold m-auto">{{number_format($rel->product_price, 0, ',', ' ').' '.'VND'}}</li>
                            </ul>
                            {{-- <a href="{{ URL::to('/chi-tiet-san-pham/'.$rel->product_id)}}" class="h2 text-decoration-none text-dark fw-bolder">{{$rel->product_name}}</a> --}}
                        </div>
                    </div>
                </div>
            @endforeach
            
        </div>
    </div>
</section>
<!-- End Article -->

<!-- End Slider Script -->


@endsection