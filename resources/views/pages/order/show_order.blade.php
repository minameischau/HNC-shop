@extends('layout')
@section('content')


<section class="h-100">
  <div class="container py-5" style="max-width: 1260px">
    <div class="row d-flex justify-content-center my-4">

            
      {{-- Liet ke --}}
      <div class="col-md-10">
        <div class="card mb-4">
          <div class="card-header py-3">
            <h5 class="mb-0 text-center">Đơn hàng </h5>
            <?php
              // $content = Cart::content();
              // print_r($customer);
            ?>
          </div>
          <div class="card-body py-2">
            <!-- Single item -->
            
            <div class="row">
              <div class="col-lg-1 col-md-12 mb-4 mb-lg-0">
                <p><strong>STT</strong></p>
              </div>

              <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
                <p><strong>Mã đơn</strong></p>
                
              </div>

              <div class="col-lg-2 col-md-6 mb-4 mb-lg-0 d-flex flex-column">
                <p><strong>Tổng cộng</strong></p>
              </div>

              <div class="col-lg-3 col-md-12 mb-4 mb-lg-0 d-flex flex-column">
                <p><strong>Thời gian đặt</strong></p>
              </div>

              <div class="col-lg-2 col-md-12 mb-4 mb-lg-0 d-flex flex-column">
                <p><strong>Tình trạng</strong></p>
              </div>

              <div class="col-lg-2 col-md-12 mb-4 mb-lg-0 d-flex flex-row space-between">
                <p><strong>Tùy chỉnh</strong></p>
              </div>

          </div>


            <?php
              $cnt = 1;
            ?>

            @foreach ($customer as $key => $cus)
              <div class="row">
                  <div class="col-lg-1 col-md-12 mb-4 mb-lg-0">
                    <?php
                      echo $cnt;
                      $cnt++;  
                    ?>
                  </div>
    
                  <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
                    <!-- Data -->
                    <p>{{$cus->order_id_code}}</p>
                    
                    <!-- Data -->
                  </div>
    
                  <div class="col-lg-2 col-md-6 mb-4 mb-lg-0 d-flex flex-column">
                    <!-- Price -->
                    <p class="text-start">
                      {{$cus->order_total}}
                    </p>
                    <!-- Price -->
                  </div>

                  <div class="col-lg-3 col-md-12 mb-4 mb-lg-0 d-flex flex-column">
                    
                    <!-- Quantity -->
                    {{-- <div class="d-flex mb-4" style="max-width: 300px">
                      
                    </div> --}}
                    <p class="text-start">
                      
                        {{$cus->order_time}}
                      
                    </p>
                    
                    <!-- Quantity -->
                  </div>

                  <div class="col-lg-2 col-md-12 mb-4 mb-lg-0 d-flex flex-column">
                    <!-- Price -->
                    <p class="text-start">
                      
                        {{-- {{$cus->order_status}} --}}
                        <?php
                          if ($cus->order_status==0) 
                            echo 'Đang xử lý';
                            elseif ($cus->order_status==1) 
                              echo 'Đang giao hàng';
                              else {
                                echo 'Đã giao hàng';
                              }
                        
                        ?>
                      
                    </p>
                    <!-- Price -->
                  </div>

                  <div class="col-lg-2 col-md-12 mb-4 mb-lg-0 d-flex flex-row space-between">
                    {{-- <button type="button" class="btn btn-primary btn-sm me-1 mb-2" data-mdb-toggle="tooltip"
                      title="Remove item"> --}}
                      {{-- <div class=""> --}}
                        <?php
                          if ($cus->order_status==0) {
                            ?>
                        <a onclick="return confirm('Bạn có chắc chắn hủy?')"
                            href="{{ URL::to('/delete_order/'.$cus->order_id_code)}}" 
                            class="">
                            <i class="mx-3 fas fa-trash text-danger"></i>
                        </a>
                            <?php
                          }
                              else {
                                ?>
                                <span class="" style="opacity: 0.5">
                                  <i class="mx-3 fas fa-trash text-danger"></i>
                              </span>
                                <?php
                              }
                        
                        ?>
                        <a href="{{ URL::to('/cus_detail_order/'.$cus->order_id_code)}}" class="">
                          <i class="mx-3 fas fa-eye text-primary"></i>
                        </a>
                      {{-- <input type="hidden" name="rowId_cart" value="{{$v_content->rowId}}"> --}}

                    {{-- </div> --}}
                  {{-- </button> --}}
                </div>

              </div>
            @endforeach
            
              
              {{-- <hr> --}}
              {{-- <div class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                <div>
                  <strong>Tổng cộng</strong>
                </div>
                <span><strong class="text-danger"></strong></span>
              </div>  --}}
            

          </div>
                <hr class="m-0">
      
        </div>
      </div>
    </div>
  </div>
</section>


@endsection