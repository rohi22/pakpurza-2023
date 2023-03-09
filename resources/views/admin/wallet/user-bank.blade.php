<link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
@extends('layouts.ui.scaffold')
@section('title')
Simsar &copy;
@endsection
@section('ogTags')
<meta property="og:locale" content="en_PK">
<meta property="og:type" content="website">
@if(!empty($setting))
<meta property="og:title" content="{{ $setting->meta_title }}">
<meta property="og:description" content="{{ $setting->meta_description }}">
@endif
<meta property="og:url" content="{{ '/' }}">
<meta property="og:site_name" content="Simsar">
@endsection
@section('twitterTags')
<meta name="twitter:card" content="summary_large_image">
@if(!empty($setting))
<meta name="twitter:title" content="{{ $setting->meta_title }}">
<meta name="twitter:description" content="{{ $setting->meta_description }}">
@endif
<meta name="twitter:site" content="@SIMSAR">
<meta name="twitter:creator" content="@SIMSAR">
@endsection
@section('content')
<div class="container-fluid bgf1">
  <div class="container">
    <div class="row">
      
      <div class="col-md-9 m-t-b-20">
        <div class="row">
          <div class="col-12 col-md-2 text-right backgroundWhite wallet-left">
            <div class="row p-t-b-10">
              <div class="col-md-12 text-center p-t-b-10 hide-mobile">
                  <img src="images/profile-image.png" class="max-width-100">
                  <a class="global-anchor font-700 font-18 display-block" href="#">Abid Ali</a>
                  <p class="isLoginHello m-t-5">@user_name</p>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 col text-center p-t-b-20 wallet-list active">
                <i class="fa fa-user font-size-28 color-e9 active" aria-hidden="true"></i>
                <p class="font-12 color-e9 active"> Wallet </p>
              </div>
              <div class="col-md-12 col text-center p-t-b-20 wallet-list">
                <i class="fa fa-history font-size-28 color-e9" aria-hidden="true"></i>
                <p class="font-12 color-e9"> Deposit Funds </p>
              </div>
              <div class="col-md-12 col text-center p-t-b-20 wallet-list">
                <i class="fa fa-money-bill-wave font-size-28 color-e9" aria-hidden="true"></i>
                <p class="font-12 color-e9"> Transaction </p>
              </div>
              <div class="col-md-12 col text-center p-t-b-20 wallet-list">
                <i class="fa fa-wallet font-size-28 color-e9" aria-hidden="true"></i>
                <p class="font-12 color-e9"> Withdraw </p>
              </div>
              <div class="col-md-12 col text-center p-t-b-20 wallet-list">
                <i class="fa fa-money-bill-wave font-size-28 color-e9" aria-hidden="true"></i>
                <p class="font-12 color-e9"> Safe Pay </p>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-10 text-left backgroundWhite wallet-right">
            <div class="row">
              <div class="col-12 m-t-b-10">
                <h2 class="color-grey-theme">My Banks <a href="javascript:;"  class=" btn btn-sm btn-danger float-right" data-toggle="modal" data-target="#addBankModal">  <i class="fa fa-plus"></i> Add</a></h2>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title of Account</th>
                                <th>Account No.</th>
                                <th>Bank Name</th>
                                <th>Branch Code</th>
                                <th>Branch Address</th>
                                <th>IBAN No.</th>
                                <th>Swift Code</th>
                                <th>Action</th>
                                
                                
                            </tr>
                        </thead>
                        <tbody>
                          @if(count($banks))
                            @foreach($banks as $key=>$bank)
                              <tr>
                                  <td>{{ $key }}</td>
                                  <td>{{ $bank->ac_title }}</td>
                                  <td>{{ $bank->ac_number }}</td>
                                  <td>{{ $bank->name }}</td>
                                  <td>{{ $bank->branch_code }}</td>
                                  <td>{{ $bank->branch_address }}</td>
                                  <td>{{ $bank->iban_no }}</td>
                                  <td>{{ $bank->swift_code }}</td>
                                  <td>
                                    <form action="{{ route('bank.destroy',$bank->id) }}" method="post" style="float:left;"> @method('DELETE')
                                      <button class="btn btn-danger" type="submit">
                                          <i class="fa fa-trash"></i>
                                      </button>
                                    </form>
                                      <button class="btn btn-info edit" data-id="{{ $bank->id }}">
                                          <i class="fa fa-edit"></i>
                                      </button>
                                  </td>
                              </tr>    
                              @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 m-t-b-20 padding-zero-768" >
           @include('partials.ui.user-navigation')

      </div>
    </div>
  </div>
</div>


