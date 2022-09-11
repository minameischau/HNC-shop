@extends('layout')
@section('content')

<section class="h-100">
    <div class="container py-5">
        <div class="row d-flex justify-content-center my-4">
            <div class="col-md-8 order-md-1">
            <h4 class="mb-3 text-center">Địa chỉ nhận hàng</h4>


            <form class="needs-validation" novalidate action="{{ URL::to('/save-checkout-customer')}}" method="POST">
    
                {{ csrf_field() }}
    
                <div class="row">
                    <div class="mb-3">
                        <label for="firstName">Họ tên</label>
                        <input name="shipping_name" type="text" class="form-control" id="firstName" placeholder="" value="" required>
                        <div class="invalid-feedback">
                            Họ tên trống.
                        </div>
                    </div>
                </div>
    
                <div class="mb-3">
                    <label for="email">Email <span class="text-muted"></span></label>
                    <input name="shipping_email" type="email" class="form-control" id="email" placeholder="you@example.com">
                    <div class="invalid-feedback">
                        Nhập mail hợp lệ để nhận thông tin giao hàng.
                    </div>
                </div>
    
                <div class="mb-3">
                    <label for="address">Địa chỉ</label>
                    <input name="shipping_address" type="text" class="form-control" id="address" placeholder="1234 Main St" required>
                    <div class="invalid-feedback">
                        Địa chỉ trống.
                    </div>
                </div>
    
                <div class="mb-3">
                    <label for="phone">Số điện thoại</label>
                    <input name="shipping_phone" type="tel" class="form-control" id="phone" placeholder="128888" required>
                    <div class="invalid-feedback">
                        Số điện thoại trống.
                    </div>
                </div>
    
                <div class="mb-3">
                    <label for="note">Ghi chú</label>
                    <textarea name="shipping_note" id="note" cols="80" rows="3" ></textarea>
                </div>
                <button class="btn btn-dark btn--login" type="submit">Tiếp tục</button>
            </form>    
            {{-- <h4 class="mb-3">Payment</h4>
    
            <div class="d-block my-3">
                <div class="custom-control custom-radio">
                    <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                    <label class="custom-control-label" for="credit">Credit card</label>
                </div>
                <div class="custom-control custom-radio">
                    <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
                    <label class="custom-control-label" for="debit">Debit card</label>
                </div>
                <div class="custom-control custom-radio">
                    <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
                    <label class="custom-control-label" for="paypal">PayPal</label>
                </div>
            </div> --}}
            </div>
        </div>
    
    </div>
</section>

@endsection