@extends('admin-layout')
@section('admin-content')
    {{-- <h1>Liệt kê sản phẩm</h1> --}}
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
            <h5 class="m-0 font-weight-bold text-primary text-center">Liệt kê khách hàng</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Ảnh đại diện</th>
                            <th>Tên khách hàng</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Hiệu chỉnh</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($all_customer as $item => $cus)
                            <tr>
                                <td>
                                    <img src="./upload/avatar/{{$cus->customer_image}}" height="100"
                                        width="100" alt="">
                                </td>
                                <td>{{$cus->customer_name}}</td>
                                
                                <td>{{$cus->customer_email}}</td>
                                <td>
                                    {{$cus->customer_phone}}
                                </td>
                                <td>
                                    <span>
                                        {{-- <a href="{{ URL::to('/edit_product/'.$cus->customer_id)}}" class="btn btn-primary btn-circle btn-sm">
                                            <i class="fas fa-pen"></i>
                                        </a> --}}
                                        <a onclick="return confirm('Are you sure?')"
                                            href="{{ URL::to('/delete_customer/'.$cus->customer_id)}}" 
                                            class="btn btn-danger btn-circle btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </span>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection