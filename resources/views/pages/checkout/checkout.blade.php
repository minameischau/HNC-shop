@extends('layout')
@section('content')

{{-- <section class="h-100">
    <div class="container py-5">
        <div class="row d-flex justify-content-center my-4">
            <div class="col-md-8 order-md-1">
            <h4 class="mb-3 text-center">Địa chỉ nhận hàng</h4>

            @foreach ($profile as $key => $prof)
            <form class="needs-validation" novalidate action="{{ URL::to('/save-checkout-customer')}}" method="POST">
    
                {{ csrf_field() }}
                
                <input type="hidden" name="order_time" value="
                <?php
                    echo date('d-m-Y');
                ?>
                ">

                <div class="row">
                    <div class="mb-3">
                        <label for="firstName">Họ tên</label>
                        <input name="shipping_name" type="text" class="form-control checkout--input" id="firstName" placeholder="" value="{{$prof->customer_name}}" required>
                        <div class="invalid-feedback">
                            Họ tên trống.
                        </div>
                    </div>
                </div>
    
                <div class="mb-3">
                    <label for="email">Email <span class="text-muted"></span></label>
                    <input name="shipping_email" type="email" class="form-control checkout--input" id="email" placeholder="" value="{{$prof->customer_email}}">
                    <div class="invalid-feedback">
                        Nhập mail hợp lệ để nhận thông tin giao hàng.
                    </div>
                </div>
    
                <div class="mb-3">
                    <label for="address">Địa chỉ</label>
                    <input name="shipping_address" type="text" class="form-control checkout--input" id="address" placeholder="1234 Main St" required>
                    <div class="invalid-feedback">
                        Địa chỉ trống.
                    </div>
                </div>
    
                <div class="mb-3">
                    <label for="phone">Số điện thoại</label>
                    <input name="shipping_phone" type="tel" class="form-control checkout--input" id="phone" placeholder="" value="{{$prof->customer_phone}}" required>
                    <div class="invalid-feedback">
                        Số điện thoại trống.
                    </div>
                </div>
    
                <div class="mb-3">
                    <label for="note">Ghi chú</label>
                    <textarea name="shipping_note" id="note" cols="80" rows="3" required></textarea>
                </div>
                <button class="btn btn-dark btn--login" type="submit">Tiếp tục</button>
            </form>   
            @endforeach
            </div>
        </div>
    
    </div>
</section> --}}

<section class="h-100">
    <div class="container py-5" style="max-width: 1260px">
      <div class="row d-flex justify-content-center my-4">

        {{-- Liet ke --}}
        <div class="col-md-8">
          <div class="card mb-4">

            <div class="card-header py-3">
              <h5 class="mb-0 text-center">Địa chỉ nhận hàng</h5>
            </div>

            <div class="card-body py-2">
              <!-- Single item -->
              @foreach ($profile as $key => $prof)
              <form class="needs-validation" novalidate action="{{ URL::to('/order-place')}}" method="POST">
      
                  {{ csrf_field() }}
                  
                  <input type="hidden" name="order_time" value="
                  <?php
                      echo date('d-m-Y');
                  ?>
                  ">
  
                  <div class="row">
                      <div class="mb-3">
                          <label for="firstName">Họ tên</label>
                          <input name="shipping_name" type="text" class="form-control checkout--input" id="firstName" placeholder="" value="{{$prof->customer_name}}" required>
                          <div class="invalid-feedback">
                              Họ tên trống.
                          </div>
                      </div>
                  </div>
      
                  <div class="mb-3">
                      <label for="email">Email <span class="text-muted"></span></label>
                      <input name="shipping_email" type="email" class="form-control checkout--input" id="email" required placeholder="" value="{{$prof->customer_email}}">
                      <div class="invalid-feedback">
                          Nhập mail hợp lệ để nhận thông tin giao hàng.
                      </div>
                  </div>
      
                  <div class="mb-3">
                      <label for="address">Địa chỉ</label>
                      <input name="shipping_address" type="text" class="form-control checkout--input" id="address" placeholder="1234 Main St" required>
                      <div class="invalid-feedback">
                          Địa chỉ trống.
                      </div>
                  </div>
      
                  <div class="mb-3">
                      <label for="phone">Số điện thoại</label>
                      <input name="shipping_phone" type="tel" class="form-control checkout--input" id="phone" placeholder="" value="{{$prof->customer_phone}}" required>
                      <div class="invalid-feedback">
                          Số điện thoại trống.
                      </div>
                  </div>
      
                  <div class="mb-3">
                      <label for="note">Ghi chú</label>
                      <textarea name="shipping_note" id="note" cols="80" rows="3" style="border: 1px solid #ccc" required></textarea>
                  </div>
                  {{-- <button class="btn btn-dark btn--login" type="submit">Tiếp tục</button> --}}
              {{-- </form>    --}}
              @endforeach
            </div>
                  {{-- <hr class="m-0"> --}}
          </div>
          {{-- Du kien giao hang --}}
          {{-- Chung toi chap nhan cac hinh thuc thanh toan --}}
        </div>

        {{-- Summary --}}
        <div class="col-md-4">
          <div class="card mb-4">
            <div class="card-header py-3">
              <h5 class="mb-0 text-center">Hình thức thanh toán</h5>
            </div>
            <div class="card-body">
                {{-- <form action="{{ URL::to('/order-place')}}" method="POST"> --}}
                    {{-- {{ csrf_field() }} --}}
                    <div class="d-block my-3">
                        <div class="custom-control custom-radio">
                            {{-- <input id="credit" name="payment_option" value="1" type="radio" class="custom-control-input" checked required>
                            <label class="custom-control-label" for="credit">Tiền mặt</label> --}}
                            <label class="checkbox-wrap">Tiền mặt
                                <input type="radio" checked="checked" name="payment_option" value="1">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="custom-control custom-radio">
                            {{-- <input id="debit" name="payment_option" value="2" type="radio" class="custom-control-input" required>
                            <label class="custom-control-label" for="debit">Chuyển khoản</label> --}}
                            <label class="checkbox-wrap">Chuyển khoản
                                <input type="radio" name="payment_option" value="2"  data-bs-toggle="popover" data-bs-title="Thông tin tài khoản" data-bs-content="STK: 88886668888 -   
                                                                                                                                                                    HD Bank">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    <button class="btn bg-dark active btn--login rounded-4 text-white m-auto" type="submit">Đặt hàng</button> &nbsp;
                    </div> 

                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

@endsection