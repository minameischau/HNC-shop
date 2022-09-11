@extends('layout')
@section('content')


<section class="mt-lg-14 mt-8">
  <!-- container -->
  <div class="container-fluid">
    <!-- row -->
    <div class="row">
      <!-- col -->
      <div class="offset-lg-1 col-lg-10 col-12">
        <div class="row align-items-center mb-14">
          <div class="col-md-6">
            <!-- text -->

            <form method="POST" action="{{ URL::to('/save_contact')}}">
              {{ csrf_field() }}

              <?php
                $customer_id = session()->get('customer_id');
              ?>
              <input type="hidden" name="customer_id" value="{{$customer_id}}">
              <!-- input -->
              <div class="mb-3">
                <label class="form-label" for="contact_name"> Họ tên<span class="text-danger">*</span></label>
                <input type="text" id="fname" class="form-control" name="contact_name" placeholder="Enter Your First Name" required>
              </div>
                <!-- input -->
              <div class="mb-3">
                <label class="form-label" for="contact_title"> Tiêu đề</label>
                <input type="text" id="title" name="contact_title" class="form-control" placeholder="Your Title" required>
              </div>
              <div class="mb-3">
                <label class="form-label" for="contact_email">Email<span class="text-danger">*</span></label>
                <input type="email" id="emailContact" name="contact_email" class="form-control" placeholder="Enter Your First Name" required >
              </div>
              <div class="mb-3">
                <!-- input -->
                <label class="form-label" for="contact_phone"> Số điện thoại</label>
                <input type="text" id="phone" name="contact_phone" class="form-control" placeholder="Your Phone Number" required>
              </div>
              <div class=" mb-3">
                <!-- input -->
                <label class="form-label" for="contact_content"> Lời nhắn</label>
                <textarea rows="3" id="comments" name="contact_content" class="form-control" placeholder="Additional Comments"></textarea>
              </div>
              <div class="">
                <!-- btn -->
                <button type="submit" class="btn btn-primary">Gửi</button>
              </div>

          </form>

          </div>
          <!-- col -->
          <div class="col-md-6">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3928.7954024187766!2d105.76797721183239!3d10.033735451499657!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a088182eb6fef7%3A0xb303fab5d0c7230e!2zS1RYIEjhuq11IEdpYW5n!5e0!3m2!1svi!2s!4v1662797195809!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>
<!-- section -->    

@endsection