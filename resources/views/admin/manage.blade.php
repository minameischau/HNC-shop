@extends('admin-layout')
@section('admin-content')
    <h1>Liệt kê danh mục</h1>
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
                            <th>ID</th>
                            <th>Tên người đặt</th>
                            <th>Tổng giá</th>
                            <th>Hiển thị</th>
                            <th>Tình trạng</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Tên người đặt</th>
                            <th>Tổng giá</th>
                            <th>Hiển thị</th>
                            <th>Tình trạng</th>
                        </tr>
                    </tfoot>
                    <tbody>

                        @foreach ($all_order as $item => $ord)
                            <tr>
                                <td>{{$ord->order_id}}</td>
                                <td>{{$ord->customer_name}}</td>
                                <td>{{$ord->order_total}}</td>
                                <td>{{$ord->order_status}}</td>
                                <td>
                                    <span>
                                        <a href="{{ URL::to('/view-order/'.$ord->order_id)}}" class="btn btn-primary btn-circle btn-sm">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a onclick="return confirm('Are you sure?')"
                                            href="{{ URL::to('/delete_order/'.$ord->order_id)}}" 
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