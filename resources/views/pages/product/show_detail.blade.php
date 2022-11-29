@extends('layout')
@section('content')

@foreach ($details_product as $key => $value)
        <!-- Open Content -->

    <section class="">
        <div class="container pb-5">
            <div class="row">
                <div class="col-lg-6 mt-5">
                    <div class="card mb-3">
                        <img class="m-auto w-75 rounded-1" src="{{ URL::to('./upload/product/'.$value->product_image)}}" alt="Card image cap" id="product-detail">
                    </div>
                    <div class="row">

                        <!--Start Controls-->
                        <div class="col-1 align-self-center">
                            {{-- <a href="#multi-item-example" role="button" data-bs-slide="prev">
                                <i class="text-dark fas fa-chevron-left"></i>
                                <span class="sr-only">Previous</span>
                            </a> --}}
                        </div>
                        <!--End Controls-->

                        <!--Start Carousel Wrapper-->
                        <div id="multi-item-example" class="col-10 carousel slide carousel-multi-item" data-bs-ride="carousel">
                            <!--Start Slides-->
                            <div class="carousel-inner product-links-wap" role="listbox">

                                <!--First slide-->
                                <div class="carousel-item active">
                                    <div class="row justify-content-center">

                                        @foreach ($related_img as $item)
                                          <div class="col-4">
                                            <a href="#">
                                                <img class="card-img img-fluid w-75" src="{{ URL:: asset('./upload/product/'.$item->product_img)}}">
                                            </a>
                                        </div>  
                                        @endforeach
                                        
                                    </div>
                                </div>
                            </div>
                            <!--End Slides-->
                        </div>
                        <!--End Carousel Wrapper-->
                        <!--Start Controls-->
                        <div class="col-1 align-self-center">
                            {{-- <a href="#multi-item-example" role="button" data-bs-slide="next">
                                <i class="text-dark fas fa-chevron-right"></i>
                                <span class="sr-only">Next</span>
                            </a> --}}
                        </div>
                        <!--End Controls-->
                    </div>
                </div>
                <!-- col end -->

                <div class="col-lg-6 mt-5">
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
                                    {{-- <p class="text-muted"><strong>White / Black</strong></p> --}}
                                {{-- </li> --}}
                            {{-- </ul> --}}

                            {{-- Size --}}
                            <form action="{{ URL::to('/save-cart')}}" method="POST">
                                {{ csrf_field() }}
                                {{-- <input type="hidden" name="product-title" value="Activewear"> --}}

                                {{---------- DON VI TINH ------------}}
                                <div class="row">
                                    <?php
                                        $message = Session::get('message');
                                        if($message) {
                                            echo '<span style="padding-bottom: 16px; color: red;">'.$message.'</span>';
                                            session()->put('message', null);
                                        }
                                    ?>

                                    <div class="col-auto">
                                        <ul class="list-inline pb-3">
                                            <li class="list-inline-item">
                                                <p id="id_work_days">
                                                    @foreach ($dvt_name as $key => $dvt)
                                                    <label><input type="radio" name="product_size" value="{{$dvt->dvt_detail_name}}">
                                                        <span style="margin-right: 1rem">{{$dvt->dvt_detail_name}}</span>
                                                    </label>
                                                    @endforeach
                                                </p>
                                            </li> 
                                        </ul>
                                    </div>
                                    <br>
                                </div>

                                {{---------- SO LUONG --------------}}
                                <div class="col-auto">
                                    <ul class="list-inline pb-3">
                                        {{-- <li class="list-inline-item text-right"> --}}
                                            {{-- Số lượng --}}
                                            <input type="hidden" name="qty" id="product-quanity" value="1">
                                            <input type="hidden" name="product_id_hidden" id="product-quanity" value="{{$value->product_id}}">
                                            <?php
                                                $name = 'qty'.$value->product_id;
                                            ?>
                                        {{-- </li> --}}
                                        <div class="input-group input-spinner mb-4 ">
                                            <input type="button" value="-" class="button-minus  btn  btn-sm " data-field="quantity">
                                            <input type="number" step="1" max="10" value="1" name="quantity" class="quantity-field form-control-sm form-input">
                                            <input type="button" value="+" class="button-plus btn btn-sm " data-field="quantity">
                                        </div>
                                    </ul>
                                </div>


                                {{-------------THANH TOAN ------------}}
                                <div class="col">
                                <?php 
                                    $customer_id = session()->get('customer_id');
                                    if($customer_id != NULL) {
                                ?>
                                        <button type="submit" class="btn text-white bg-dark active btn--login rounded-4" name="submit" value="addtocard"><i class="fa-solid fa-cart-shopping mx-2"></i>Thêm vào giỏ hàng</button>
                                <?php
                                    } else {
                                ?>
                                        <a href="{{ URL::to('/login-checkout')}}" class="btn text-white bg-dark active btn--login rounded-4"> <i class="fa-solid fa-cart-shopping mr-1"></i> Thêm vào giỏ hàng</a>
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

<?php
    $customer_id = session()->get('customer_id');
    if ($customer_id != NULL) {
?>

<section>
    <div class="container  mt-5 mb-5">
        <div class="row">
            <div class="col-8">
                        <h4>Tất cả bình luận</h4>
                @foreach ($all_comment as $key => $com)

                        <div class="d-flex border-bottom mb-6 pt-4">
                            <!-- img -->
                            <img src="{{ URL::to('./upload/avatar/'.$com->customer_image)}}" alt=""
                            class="rounded-circle avatar-lg">
                            <div class="ms-5">
                                <h6 class="mb-1">
                                    {{$com->customer_name}}
                                </h6>
                            <!-- content -->
                                <p class="small"> 
                                    <span class="text-muted"> {{$com->comment_time}}</span>
                                    {{-- <span class="text-primary ms-3 fw-bold">Verified Purchase</span> --}}
                                </p>
                            <!-- rating -->
                                <p>{{$com->comment_content}}</p>

                            <!-- icon -->
                                {{-- <div class="d-flex justify-content-end mt-4">
                                    <a href="#" class="text-muted"><i class="feather-icon icon-thumbs-up me-1"></i>Helpful</a>
                                    <a href="#" class="text-muted ms-4"><i class="feather-icon icon-flag me-2"></i>Report
                                    abuse</a>
                                </div> --}}
                            </div>
                        </div>
                    @endforeach
            </div>
            <div class="col-4">
                @foreach ($details_product as $key => $value)
                    <form action="{{ URL::to('/save_comment')}}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="customer_id" value="{{$customer_id}}">
                        <input type="hidden" name="product_id" value="{{$value->product_id}}">
                        <div class=" py-4 mb-4">
                            <!-- heading -->
                            <h4>Để lại bình luận</h4>
                            <textarea class="form-control" rows="3" name="comment_content" style="border: 1px solid #ccc"
                            placeholder="Bạn có thích sản phẩm của chúng tôi không"></textarea>
                        </div>
                        <!-- button -->
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn bg-dark active btn--login rounded-4 text-white m-auto">Bình luận</button>
                        </div>
                    </form>
                    @endforeach
            </div>
        </div>
    </div>
</section>

<?php 
    }
?>


<!-- Start Article -->
<section class="py-5">
    <div class="container">
        <div class="row text-left p-2 pb-3">
            <h4>Sản phẩm liên quan</h4>
        </div>

        <!--Start Carousel Wrapper-->
        <div id="carousel-related-product">

            @foreach ($related as $key => $rel)
            <div class="col-12 col-md-3 mb-4">
                <div class="card h-100 rounded-4 border border-0 shadow">
                    <a href="{{ URL::to('/chi-tiet-san-pham/'.$rel->product_id)}}">
                        <img src="{{ URL::to('./upload/product/'.$rel->product_image)}}" class="card-img-top" alt="...">
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
                            <li class="text-danger text-right fw-bold m-auto">{{number_format($rel->product_price, 0, ',', ' ').' '.'VND'}}</li>
                        </ul>
                        <a href="{{ URL::to('/chi-tiet-san-pham/'.$rel->product_id)}}" class="h2 text-decoration-none text-dark fw-bolder">{{$rel->product_name}}</a>
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
</section>
<!-- End Article -->

<!-- End Slider Script -->


@endsection