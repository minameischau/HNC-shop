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

            <?php
                $message = Session::get('message');
                if($message) {
                    echo '<span style="padding: 16px; color: red;">'.$message.'</span>';
                    session()->put('message', null);
                }
            ?>

        <form method="POST" action="{{ URL::to('/save_edit_password')}}" enctype="multipart/form-data">
            {{ csrf_field() }}
        @foreach ($customer as $key => $c)
            
          <div class="card mb-4">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Mật khẩu cũ</p>
                </div>
                <div class="col-sm-9">
                  <input type="password" id="fname" class="form-control--contact" name="old_pass" 
                  placeholder="Nhập mật khẩu cũ" value="" required>
                 
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Mật khẩu mới</p>
                </div>
                <div class="col-sm-9">
                    <input type="password" id="fname" class="form-control--contact" name="new_pass" 
                    placeholder="Nhập mật khẩu mới" value="" required>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Mật khẩu mới</p>
                </div>
                <div class="col-sm-9">
                    <input type="password" id="fname" class="form-control--contact" name="new_pass_2" 
                    placeholder="Nhập lại mật khẩu mới" value="" required>
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