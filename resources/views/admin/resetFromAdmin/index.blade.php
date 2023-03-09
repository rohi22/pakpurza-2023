@extends('admin.layouts.scaffold')

@section('title')
Simsar | Reset Password
@endsection
@push('styles')
<style>
    
  
   
   .w{
       width: 0%;
   }
   
   .f-s{
       font-size:12px;
   } 
    
</style>
@endpush
@section('content')
@include('partials.ui.styles')

<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.4.2/bootstrap-tagsinput.css">

    
@if(Session::has('success'))
<span class="alert alert-success">{{Session::get('success')}}</span>
@endif


@if(Session::has('error'))
<span class="alert alert-danger">{{Session::get('error')}}</span>
@endif
<form  action="{{url('AdminChangePassword')}}" method="post">
                                {{csrf_field()}}
<div class="container-fluid bgf1">
    <div class="container">
        <div class="row">
            
                               
            
            <div class="col-md-4 ">
                <div class="col-md-6">
                    <h3 class=""> User ID</h3>
                </div>
                
                <div class="col-md-6">
                    <select class="form-control  "  name="user_id"  id="user_name"   onchange="getUserNameonID($(this))" >
                      <option>---Select ID---</option>
                      @if(!empty($users))
                        @foreach($users as $index=>$value)
                        
                            <option value="{{$value->id}}">{{$value->id}}</option>
                            
                             @if(!empty($data->id))
                                <option value="{{$data->id}}" @if($i->id == $data->id) selected @endif >{{$data->id}}</option>
                            @endif
                            
                        @endforeach
                      
                      @endif
                        
                    </select>
                </div>
               
            </div>
            <div class="col-md-4 ">
                <div class="col-md-6">
                    <h3 class=""> User Email</h3>
                </div>
                <div class="col-md-6">
                    <select class="form-control " name="user_email"  id="user_email"   onchange="getUserEmailonID($(this))" >
                      <option>---Select Email---</option>
                     
                        
                            <option value=""></option>
                             @if(!empty($data->id))
                                <option value="{{$data->id}}" @if($i->id == $data->id) selected @endif >{{$data->email}}</option>
                            @endif
                        
                    </select>
                </div>
               
            </div>
            <div class="col-md-4" >
               <div class="col-md-6">
                    <h3 class=""> User Name</h3>
                </div>
                <div class="col-md-6">
                    <select class="form-control" name="user_name" id="user_id"  onchange="getUserIdonName($(this))">
                      <option>---User Name---</option>
                  
                    @if(!empty($users))
                    @foreach($users as $index=>$value)
                            <option value="{{$value->id}}">{{$value->name}}</option>
                            @if(!empty($data->id))
                                <option value="{{$data->id}}" @if($i->id == $data->id) selected @endif >{{$data->name}}</option>
                            
                            @endif
                           
                    @endforeach
                    @endif
                            
                   
                    </select>
                    
                        <a href="javascript:;" id="lock" onclick="generatePassword($(this))"  data-user-id="">
                       
                       <button type="button" class="btn btn-brand btn-success btn-sm btn-icon" data-toggle="kt-popover" data-placement="top" data-content="Generate Password">
                           <i class="fa fa-lock"></i>
                       </button>
                       </a>
                       
                   
                </div>

            </div>
            
        </div>
    </div>
    
  <div class="container">
    <div class="row">
      <div class="col-md-9 m-b-20 padding-zero-768">
        <div class="card card-no-hover background-white">
            <div class="card-body" id="changePasswordDiv">
                <div class="row">
                    <div class="col-md-8 text-center mx-auto">
                        <span class="subscriptionHeading">Change Password</span>
                        <hr class="subscriptionHr">
                    </div>
                    <div class="col-md-7 mx-auto">
                        
                                <div class="input-group m-t-10" id="new_password">
                                    <input class="form-control" id="password" type="password" name="password" placeholder="New Password"  autocomplete="off">
                                    <span class="input-group-append">
                                        <button class="btnEye" type="button">
                                            <a href="javascript:;" class="color-white"><i class="fa fass fa-eye-slash" aria-hidden="true"></i></a>
                                        </button>
                                    </span>
                                </div>
                                @error('password')<span class="text-danger f-s" >{{$message}}</span>@enderror

                                <div class="input-group m-t-10" id="confirm_password">
                                    <input class="form-control" id="password_confirm" type="password" name="password_confirm" placeholder="Confirm Password" autocomplete="off" >
                                    <span class="input-group-append">
                                        <button class="btnEye" type="button">
                                            <a href="javascript:;" class="color-white"><i class="fa fass fa-eye-slash" aria-hidden="true"></i></a>
                                        </button>
                                    </span>
                                </div>
                                @error('password_confirm')<span class="text-danger f-s" >{{$message}}</span>@enderror
                                
                                <div class="progress progress-striped active m-t-10 m-b-20">
                                  <div id="jak_pstrength" class="progress-bar w" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" >
                                  </div>
                                </div>
								
								
												
                                <div class="row m-t-10">
                                    <div class="col-12 text-center">
                                        <button type="submit" class="btnLoginPage" >Change Password</button>
                                    </div>
                                </div>
                         </form>
                         <!--Modal-->
                         <div class="modal fade" id="clipBoardModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                           <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                 <div class="modal-body">
                                    <div class="row">
                                       <div class="col-1"></div>
                                       <div class="col-8 text-right">
                                          <input type="text" class="form-control" id="url" readonly="">
                                       </div>
                                       <div class="col-2 pull-left">
                                          <button class="btn btn-success" onclick="copyToClipboard()">COPY</button>
                                       </div>
                                       <div class="col-1"></div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                         
                         
                         <!--Modal Ends Here-->
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
    
  
    
    function getUserNameonID(elm)
    {
        $.ajax({
          url: "{{url('user/get_user_name')}}",
          type: 'POST',
          
          data: {user_id:elm.val(),_token:'{{ csrf_token() }}'},
          
          beforeSend:function(){
              
            $("#user_id").empty();
            $("#user_email").empty();
            $("#data-user-id").empty();
        
          },
          success: function(res)
           {
              console.log(res);
               
            $("#user_id").append(res.name);
            $("#user_email").append(res.email);
            $("#data-user-id").append(res.id);
            $("#lock").attr('data-user-id',res.id);
           },
           error: function(res)
           {
            console.log(res);
           }
        });
    }
    
    function getUserEmailonID(elm)
    {
        $.ajax({
          url: "{{url('user/get_user_email')}}",
          type: 'POST',
          
          data: {user_id:elm.val(),_token:'{{ csrf_token() }}'},
          
          beforeSend:function(){
              
            $("#user_email").html(null);
            
        
          },
          success: function(res)
           {
            $("#user_email").html(res);
           
           },
           error: function(res)
           {
            console.log(res);
           }
        });
    }
    
    
    function getUserIdonName(elm)
    {
        
        $.ajax({
          url: "{{url('user/get_user_id')}}",
          type: 'POST',
          
          data: {user_name:elm.val(),_token:'{{ csrf_token() }}'},
          
          beforeSend:function(){
              
            $("#user_name").empty();
            $("#user_email").empty();
            $("#data-user-id").empty();
          },
          success: function(res)
           {
            
            $("#user_name").append(res.id);
            $("#user_email").append(res.email);
            $("#data-user-id").append(res.id);
            
           },
           error: function(res)
           {
            console.log(res);
           }
        });
    }
     function updatePassword(elm)
    {
        $.ajax({
          url: "{{url('AdminChangePassword')}}",
          type: 'POST',
          
          data: {user_id:elm.val(),_token:'{{ csrf_token() }}'},
          
         
          success: function(res)
           {
            $("#user_id").html(res);
                
            
           },
           error: function(res)
           {
            console.log(res);
           }
        });
    }
    
   
        $('#user_name').select2();
        
        $('#user_email').select2();
        
        $('#user_id').select2();
        
        
     function copyToClipboard() {
       $link = $("#url").select();
       document.execCommand('copy');
       $.notify("Copied", "success");
   }
        
        
    function generatePassword(elm){
        
      var user_id = elm.attr('data-user-id');
    
      $.ajax({
          type : "get",
          url  : "{{ url('generate-password') }}",
          data : {
          "user_id": user_id,
          },
         
        
          success:function(data){
              if(data.status=='success'){
                  $.notify("SMS/Email sent to User", "success");
                  $("#url").val(data.url);
                  $("#clipBoardModal").modal('show');
              }
              else if(data.status == 'error'){
                  $.notify("Error while generating link", "error");
              }
          },
          error:function(res){
              $.notify("Error while generating link", "error");
          }
      });
  }

</script>




@stop