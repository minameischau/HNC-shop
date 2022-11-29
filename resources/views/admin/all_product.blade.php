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
            <h5 class="m-0 font-weight-bold text-primary text-center">Liệt kê sản phẩm</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form action="" class="col-8 dropdown">
                    <a class="collapsed justify-content-between h5 text-decoration-none" style="color: #858796" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        Danh mục
                    </a>
                    <i class="fa-solid fa-chevron-down"></i>
                    {{-- aria-labelledby="dropdownMenuButton" --}}
                    <ul class="collapse list-unstyled pl-3 dropdown-menu" style="margin-left: 1rem" >
                        @foreach ($category as $key => $cate)
                            <li >
                                <a class="text-decoration-none my-1" href="{{ URL::to('/all_product/'.$cate->category_id)}}"
                                    style="color: black !important;">
                                    {{$cate->category_name}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </form>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá</th>
                            <th>Hình sản phẩm</th>
                            <th>Danh mục</th>
                            <th>Hiển thị</th>
                            <th>Tùy chọn</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($all_product as $item => $pro)
                            <tr>
                                <td>{{$pro->product_id}}</td>
                                <td>{{$pro->product_name}}</td>
                                <td>{{$pro->product_price}}</td>
                                <td>
                                    <img src="http://localhost:8000/upload/product/{{$pro->product_image}}" height="100"
                                        width="100" alt="">
                                </td>
                                <td>{{$pro->category_name}}</td>
                                <td class="text-center">
                                    <?php
                                        if($pro->product_status) {
                                    ?>
                                            <a href="{{ URL::to('/unactive-product/'.$pro->product_id)}}"><i style="font-size: 1.75rem" class="fa-sharp fa-solid fa-circle-check text-success"></i></i></a>
                                    <?php
                                        }
                                        else {
                                    ?>    
                                            <a href="{{ URL::to('/active-product/'.$pro->product_id)}}"><i style="font-size: 1.75rem" class="fa-sharp fa-solid fa-circle-xmark text-danger"></i></a>
                                    <?php
                                        }
                                    ?>
                                </td>
                                <td>
                                    <span>
                                        <a href="{{ URL::to('/edit_product/'.$pro->product_id)}}" class="btn btn-primary btn-circle btn-sm">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <a onclick="return confirm('Are you sure?')"
                                            href="{{ URL::to('/delete_product/'.$pro->product_id)}}" 
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