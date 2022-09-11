@extends('layout')
@section('content')


<div class="container">

    <div class="row">
        <div class="col-md-8 order-md-1">
            
            <h4 class="mb-3">Hình thức thanh toán</h4>

            <form action="{{ URL::to('/order-place')}}" method="POST">
                {{ csrf_field() }}
                <div class="d-block my-3">
                    <div class="custom-control custom-radio">
                        <input id="credit" name="payment_option" value="1" type="radio" class="custom-control-input" checked required>
                        <label class="custom-control-label" for="credit">Tiền mặt</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input id="debit" name="payment_option" value="2" type="radio" class="custom-control-input" required>
                        <label class="custom-control-label" for="debit">Chuyển khoản</label>
                    </div>
                <button class="btn btn-primary btn-lg btn-block" type="submit">Dat hang</button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection