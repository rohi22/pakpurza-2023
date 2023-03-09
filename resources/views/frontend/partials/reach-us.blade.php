@php
$setting = App\Models\WebSetting::first(); 
@endphp

<div class="container-fluid bgf1">
  <div class="container">
    <div class="row">
      <div class="col-md-12 m-t-b-20 padding-zero-768">
        <div class="row">
          <div class="col-12 col-md-12">
            <div class="row bgf1">
                <div class="col-md-10 text-center mx-auto m-t-b-20">
                    <div class="row">
                        <div class="col-md-12 m-b-15 arabic-text-center">
                            <span class="subscriptionHeading font-30">Reach To Us</span>
                        </div>
                        <div class="col-md-4">
                            <i class="fa fa-phone font-30 colorRed"></i>
                            <p>{{$setting->reach_us_number}}</p>
                        </div>
                        <div class="col-md-4">
                            <i class="fa fa-envelope font-30 colorRed"></i>
                            <p>{{$setting->reach_us_email}}</p>
                        </div>
                        <div class="col-md-4">
                            <i class="fa fa-map-marker font-30 colorRed"></i>
                            <p>{{$setting->reach_us_address}}</p>
                        </div>
                    </div>
                </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
