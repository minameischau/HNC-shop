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
                            <th>Tên admin</th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Hiệu chỉnh</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($all_admin as $item => $adm)

                            <?php
                                $admin_id = session()->get('admin_id');
                                if ($admin_id==1) {
                            ?>
                                    <tr>
                                        <td>{{$adm->admin_name}}</td>
                                        
                                        <td>{{$adm->admin_email}}</td>
                                        <td>
                                            {{$adm->admin_phone}}
                                        </td>
                                        <td class="text-center">
                                            <span>
                                                {{-- <a href="{{ URL::to('/edit_product/'.$adm->admin_id)}}" class="btn btn-primary btn-circle btn-sm">
                                                    <i class="fas fa-pen"></i>
                                                </a> --}}
                                                @if ($adm->admin_id == 1)
                                                    {{-- <a onclick="return confirm('Bạn có chắc chắn muốn xóa?')"
                                                        href="{{ URL::to('/delete_admin/'.$adm->admin_id)}}" 
                                                        class="btn btn-danger btn-circle btn-sm"> --}}
                                                        <i class="fas fa-trash" style="opacity: 0.5"></i>
                                                        {{-- </a> --}}
                                                @elseif($adm->admin_id != 1)
                                                    <a onclick="return confirm('Bạn có chắc chắn muốn xóa?')"
                                                    href="{{ URL::to('/delete_admin/'.$adm->admin_id)}}" 
                                                    class="btn btn-danger btn-circle btn-sm">
                                                    <i class="fas fa-trash" style="opacity: 0.5"></i>
                                                    </a>
                                                @endif
                                            </span>
                                        </td>
                                    </tr>
                            <?php
                                } elseif($admin_id != 1) {
                            ?>
                                <tr>
                                    <td>{{$adm->admin_name}}</td>
                                    
                                    <td>{{$adm->admin_email}}</td>
                                    <td>
                                        {{$adm->admin_phone}}
                                    </td>
                                    <td class="text-center">
                                        <span>
                                            {{-- <a href="{{ URL::to('/edit_product/'.$adm->admin_id)}}" class="btn btn-primary btn-circle btn-sm">
                                                <i class="fas fa-pen"></i>
                                            </a> --}}
                                            {{-- <a onclick="return confirm('Bạn có chắc chắn muốn xóa?')"
                                                href="{{ URL::to('/delete_admin/'.$adm->admin_id)}}" 
                                                class="btn btn-danger btn-circle btn-sm"> --}}
                                                <i class="fas fa-trash" style="opacity: 0.5"></i>
                                            {{-- </a> --}}
                                        </span>
                                    </td>
                                </tr>
                                
                            <?php
                                }
                            ?>
                        
                            
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection