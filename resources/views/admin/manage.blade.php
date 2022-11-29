@extends('admin-layout')
@section('admin-content')
    {{-- <h1>Liệt kê danh mục</h1> --}}
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
            <h5 class="m-0 font-weight-bold text-primary text-center">Liệt kê đơn hàng</h5>
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
                    {{-- <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Tên người đặt</th>
                            <th>Tổng giá</th>
                            <th>Hiển thị</th>
                            <th>Tình trạng</th>
                        </tr> --}}
                    </tfoot>
                    <tbody>

                        @foreach ($all_order as $item => $ord)
                            <tr>
                                <td>{{$ord->order_id}}</td>
                                <td>{{$ord->customer_name}}</td>
                                <td>{{$ord->order_total}}</td>
                                <form action="{{ URL::to('/change_order_status/'.$ord->order_id_code)}}" method="POST">
                                    {{ csrf_field() }}
                                    <td style="width: 20%">    
                                        <select class="form-control" name="change_order_status" onchange="this.form.submit();">
                                            <option selected>
                                                <?php
                                                    if ($ord->order_status==0) 
                                                    echo 'Đang xử lý';
                                                    elseif ($ord->order_status==1) 
                                                        echo 'Đang giao hàng';
                                                        else {
                                                        echo 'Đã giao hàng';
                                                        }
                                                
                                                ?>
                                            </option>
                                            <option value="0 " class="<?php if($ord->order_status==0) echo 'd-none'?>">Đang xử lý</option>
                                            <option value="1 " class="<?php if($ord->order_status==1) echo 'd-none'?>">Đang giao hàng</option>
                                            <option value="2 " class="<?php if($ord->order_status==2) echo 'd-none'?>">Đã giao hàng</option>
                                        </select>
                                    </td>
                                </form>
                                <td>
                                    <span>
                                        <a href="{{ URL::to('/view-order/'.$ord->order_id_code)}}" class="btn btn-primary btn-circle btn-sm">
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