@extends('layout')
@section('content')


<section class="h-100">
    <div class="container py-5">
        <div class="row">
            <div class="container container--xs">
                <h1 class="mb-1 text-center">Thank you</h1>
                <div class="fs-14 text-gray text-center mb-5">
                    <p>Cảm ơn bạn đã đặt hàng, đơn hàng của bạn sẽ sớm được được xử lý</p>
                </div>

            </div>
        </div>
    </div>


</section>
 <a href="{{ URL::to('/don-hang')}}" class="btn btn-dark text-decoration-none m-auto mb-4" style="margin-left: 50% !important;">Quay lại</a>

@endsection