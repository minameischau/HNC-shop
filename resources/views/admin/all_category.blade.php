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
            <h6 class="m-0 font-weight-bold text-primary">Liệt kê danh mục</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên danh mục</th>
                            <th>Ngày thêm</th>
                            <th>Hiển thị</th>
                            <th>Tùy chọn</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Tên danh mục</th>
                            <th>Ngày thêm</th>
                            <th>Hiển thị</th>
                            <th>Tùy chọn</th>
                        </tr>
                    </tfoot>
                    <tbody>

                        @foreach ($all_category_product as $item => $cate_pro)
                            <tr>
                                <td>{{$cate_pro->category_id}}</td>
                                <td>{{$cate_pro->category_name}}</td>
                                <td>Edinburgh</td>
                                <td>
                                    <?php
                                        if($cate_pro->category_status) {
                                    ?>
                                            <a href="{{ URL::to('/unactive-category-product/'.$cate_pro->category_id)}}"><i class="fa-sharp fa-solid fa-circle-check text-success"></i></i></a>
                                    <?php
                                        }
                                        else {
                                    ?>    
                                            <a href="{{ URL::to('/active-category-product/'.$cate_pro->category_id)}}"><i class="fa-sharp fa-solid fa-circle-xmark text-danger"></i></a>
                                    <?php
                                        }
                                    ?>
                                </td>
                                <td>
                                    <span>
                                        <a href="{{ URL::to('/edit_category_product/'.$cate_pro->category_id)}}" class="btn btn-primary btn-circle btn-sm">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <a onclick="return confirm('Are you sure?')"
                                            href="{{ URL::to('/delete_category_product/'.$cate_pro->category_id)}}" 
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