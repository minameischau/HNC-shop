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
          <div class="card mb-4">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Họ tên</p>
                </div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0">
                    <?php
                      echo $customer_name;
                    ?>
                  </p>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Email</p>
                </div>
                <div class="col-sm-9">
                    @foreach ($customer as $key => $cus)
                      <p class="text-muted mb-0">
                           {{$cus->customer_email}} 
                      </p>
                    @endforeach
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Số điện thoại</p>
                </div>
                <div class="col-sm-9">
                    @foreach ($customer as $key => $cus)
                      <p class="text-muted mb-0">
                          {{$cus->customer_phone}} 
                      </p>
                    @endforeach
                </div>
              </div>
              <hr>
              <div class="row">
                <a href="{{ URL::to('/edit_profile')}}" class="btn btn-dark text-decoration-none col-5 mx-3">
                  Chỉnh sửa
                </a>
                <a href="{{ URL::to('/edit_password')}}" class="btn btn-danger text-decoration-none col-5 mx-3">
                  Đổi mật khẩu
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<!-- End Content -->

@endsection