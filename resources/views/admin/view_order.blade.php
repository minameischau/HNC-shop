@extends('admin-layout')
@section('admin-content')
    <h1>Liệt kê chi tiet don hang</h1>
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
            <h6 class="m-0 font-weight-bold text-primary">Liệt kê đơn hàng</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tên san pham</th>
                            <th>So luong</th>
                            <th>Gia</th>
                            <th>Tong tien</th>
                        </tr>
                    </thead>
                    <tbody>

                        {{-- @foreach ($order_by_id as $item) --}}
                            <tr>
                                
                                <td>{{$order_by_id->product_name}}</td>
                                <td>{{$order_by_id->product_sale_quantity}}</td>
                                <td>{{$order_by_id->product_price}}</td>
                                <td>{{$order_by_id->order_total}}</td>
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

    <h1>Thong tin nguoi mua</h1>
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
            <h6 class="m-0 font-weight-bold text-primary">Thong tin nguoi mua</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tên người đặt</th>
                            <th>So dien thoai </th>
                        </tr>
                    </thead>
                    <tbody>

                        {{-- @foreach ($all_order as $item => $ord) --}}
                            <tr>
                                <td>{{$order_by_id->customer_name}}</td>
                                <td>{{$order_by_id->customer_phone}}</td>
                                
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

    <h1>Liệt kê thong tin van chuyen</h1>
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
            <h6 class="m-0 font-weight-bold text-primary">Thong tin van chuyen</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tên người van chuyen</th>
                            <th>Dia chi </th>
                            <th>So dien thoai </th>
                        </tr>
                    </thead>
                    <tbody>

                        {{-- @foreach ($all_order as $item => $ord) --}}
                            <tr>
                                <td>{{$order_by_id->shipping_name}}</td>
                                <td>{{$order_by_id->shipping_phone}}</td>
                                <td>{{$order_by_id->shipping_phone}}</td>
                                
                            </tr>
                        {{-- @endforeach --}}

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection