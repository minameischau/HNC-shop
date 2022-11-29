@extends('admin-layout')
@section('admin-content')
    {{-- <h1>Liệt kê chi tiet don hang</h1> --}}
    <!-- DataTales Example -->

    <?php
        $message = Session::get('message');
        if($message) {
            echo '<span style="padding: 16px; color: red;">'.$message.'</span>';
            session()->put('message', null);
        }
    ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary text-center ">Liệt kê đơn hàng</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                            <th>Giá tiền</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($order_detail as $key => $ord)
                            <tr>
                                
                                <td>{{$ord->product_name}}</td>
                                <td>{{$ord->product_sale_quantity}}</td>
                                <td>{{$ord->product_price}}</td>
                                <td>{{$ord->product_sale_quantity * $ord->product_price}}</td>
                            </tr>
                        @endforeach

                        <?php 
                            // print_r($order_detail);
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <br>
    <br>
    <br>

    {{-- <h1>Thong tin nguoi mua</h1> --}}
    <!-- DataTales Example -->

    <?php
        $message = Session::get('message');
        if($message) {
            echo '<span style="padding: 16px; color: red;">'.$message.'</span>';
            session()->put('message', null);
        }
    ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary text-center">Thông tin người đặt</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tên người đặt</th>
                            <th>Số điện thoại </th>
                        </tr>
                    </thead>
                    <tbody>

                        {{-- @foreach ($customer as $item => $cus) --}}
                            <tr>
                                <td>{{$customer->customer_name}}</td>
                                <td>{{$customer->customer_phone}}</td>
                                
                            </tr>
                        {{-- @endforeach --}}

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <br>
    <br>
    <br>

    {{-- <h1>Liệt kê thong tin van chuyen</h1> --}}
    <!-- DataTales Example -->

    <?php
        // $message = Session::get('message');
        // if($message) {
        //     echo '<span style="padding: 16px; color: red;">'.$message.'</span>';
        //     session()->put('message', null);
        // }
    ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h5 class="m-0 font-weight-bold text-primary text-center">Thông tin người nhận</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tên người nhận</th>
                            <th>Địa chỉ</th>
                            <th>Số điện thoại</th>
                        </tr>
                    </thead>
                    <tbody>

                        {{-- @foreach ($all_order as $item => $ord) --}}
                            <tr>
                                <td>{{$shipping->shipping_name}}</td>
                                <td>{{$shipping->shipping_phone}}</td>
                                <td>{{$shipping->shipping_phone}}</td>
                                
                            </tr>
                        {{-- @endforeach --}}

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    <div class="row justify-content-center">
        <a name="" class=" btn-accept text-decorate-none " href="{{ URL::to('/manage-order')}}">Quay lại</a>
    </div>
@endsection