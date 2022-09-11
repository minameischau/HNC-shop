@extends('layout')
@section('content')

<section class="h-100">
    <div class="container py-5" style="max-width: 1260px">
      <div class="row d-flex justify-content-center my-4">

        {{-- Liet ke --}}
        <div class="col-md-8">
          <div class="card mb-4">
            <div class="card-header py-3">
              <h5 class="mb-0 text-center">Thông tin sản phẩm</h5>
              <?php
                $content = Cart::content();
                // print_r($content);
              ?>
            </div>
            <div class="card-body py-2">
              <!-- Single item -->
              @foreach ($content as $v_content)
              
              
                <div class="row">
                  <div class="col-lg-2 col-md-12 mb-4 mb-lg-0">
                    <!-- Image -->
                    <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                      <img src="{{ URL::to('./upload/product/'.$v_content->options->image)}}"
                        class="w-75" alt="Blue Jeans Jacket" />
                      <a href="#!">
                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                      </a>
                    </div>
                    <!-- Image -->
                  </div>
    
                  <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
                    <!-- Data -->
                    <p><strong>{{$v_content->name}}</strong></p>
                    <p>Blue, M</p>
                    
                    <!-- Data -->
                  </div>
    
                  <div class="col-lg-2 col-md-6 mb-4 mb-lg-0 d-flex flex-column justify-content-center">
                    <!-- Price -->
                    <p class="text-start text-md-center">
                      <strong>{{number_format($v_content->price, 0, ',', ' ')}}</strong>
                    </p>
                    <!-- Price -->
                  </div>

                  <div class="col-lg-3 col-md-12 mb-4 mb-lg-0 d-flex flex-column justify-content-center">
                    <form action="{{ URL::to('/update-cart-quantity')}}" method="POST">
                      {{ csrf_field() }}
                    <!-- Quantity -->
                    <div class="d-flex mb-4 justify-content-center" style="max-width: 300px">
                      {{-- <li class="list-inline-item"><span class="btn btn-success" id="btn-minus">-</span></li> --}}

                      <li class="list-inline-item">
                        <input type="number" class="quantity" name="cart_quantity" value="{{$v_content->qty}}">
                        <button type="submit" value="" name="update_qty" class=" btn--check">
                          <i class="fa-solid fa-check ml-1"></i>
                        </button>
                        {{-- <span class="badge bg-secondary" name="cart_quantity" id="var-value">{{$v_content->qty}}</span> --}}
                      </li>
                      {{-- <li class="list-inline-item"><span class="btn btn-success" id="btn-plus">+</span></li> --}}
                    </div>
                    <input type="hidden" value="{{$v_content->rowId}}" name="rowId_cart">
                        
                    {{-- <input type="submit" value="cap nhat" name="update_qty"> --}}
                        
                        
                    </form> 
                    <!-- Quantity -->
                  </div>

                  <div class="col-lg-2 col-md-12 mb-4 mb-lg-0 d-flex flex-column justify-content-center">
                    <!-- Price -->
                    <p class="text-start text-md-center">
                      <strong>
                        <?php
                          $subtotal = $v_content->price * $v_content->qty;
                          echo number_format($subtotal, 0, ',', ' ');
                        ?>
                      </strong>
                    </p>
                    <!-- Price -->
                  </div>
                  <div class="col-lg-1 col-md-12 mb-4 mb-lg-0 d-flex flex-column justify-content-center">
                    {{-- <button type="button" class="btn btn-primary btn-sm me-1 mb-2" data-mdb-toggle="tooltip"
                      title="Remove item"> --}}
                      {{-- <div class=""> --}}
                        <a href="{{ URL::to('/delete-to-cart/'.$v_content->rowId)}}" class="cart-quantity-delete">
                          <i class="fas fa-trash mr-1 mb-4 text-danger"></i>
                        </a>
                        {{-- <input type="hidden" name="rowId_cart" value="{{$v_content->rowId}}"> --}}

                      {{-- </div> --}}
                    {{-- </button> --}}
                  </div>
                </div> 
              @endforeach
              

            </div>
                  <hr class="m-0">
        
          </div>

          {{-- Du kien giao hang --}}
          <div class="card mb-4">
            <div class="card-body">
              <p><strong>Dự kiến nhận hàng</strong></p>
              <p class="mb-0">12.10.2020 - 14.10.2020</p>
            </div>
          </div>

          {{-- Chung toi chap nhan cac hinh thuc thanh toan --}}
          <div class="card mb-4 mb-lg-0">
            <div class="card-body">
              <p><strong>Chúng tôi chấp nhận hình thức thanh toán</strong></p>
              <img class="me-2" width="45px"
                src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce-gateway-stripe/assets/images/visa.svg"
                alt="Visa" />
              <img class="me-2" width="45px"
                src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce-gateway-stripe/assets/images/amex.svg"
                alt="American Express" />
              <img class="me-2" width="45px"
                src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce-gateway-stripe/assets/images/mastercard.svg"
                alt="Mastercard" />
            </div>
          </div>
        </div>

        {{-- Summary --}}
        <div class="col-md-4">
          <div class="card mb-4">
            <div class="card-header py-3">
              <h5 class="mb-0">Tổng cộng</h5>
            </div>
            <div class="card-body">
              <ul class="list-group list-group-flush">
                <li
                  class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                  Sản phẩm
                  <span>{{Cart::subtotal()}}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                  Shipping
                  <span>Gratis</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                  Thuế
                  <span>{{Cart::tax()}}</span>
                </li>
                <li
                  class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                  <div>
                    <strong>Tổng cộng</strong>
                    <strong>
                      <p class="mb-0">(gồm VAT)</p>
                    </strong>
                  </div>
                  <span><strong>{{Cart::total()}}</strong></span>
                </li>
              </ul>
  
              <button type="button" class="btn btn-dark text-decoration-none">
                <a class="text-decoration-none text-white" href="{{ URL::to('/checkout')}}">Thanh toán</a>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


@endsection
