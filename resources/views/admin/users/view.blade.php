@extends('admin.layouts.scaffold')

@section('title')
Simsar | Create Category
@endsection

@push('styles')

@endpush

@section('content')


<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    Add Category
                </h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                @if($errors->count() > 0)
                <br>
                <div class="alert alert-danger">
                    <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
                @endif
            </div>
            <div class="col-md-4">
            </div>
        </div>
        <!--begin::Form-->
         <form action="{{url('update-user-list/'.$user->id)}}" method="POST"  enctype="multipart/form-data" class="kt-form kt-form--fit kt-form--label-right"  >
            {{ csrf_field() }}
            <div class="kt-portlet__body">
                <!--<div class="row" style="padding-bottom:1%;">-->
                <!--    <div class="col-md-12 text-right">-->
                <!--        <a href="{{url('categories')}}"><button type="button" class="btn btn-primary"><i class="fa fa-eye"></i>View Category Listing</button></a>-->
                <!--    </div>-->
                <!--</div>-->

                <div class="form-group row">
                    
                    
                    <label class="col-lg-2 col-form-label">Name*</label>
                    <div class="col-lg-3">
                        <input type="text"  name="name" class="form-control" readonly placeholder="Enter Title" value="{{$user->name}}">
                    </div>
                    
                     <label class="col-lg-2 col-form-label">Email*</label>
                    <div class="col-lg-3">
                        <input type="text"  name="email" class="form-control" readonly placeholder="Enter Email" value="{{$user->email}}">
                    </div>
                    
                </div>
                
                
                
                <div class="form-group row">
                    
                    
                    <label class="col-lg-2 col-form-label">Phone*</label>
                    <div class="col-lg-3">
                        <input type="text"  name="phone" class="form-control" readonly placeholder="Enter Phone" value="{{$user->phone}}">
                    </div>
                    
                     <label class="col-lg-2 col-form-label">Address*</label>
                    <div class="col-lg-3">
                        <input type="text"  name="address" class="form-control" readonly placeholder="Enter Address" value="{{$user->address}}">
                    </div>
                    
                  
                </div>
                
                
                
                 <div class="form-group row">
                    
                    
                    <label class="col-lg-2 col-form-label">About Me</label>
                    <div class="col-lg-3">
                        <textarea id="kt_maxlength_1" name="about_me" class="form-control" readonly maxlength="255" placeholder="" rows="2" placeholder="Enter Description">{{$user->about_me}}</textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">Profile Pic*</label>
                    <div class="col-lg-3">
                        <div class="kt-avatar kt-avatar--outline" id="kt_user_avatar_1">
                            <div class="kt-avatar__holder" style="background-image: url(https://mrcpotencia.com/simsar/public/asset/images/profilepic/{{ $user->profile_pic }});"></div>
                            <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
                                <i class="fa fa-pen"></i>
                                <input type="file" name="profile_pic" >
                            </label>
                            <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
                                <i class="fa fa-times"></i>
                            </span>
                        </div>
                        <span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>
                    </div>

                    <label class="col-lg-2 col-form-label">Profile Banner*</label>
                    <div class="col-lg-3">
                        <div class="kt-avatar kt-avatar--outline" id="kt_user_avatar_2">
                            <div class="kt-avatar__holder" style="background-image: url(https://mrcpotencia.com/simsar/public/asset/images/profilepic/{{ $user->profile_banner }});"></div>
                            <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
                                <i class="fa fa-pen"></i>
                                <input type="file" name="profile_banner" >
                            </label>
                            <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
                                <i class="fa fa-times"></i>
                            </span>
                        </div>
                        <span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>
                    </div>
                </div>

                <!--<div class="form-group row">-->
                <!--    <label class="col-lg-2 col-form-label">Meta Keywords</label>-->
                <!--    <div class="col-lg-3">-->
                <!--        <input id="kt_tagify_5" name='meta_keywords' placeholder="Add users" value="Chris Muller, Lina Nilson">-->
                <!--        <div class="kt-margin-t-10">-->
                <!--            Dropdown item and tag templates.-->
                <!--        </div>-->
                <!--    </div>-->
                <!--    <label class="col-lg-2 col-form-label">Meta Descriptsion</label>-->
                <!--    <div class="col-lg-3">-->
                <!--        <textarea id="kt_maxlength_2" name="meta_description" class="form-control"  maxlength="255" placeholder="" rows="2" placeholder="Enter Description"></textarea>-->
                <!--    </div>-->
                <!--</div>-->
                

                <div class="form-group row">
                    
                    
                    <label class="col-lg-2 col-form-label">Facebook Link*</label>
                    <div class="col-lg-3">
                        <input type="text"  name="facebook_link" class="form-control" readonly placeholder="Enter Facebook" value="{{$user->facebook_link}}">
                    </div>
                    
                     <label class="col-lg-2 col-form-label">Google Link*</label>
                    <div class="col-lg-3">
                        <input type="text"  name="google_link" class="form-control" readonly placeholder="Enter Google" value="{{$user->google_link}}">
                    </div>
                    
                  
                </div>
                
                
                <div class="form-group row">
                    
                    
                    <label class="col-lg-2 col-form-label">Twitter Link*</label>
                    <div class="col-lg-3">
                        <input type="text"  name="twitter_link" class="form-control" readonly placeholder="Enter Twitter" value="{{$user->twitter_link}}">
                    </div>
                    
                     <label class="col-lg-2 col-form-label">LinkedIn Link*</label>
                    <div class="col-lg-3">
                        <input type="text"  name="linkedIn_link" class="form-control" readonly placeholder="Enter LinkedIn" value="{{$user->linkedIn_link}}">
                    </div>
                    
                  
                </div>
                
                
                <div class="form-group row">
                    
                    <label class="col-lg-2 col-form-label">Skype Link*</label>
                    <div class="col-lg-3">
                        <input type="text"  name="skype_link" class="form-control" readonly placeholder="Enter Skype" value="{{$user->skype_link}}">
                    </div>
                    
                </div>
                

             
            </div>
            <div class="kt-portlet__foot kt-portlet__foot--fit-x">
                <div class="kt-form__actions">
                    <!--<div class="row">-->
                        
                    <!--    <div class="col-lg-12 text-right">-->
                    <!--        <button type="submit" class="btn btn-success">Submit</button>-->
                    <!--        <button type="reset" class="btn btn-secondary">Cancel</button>-->
                    <!--    </div>-->
                    <!--</div>-->
                </div>
            </div>
        </form>

        <!--end::Form-->
    </div>
</div>

<!-- end:: Content -->
@endsection

@push('scripts')
<script src="{{URL::asset('public/assets/js/pages/crud/forms/widgets/bootstrap-maxlength.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('public/assets/js/pages/crud/file-upload/ktavatar.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('public/assets/js/pages/crud/forms/widgets/tagify.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('public/assets/js/pages/crud/forms/validation/form-widgets.js')}}" type="text/javascript"></script>


@endpush