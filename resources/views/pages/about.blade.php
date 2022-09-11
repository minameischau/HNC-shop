@extends('layout')
@section('content')

<!-- section -->
<section class="mt-lg-14 mt-8">
    <!-- container -->
    <div class="container">
      <!-- row -->
      <div class="row">
        <!-- col -->
        <div class="offset-lg-1 col-lg-10 col-12">
          <div class="row align-items-center mb-14">
            <div class="col-md-6">
              <!-- text -->
              <div class="ms-xxl-14 me-xxl-15 mb-8 mb-md-0 text-center text-md-start">
                <h1 class="mb-6">HNC's STORY</h1>
                <p class="mb-0 lead">“Be your own kind of gorgeous” – Hãy là vẻ đẹp của riêng bạn. 
                    Hãy nhớ rằng, trên thế giới này có hàng tỷ người đi nữa, bạn vẫn là duy nhất. 
                    Vì vậy, tại sao phải khiến bản thân trở thành một bản sao của ai khác. 
                    Hãy sống và trở thành một phiên bản tốt nhất của chính mình.</p>
              </div>
            </div>
            <!-- col -->
            <div class="col-md-6">
              <div class=" me-6">
                <!-- img -->
                <img src="{{ URL:: asset('./client/assets/img/about.png')}}" alt="" class="img-fluid rounded-3">
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
</section>
<!-- section -->    

@endsection