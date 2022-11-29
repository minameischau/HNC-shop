@extends('layout')
@section('content')

<!-- Start Content -->
<section style="">
    <div class="container py-5">
  
      <div class="row">
        <div class="col-lg-4">
          <div class="card mb-4">
            <div class="card-body text-center">
                    <?php
                        $customer_id = session()->get('customer_id');
                        $customer_name = session()->get('customer_name');
                        // $customer_img = session()->get('customer_image');
                        // print_r($customer->customer_image);
                        // echo $customer;
                        if ($customer_name != NULL) {
                    ?>

              @foreach ($customer as $key => $cus)
                  <img src="{{ URL::to('./upload/avatar/'.$cus->customer_image)}}" alt="avatar"
                    class="rounded-circle img-fluid" style="width: 150px;">
              @endforeach

              
              <h5 class="my-3">
                    <?php echo $customer_name?>
                    <?php
                        }
                    ?>
              </h5>
              
            </div>
          </div>
        </div>
        <div class="col-lg-8">
        <form method="POST" action="{{ URL::to('/save_edit')}}" enctype="multipart/form-data">
            {{ csrf_field() }}
        @foreach ($customer as $key => $c)
            
          <div class="card mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Ảnh đại diện</p>
                    </div>
                    <div class="col-sm-9">
                      <input type="file" id="fname" class="" name="customer_image" 
                      placeholder="Chọn ảnh đại diện" value="{{$cus->customer_image}}">
                    </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Họ tên</p>
                  </div>
                  <div class="col-sm-9">
                    <input type="text" id="fname" class="form-control--contact" name="customer_name" 
                    placeholder="Nhập tên của bạn" value="{{$cus->customer_name}}" required>
                  
                  </div>
                </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Email</p>
                </div>
                <div class="col-sm-9">
                    <input type="text" id="fname" class="form-control--contact" name="customer_email" 
                    placeholder="Nhập email của bạn" value="{{$cus->customer_email}}" required>

                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Số điện thoại</p>
                </div>
                <div class="col-sm-9">
                    <input type="text" id="fname" class="form-control--contact" name="customer_phone" 
                    placeholder="Nhập sdt của bạn" value="{{$cus->customer_phone}}" required>

                </div>
              </div>
              <hr>
              <div class="row">
                <button type="submit" class="btn btn-dark text-decoration-none">
                  Đồng ý
                </button>
              </div>
            </div>
          </div>
    @endforeach
    </form>
        </div>
      </div>
    </div>
  </section>
<!-- End Content -->

@endsection