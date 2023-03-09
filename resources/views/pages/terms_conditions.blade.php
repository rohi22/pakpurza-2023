@extends('frontend.layouts.app')

<!--@section('title')-->

<p>Terms & Conditions</p>

<!--@endsection-->
@section('content')

<div class="container-fluid bgwhite">
  <div class="container">
    <div class="row">
      <div class="col-md-12 m-t-b-20 padding-zero-768">
        <div class="row">
          <div class="col-12 col-md-12">
            <div class="row">
              <div class="col-md-8 text-center mx-auto">
                <!--<p class="font-bold font-22">Have Something to Ask? </p>-->
                <span class="subscriptionHeading"> {{ $page->title }} Pakpurza</span>
                <hr class="subscriptionHr">
                <!--<p class="font-bold">-->
                <!--    We are here to help and answer any question you might have.<br>-->
                <!--    We look forward to hearing from you :)-->
                <!--</p>-->
              </div>
            </div>
            <div class="row">
                <div class="col-md-12 ">
                    <div class="row">
                        <div class='col-md-4'></div>
                        <div class='col-md-4'>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                      @if(!empty($page->image))
                     <img src="{{ asset('public/images/common-pages/'.$page->image)}}" width="100%" >
                                </div>
                            </div>
                        </div>
                        <div class='col-md-4'></div>
                    </div>
                    
                   
                    
                @endif
                </div>
                
                <div class="col-md-12 ">
                   {!!$page->content!!}
                </div>
             
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@include('frontend.partials.reach-us')
<div class="container-fluid text-center hide-desktop m-t-80" >
  <div class="container">
    <div class="row">
        <div class="col-12">
            <img src="{{ asset('asset/images/addhorizontal2.jpg')}}" class="width-100">
        </div>
    </div>
  </div>
</div>

<!--<div class="container-fluid table-show">-->
<!--    <div class="row">-->
<!--        <div class="col-12 padding-zero">-->
<!--           <img src="{{ asset('asset/images/addhorizontal2.jpg')}}" class="width-100">-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
@endsection
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/additional-methods.min.js"></script>

<!--<script>-->

<!--</script>-->
@endpush