<!--Add Bank Modal -->
<div class="modal fade" id="addBankModal" tabindex="-1" role="dialog" aria-labelledby="addBankModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="{{ route('bank.store') }}" method="post">@csrf
        <div class="modal-header">
          <h5 class="modal-title" id="addBankModal">Add Bank</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <label class="form-control-label font-bold font-14">Account title</label>
                    <input type="text" class="form-control" name="ac_title" placeholder="Account Title">
                </div>
                <div class="col-md-6">
                    <label class="form-control-label font-bold font-14">Account Number</label>
                    <input type="number" class="form-control" name="ac_number" placeholder="Account Number">
                </div>
                <div class="col-md-6">
                    <label class="form-control-label font-bold font-14">Bank Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Bank Name">
                </div>
                <div class="col-md-6">
                    <label class="form-control-label font-bold font-14">Branch Code</label>
                    <input type="number" class="form-control" name="branch_code" placeholder="Branch Code">
                </div>
                <div class="col-md-6">
                    <label class="form-control-label font-bold font-14">Branch Address</label>
                    <input type="text" class="form-control" name="branch_address" placeholder="Branch Address">
                </div>
                <div class="col-md-6">
                    <label class="form-control-label font-bold font-14">IBAN No.</label>
                    <input type="text" class="form-control" name="iban_no" placeholder="IBAN No.">
                </div>
                <div class="col-md-6">
                    <label class="form-control-label font-bold font-14">Swift Code</label>
                    <input type="text" class="form-control" name="swift_code" placeholder="Swift Code">
                </div>
                <div class="col-md-6 m-t-20">
                    <button type="button" data-dismiss="modal" class="btn btn-danger m-t-b-10 width-100">Cancel</button> 
                </div>
                <div class="col-md-6 m-t-20">
                    <button type="submit" class="btn btn-success m-t-b-10 width-100" >Submit</button>
                </div>
            </div>
    </form>
    </div>
  </div>
</div>
</div>


<!--Edit Bank Modal -->
<div class="modal fade" id="editBankModal" tabindex="-1" role="dialog" aria-labelledby="editBankModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="" method="post">@csrf @method("PATCH")
        <div class="modal-header">
          <h5 class="modal-title" id="editBankModal">Edit Bank</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <label class="form-control-label font-bold font-14">Account title</label>
                    <input type="text" class="form-control ac_title" name="ac_title" placeholder="Account Title">
                </div>
                <div class="col-md-6">
                    <label class="form-control-label font-bold font-14">Account Number</label>
                    <input type="text" class="form-control ac_number" name="ac_number" placeholder="Account Number">
                </div>
                <div class="col-md-6">
                    <label class="form-control-label font-bold font-14">Bank Name</label>
                    <input type="text" class="form-control name" name="name" placeholder="Bank Name">
                </div>
                <div class="col-md-6">
                    <label class="form-control-label font-bold font-14">Branch Code</label>
                    <input type="text" class="form-control branch_code" name="branch_code" placeholder="Branch Code">
                </div>
                <div class="col-md-6">
                    <label class="form-control-label font-bold font-14">Branch Address</label>
                    <input type="text" class="form-control branch_address" name="branch_address" placeholder="Branch Address">
                </div>
                <div class="col-md-6">
                    <label class="form-control-label font-bold font-14">IBAN No.</label>
                    <input type="text" class="form-control iban_no" name="iban_no" placeholder="IBAN No.">
                </div>
                <div class="col-md-6">
                    <label class="form-control-label font-bold font-14">Swift Code</label>
                    <input type="text" class="form-control swift_code" name="swift_code" placeholder="Swift Code">
                </div>
                <div class="col-md-6 m-t-20">
                    <button type="button" data-dismiss="modal" class="btn btn-danger m-t-b-10 width-100">Cancel</button> 
                </div>
                <div class="col-md-6 m-t-20">
                    <button type="submit" class="btn btn-success m-t-b-10 width-100" >Submit</button>
                </div>
            </div>
            
    </form>
    </div>
  </div>
</div>
<button id="editModalShow" type="hidden" data-toggle="modal" data-target="#editBankModal"></button>

@endsection
@push('scripts')
<script>
  $(document).ready(function(){
    $(document).on('click','.edit',function(){
      $.ajax({
        url:"bank/"+$(this).attr('data-id')+"/edit",
        type:"GET",
        complete:function(data){
          let  json = JSON.parse(data.responseText);
          let id = json['id']
            $('.name').val(json['name']);
            $('.ac_title').val(json['ac_title']);
            $('.ac_number').val(json['ac_number']);
            $('.branch_code').val(json['branch_code']);
            $('.branch_address').val(json['branch_address']);
            $('.iban_no').val(json['iban_no']);
            $('.swift_code').val(json['swift_code']);
            $('.swift_code').closest('form').attr('action','bank/'+id);
            $("#editModalShow").trigger('click');
        }
      });  
    });
  });
</script>
@endpush
