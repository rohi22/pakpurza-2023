@extends('admin.layouts.scaffold')

@section('title')
Simsar | Edit Ads Sell
@endsection

@push('styles')
<style>
    .m-h{
        min-height: 180px;
    }
    
    .h-w{
        height:100px; width:100px;
    }
    
    .w-h{
        width: 100%; height: 400px;
    }
</style>
@endpush

@section('content')


<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                   Edit Ads Sell
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
         <form action="{{url('update-ads-list/'.$sellNow->id)}}" method="POST"  enctype="multipart/form-data" class="kt-form kt-form--fit kt-form--label-right"  >
            {{ csrf_field() }}
            <div class="kt-portlet__body">
               
               
                <div class="row">
                    <div class="col-md-6">
                        <div class="col-md-12">
                                @if(!empty($category)) 
                                <h6 for="my-text-field" class="font-18 color-70 m-t-10">Select Category:<span class="colorRed">*</span></h6>
                                    <select class="form-control border-rad-10 m-t-10 font-14 required" id="category" name="category" >
                                        <option value="">--Choose An Option--</option>
                                        @foreach ($category as $c)
                                            <option value="{{$c->id}}" @if(!empty($sellNow)) @if($sellNow->category_id == $c->id) selected="selected" @endif @endif>{{ucfirst($c->title)}}</option>
                                        @endforeach
                                    </select>
                                @endif  
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="col-md-12">
                                @if(!empty($subCategories)) 
                                <h6 for="my-text-field" class="font-18 color-70 m-t-10">Select Sub Category:<span class="colorRed">*</span></h6>
                                    <select class="form-control border-rad-10 m-t-10 font-14 required" id="subCategory"  name="subCategory" >
                                        <option value="">--Choose An Option--</option>
                                        @foreach ($subCategories as $c)
                                            <option value="{{$c->id}}" @if(!empty($sellNow)) @if($sellNow->sub_category_id == $c->id) selected="selected" @endif @endif>{{ucfirst($c->title)}}</option>
                                        @endforeach
                                    </select>
                                @endif  
                        </div>
                    </div>
                </div>
                <div class="row">
                                      
                                       <div class="col-md-12" style="display:none;">
                                          <h5 class="color-70">Selected Category</h5>
                                          <p>@if(isset($sellNow->getCategory)) {{ ucfirst($sellNow->getCategory->title) }}@endif @if(isset($sellNow->getSubCategory)) / {{ $sellNow->getSubCategory->title }}@endif</p>
                                       
                                          
                                       
                                       </div>
                                     
                                       
                                       <hr class="productListingHr">
                                       <div class="col-12 mx-auto text-center">
                                          <h3 class="color-70">Product Details</h3>
                                          <p>To give us the best overview of your ad. Please enter all the required details as accurately as possible.</p>
                                       </div>
                                       
                                       <div class="col-md-12 text-left">
                                       
                                         <div class="row">
                                            <div class="col-md-6">
                                                 <input class="form-control border-rad-10 m-t-10 font-14" type="hidden"  name="user_id" value="{{$sellNow->user_id}}" >
                                                <div class="col-md-12" id="Brands">
                                                      @php $getDropDownsName = App\SubCategory::where('id', $sellNow->sub_category_id)->first(['name_of_first_dropdown', 'name_of_second_dropdown']); @endphp
                                                    @if(!empty($brand)) 
                                                    <h6 for="my-text-field" class="font-18 color-70 m-t-10">{{ ucfirst($getDropDownsName->name_of_first_dropdown) }}:<span class="colorRed">*</span></h6>
                                                        <select class="form-control border-rad-10 m-t-10 font-14 required" name="sell_brands" onchange="getSubBrands($(this))">
                                                            <option value="">--Choose An Option--</option>
                                                            @foreach ($brand as $p)
                                                                <option value="{{$p->brandid}}" @if(!empty($sellNow)) @if($sellNow->brand_id == $p->brandid) selected="selected" @endif @endif>{{ucfirst($p->brandtitle)}}</option>
                                                            @endforeach
                                                        </select>
                                                    @endif  
                                                 </div>
                                                
                                                
                                                   
                                                 <div id="oldBrand" >  
                                                     <div class="col-md-12">
                                                                             
                                                    @if ($branddropDown->count() > 0)
                                                    @foreach ($branddropDown as $index1=>$dd)
                                                    
                                                    <h6 for="my-text-field" class="font-18 color-70 m-t-10">{{$dd->title}}:<span class="colorRed">*</span></h6>
                                                    <select class="form-control border-rad-10 m-t-10 font-14 required"  name="{{$dd->ids}}">
                                                    @php $property = App\Property::where('attribute_id',$dd->ids)->where('status',1)->get(); @endphp
                                                    
                                                    @php  $adAttributedata = $adAttribute->where('attribute_key',  $dd->ids)->first();  @endphp
                                                    
                                                    @if ($property->count() > 0)
                                                    <option value="">--Choose An Option--</option>
                                                        @foreach ($property as $index2=>$p) 
                                                        
                                                            <option value="{{$p->id}}" @if(!empty($adAttributedata)) @if($adAttributedata->attribute_value == $p->id ) selected @endif  @endif>{{ucfirst($p->title)}}</option>
                                                        @endforeach
                                                    @endif
                                                    </select>
                                                    
                                                    @endforeach
                                                    @endif
                                                    
                                                    
                                                    </div>
                                                     <div class="col-md-12">
                                                    @if ($brandbutton->count() > 0)
                                                    @foreach ($brandbutton as $index1=>$b)
                                                    
                                                    <h6 for="my-text-field" class="font-18 color-70 m-t-10">{{$b->title}}:<span class="colorRed">*</span></h6>
                                                    
                                                    @php $property = App\Property::where('attribute_id',$b->ids)->where('status',1)->get(); @endphp
                                                    
                                                    @php  $adAttributedata = $adAttribute->where('attribute_key',  $b->ids)->first();  @endphp
                                                    
                                                    @if ($property->count() > 0)
                                                        @foreach ($property as $index2=>$p) 
                                                    <label class="container-radio">
                                                      <input type="radio" id={{$p->slug}}" name="{{$b->ids}}" value="{{$p->id}}" @if(!empty($adAttributedata)) @if($adAttributedata->attribute_value == $p->id ) checked="checked" @endif  @endif  @if($b->text_box_type==1) oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  @elseif($b->text_box_type==2) onkeypress="return /[a-z]/i.test(event.key)" @elseif($b->text_box_type==3) @endif >
                                                      <span class="checkmark"></span>{{$p->title}} 
                                                    </label>
                                                        @endforeach
                                                    @endif
                                                    
                                                    
                                                    @endforeach
                                                    @endif
                                                    
                                                    </div>
                                                     <div class="col-md-12">
                                                    
                                                        @if ($brandinputBox->count() > 0)
                                                        @foreach ($brandinputBox as $i)
                                                         @php  $adAttributedata = $adAttribute->where('attribute_key',  $i->ids)->first();  @endphp
                                                        <h6 for="{{$i->slug}}" class="font-18 color-70 m-t-10" >{{$i->title}}:</h6>
                                                        <input class="form-control border-rad-10 m-t-10 font-14" type="text" id="{{$i->slug}}" name="{{$i->ids}}" value="@if(!empty($adAttributedata)) {{$adAttributedata->attribute_value}}   @endif" >
                                                        
                                                        @endforeach
                                                        @endif
                                                                             
                                                    </div>
                                                     <div class="col-md-12">
                                                     @php $getDropDownsName = App\SubCategory::where('id', $sellNow->sub_category_id)->first(['name_of_first_dropdown', 'name_of_second_dropdown']); @endphp
                                                        @if($subBrand->count() > 0)
                                                       
                                                        <h6 for="my-text-field" class="font-18 color-70 m-t-10">{{ ucfirst($getDropDownsName->name_of_second_dropdown) }}:<span class="colorRed">*</span></h6>
                                                        <select class="form-control border-rad-10 m-t-10 font-14 required" name="sub_brand" onchange="getAssignedAttriubtes($(this))" brand-id="{{$subBrand[0]->brand_id}}" >
                                                            @if ($subBrand->count() > 0)
                                                                <option value="">--Choose An Option--</option>
                                                                @foreach ($subBrand as $subBrand)
                                                                    <option value="{{$subBrand->id}}" @if(!empty($sellNow)) @if($sellNow->sub_brand_id == $subBrand->id ) selected @endif  @endif>{{$subBrand->title}}</option>
                                                                @endforeach
                                                            @endif
                                                        </select>
                                                        
                                                        @endif
                                                 </div>
                                                     <div class="col-md-12">
                                                         @if ($subBranddropDown->count() > 0)
        @foreach ($subBranddropDown as $index1=>$dd)
       
            <h6 for="my-text-field" class="font-18 color-70 m-t-10">{{$dd->title}}:<span class="colorRed">*</span></h6>
            <select class="form-control border-rad-10 m-t-10 font-14 required"  name="{{$dd->ids}}">
                @php $property = App\Property::where('attribute_id',$dd->ids)->where('status',1)->get(); @endphp
                
                @php  $adAttributedata = $adAttribute->where('attribute_key',  $dd->ids)->first();  @endphp
                
                @if ($property->count() > 0)
                    <option value="">--Choose An Option--</option>
                    @foreach ($property as $index2=>$p)
                        <option value="{{$p->id}}" @if(!empty($adAttributedata)) @if($adAttributedata->attribute_value == $p->id ) selected @endif  @endif >{{ucfirst($p->title)}}</option>
                    @endforeach
                @endif
            </select>
        
        @endforeach
    @endif
    
     </div>
                                                     <div class="col-md-12">
    @if ($subBrandbutton->count() > 0)
        @foreach ($subBrandbutton as $index1=>$b)
        
            <h6 for="my-text-field" class="font-18 color-70 m-t-10">{{$b->title}}:<span class="colorRed">*</span></h6>
            
            @php $property = App\Property::where('attribute_id',$b->ids)->where('status',1)->get(); @endphp
             @php  $adAttributedata = $adAttribute->where('attribute_key',  $b->ids)->first();  @endphp
                @if ($property->count() > 0)
                    @foreach ($property as $index2=>$p) 
                <label class="container-radio">
                  <input type="radio" id={{$p->slug}}" name="{{$b->ids}}" value="{{$p->id}}" @if(!empty($adAttributedata)) @if($adAttributedata->attribute_value == $p->id ) checked="checked" @endif  @endif @if($b->text_box_type==1) oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  @elseif($b->text_box_type==2) onkeypress="return /[a-z]/i.test(event.key)" @elseif($b->text_box_type==3) @endif >
                  <span class="checkmark"></span>{{$p->title}}
                </label>
                    @endforeach
                @endif
            
           
        
        @endforeach
    @endif
    
     </div>
                                                     <div class="col-md-12">
    
    @if ($subBrandinputBox->count() > 0)
        @foreach ($subBrandinputBox as $i)
            @php  $adAttributedata = $adAttribute->where('attribute_key',  $i->ids)->first();  @endphp
                <h6 for="{{$i->slug}}" class="font-18 color-70 m-t-10" >{{$i->title}}:</h6>
                <input class="form-control border-rad-10 m-t-10 font-14" type="text" id="{{$i->slug}}" name="{{$i->ids}}" value="@if(!empty($adAttributedata)) {{$adAttributedata->attribute_value}}   @endif">
            
        @endforeach
    @endif
                                                     </div>
                                                 
                                                 </div>                 
                                                                     
                                        <!--dropDowns-->
                                        <!--buttons-->
                                        <!--txtBoxes-->
                                        <!--brandDowns-->

                                                 <div class="col-md-12" id="brandDowns"></div>
                                                 <div class="col-md-12" id="dropDowns"></div>
                                                 <div class="col-md-12" id="buttons"></div>
                                                 <div class="col-md-12" id="txtBoxes"></div>
                                                 
                                                 <div class="col-md-12" id="getAttributesz"></div>
                                                 
                                                 
                                                 <div class="col-12" id="subBrands" style="display:none"></div>
                                                 
                                                 <div class="col-md-12" id="oldSubCategoryDropDown">
                                                    @if($dropDown->count() > 0)
                                                       @foreach($dropDown as $key=>$dd)
                                                          <h6 for="my-text-field" class="font-18 color-70 m-t-10">{{ucfirst($dd->title)}}:<span class="colorRed">*</span></h6>
                                                                  
                                                                                     
                                                        @php $property = \App\Property::where('attribute_id',$dd->attributes_id)->where('status',1)->get(); @endphp
                                                        
                                                         @php  $adAttributedata = $adAttribute->where('attribute_key',  $dd->attributes_id)->first();  @endphp
                                                        <select class="form-control border-rad-10 m-t-10 font-14 required" name="{{$dd->attributes_id}}">
                                                        @foreach($property as $p)
                                                       
                                                        
                                                           <option  value="{{$p->id}}" @if(!empty($adAttributedata)) @if($adAttributedata->attribute_value == $p->id ) selected @endif  @endif>{{ucfirst($p->title)}}</option>
                                                        @endforeach
                                                        </select>
                                
                                                       @endforeach
                                                    @endif   
                                                 </div>
                                                 <div class="col-md-12" id="oldSubCategoryButton">
                                                    @if($button->count() > 0)
                                                       @foreach($button as $key=>$b)
                                                          <h6 for="my-text-field" class="font-18 color-70 m-t-10">{{ucfirst($b->title)}}:<span class="colorRed">*</span></h6>
                                                         
                                                        @php $property = \App\Property::where('attribute_id',$b->attributes_id)->where('status',1)->get(); @endphp
                                                        
                                                        @php  $adAttributedata = $adAttribute->where('attribute_key',  $b->attributes_id)->first();  @endphp
                                                        
                                                        
                                                        @foreach($property as $key=>$p)
                                                        
                                                         @php $adAttributes = \App\AdAttribute::where('attribute_value', ucfirst($p->title))->where('ad_id', $sellNow->id)->first(); @endphp
                                                             <label class="container-radio">
                              <input type="radio" id={{$p->slug}}" name="{{$b->ids}}" value="{{$p->id}}" @if(!empty($adAttributedata)) @if($adAttributedata->attribute_value == $p->id ) checked="checked" @endif  @endif @if($b->text_box_type==1) oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  @elseif($b->text_box_type==2) onkeypress="return /[a-z]/i.test(event.key)" @elseif($b->text_box_type==3) @endif >
                              <span class="checkmark"></span>{{$p->title}}
                            </label>
                            
                                                            
                                                         @endforeach
                            
                                                    @endforeach
                                                   @endif
                                                 </div>
                                                 <div class="col-md-12" id="oldSubCategoryInput">
                                                     
                                                         @if($inputBox->count() > 0)
                                                           @foreach($inputBox as $key=>$b)
                                                            @php  $adAttributedata = $adAttribute->where('attribute_key',  $b->attributes_id)->first();  @endphp
                                                              <h6 for="my-text-field" class="font-18 color-70 m-t-10">{{ucfirst($b->title)}}:<span class="colorRed">*</span></h6>
                                
                                                           
                                                            <input class="form-control border-rad-10 m-t-10 font-14 required" type="text" id="{{$b->slug}}" name="{{$b->attributes_id}}" value="@if(!empty($adAttributedata)) {{$adAttributedata->attribute_value}}   @endif "  >
                                                                   
                                                        @endforeach
                                                       @endif
                                                               
                                                    </div>
                                                    
                                                    
                                            </div>
                                            <div class="col-md-6">
                                                
                    <div class="col-md-12" id="onCall">
                       <h6 for="my-text-field" class="font-18 color-70 m-t-10">On Call:</h6>
                       <select class="form-control border-rad-10 m-t-10 font-14" name="is_call" id="is_call" >
                          <option value="0" @if( $sellNow->is_call_price == 0 ) selected @endif>No </option>
                          <option value="1" @if( $sellNow->is_call_price == 1 ) selected @endif>Yes</option>
                       </select>
                    </div>
                      
                      <div class="col-md-12 " id="start_date" @if( $sellNow->is_call_price == 1 ) style="display:none;" @endif>
                        <h6 for="my-text-field" class="font-18 color-70 m-t-10">Offer Start Date:<span class="colorRed"></span></h6>
                          <input type="date" class="form-control border-rad-10 m-t-10 font-14" name="start_offer" id="start_offer" value="{{$sellNow->offer_start_date}}" >
                      </div>
                      <div class="col-md-12" id="end_date" @if( $sellNow->is_call_price == 1 ) style="display:none;" @endif>
                        <h6 for="my-text-field" class="font-18 color-70 m-t-10">Offer End Date:<span class="colorRed"></span></h6>
                        <input type="date" class="form-control border-rad-10 m-t-10 font-14" name="end_offer" id="end_offer" value="{{$sellNow->offer_end_date}}" >
                      </div>
                      
                      <div class="col-md-12" id="uper_price" @if( $sellNow->is_call_price == 1 ) style="display:none;" @endif>
                        <h6 for="my-text-field" class="font-18 color-70 m-t-10">Price:</h6>
                        <input type="number" name="price" id="price" placeholder="price" class="form-control border-rad-10 m-t-10 font-14" value="{{$sellNow->price}}" >
                      </div>
                      
                      <div class="col-md-12" id="uper_discount_price" @if( $sellNow->is_call_price == 1 ) style="display:none;" @endif>
                        <h6 for="my-text-field" class="font-18 color-70 m-t-10">Discount Price:</h6>
                        <input type="number" name="dis_price" id="dis_price" placeholder="Discount Price" class="form-control border-rad-10 m-t-10 font-14" value="{{$sellNow->dis_price}}" >
                      </div>
                      <div class="col-md-12" id="uper_discount_percentage" @if( $sellNow->is_call_price == 1 ) style="display:none;" @endif>
                        <h6 for="my-text-field" class="font-18 color-70 m-t-10">Discount Percentage:</h6>
                        <input type="number" name="dis_percentage" id="dis_percentage" placeholder="Discount Percentage" class="form-control border-rad-10 m-t-10 font-14" value="{{$sellNow->dis_percentage}}" readonly>
                      </div>
                      
                      
                      
                     <div class="col-md-12">
                        <h6 for="my-text-field" class="font-18 color-70 m-t-10">Ad. Title: <span class="colorRed">*</span></h6>
                        <input id="title" maxlength="70" name="title" data-counter-label="0/{remaining} characters left." class="form-control border-rad-10 m-t-10 font-14 required"  value="{{ $sellNow->ad_title }}">
                     </div>
                    
                     
                     
                     <div class="col-md-12" style="display:none;">
                        <h6 for="my-textarea" class="font-18 color-70 m-t-10">Short Description: <span class="colorRed">*</span></h6>
                        <textarea class="form-control border-rad-10 m-t-10 font-14 m-h" id="my-textarea" maxlength="500" name="short_description" data-counter-label="0/{remaining} characters left." >{{ $sellNow->short_description }}</textarea>
                     </div>
                     <div class="col-md-12">
                        <h6 for="my-textarea" class="font-18 color-70 m-t-10">Long Description: <span class="colorRed">*</span></h6>
                        <textarea class="form-control border-rad-10 m-t-10 font-14 m-h" id="long_description" maxlength="4096" name="long_description" data-counter-label="0/{remaining} characters left." >{{ $sellNow->long_description }}</textarea>
                     </div>
                     
                     
                    
                     
                     
                                         
                                             
                                        
                                          </div>  
                                         </div>
                                         
                                         
                    <div class="row">
                                             
                        <div class="col-md-6 text-center">
                            <h6 for="my-text-field" class="font-18 color-70 m-t-10 text-left">Main Image<span class="colorRed">*</span></h6>
                            <input type="file" name="mainImage" id="mainImage" >
                            <img src="{{ URL::asset('public/asset/images/sell-now/'.$sellNow->main_image) }}" alt="" class="m-t-10 h-w">
                         </div>
                         
                         <div class="col-md-6 text-center">
                            <h6 for="my-text-field" class="font-18 color-70 m-t-10 text-left">Hover Image<span class="colorRed">*</span></h6>
                            <input type="file" name="hoverImage" id="hoverImage">
                            <img src="{{ URL::asset('public/asset/images/sell-now/'.$sellNow->hover_image) }}" alt="" class="m-t-10 h-w">
                         </div>
                                             
                    </div>
                                         
                                         <div class="row">
                                             
                                             
                                                @if(!empty($sellnowgallery))             
                                                    @if($sellnowgallery->count() > 0)
                                                      @foreach($sellnowgallery as $s)         
                                                                
                                                                <div class="col-md-4 m-t-b-10 text-center">
                                                                <h6 for="my-text-field" class="font-18 color-70 m-t-10 text-left">Gallery Image<span class="colorRed">*</span></h6>
                                                                <input type="file" name="galleryImage{{ $s->id }}" id="galleryImage">
                                                                <img src="{{ URL::asset('public/asset/images/sell-now/gallery/'.$s->gallery_image) }}" alt="" class="m-t-10 h-w">
                                                                </div>
                    
                                                        @endforeach
                                                    @endif
                                                @endif
                                

                                       
                                            
                                         </div>
                                       </div>
                                    </div>
                
                
                
                                            @if($sellNow->country_ip == 1)
                                        
                    <input type="hidden" name="country" value="{{$sellNow->country_id}}">
                    <input type="hidden" name="state" value="{{$sellNow->state_id}}">
                    <input type="hidden" name="city" value="{{$sellNow->city_id}}">
                    <input type="hidden" name="lati" value="{{$sellNow->latitude}}">
                    <input type="hidden" name="long" value="{{$sellNow->longitude}}">
                    <input type="hidden" name="countryIp" value="{{$sellNow->country_ip}}">
                    
                    
                                        <div class="row ">
                    
                    <div class="col-md-4">
                      <select  id="country" class="form-control">
                        <option value="">Select Country</option>
                        <option value="29.31166,47.481766,6" selected="selected">Kuwait</option>
                      </select>
                    </div>
                    
                      <div class="col-md-4">
                          <select  id="state" class="form-control" >
                            <option value="">Select State</option>
                            @if ($states->count() > 0)
                                @foreach ($states as $state)
                                    <option value="{{$state->latitude.','.$state->longitude.',12'}}" @if($state->name == $sellNow->state_id) selected @endif>{{$state->name}}</option>
                                @endforeach
                            @endif
                          </select>
                        </div>
                        
                        <div class="col-md-4">
                          <select  id="city" class="form-control city" >
                            <option value="">Select City</option>
                             @if ($cities->count() > 0)
                                @foreach ($cities as $city)
                                    <option value="{{$city->latitude.','.$city->longitude.',15'}}" @if($city->name == $sellNow->city_id) selected @endif>{{$city->name}}</option>
                                @endforeach
                            @endif
                          </select>
                        </div>
                        <div class="col-md-12">
                          <div class="showMap">
                            <div id="map2" class="w-h"></div>
                          </div>
                      </div>
                    </div>
                    
                                        
                                        @else
                                        <div class="row">
                                            <div class="col-12 m-t-10">
                                              <select class="form-control country" name="sell_location" id="sell_location" >
                                                <!--<option value="">Select Location</option>-->
                                                <option value="make">Make New Location</option>
                                                @if($maplist->count() > 0)
                                                  @foreach($maplist as $m)
                                                    <option value="{{ $m->id }}" @if($sellNow->map_id == $m->id) selected="selected" @endif>{{ $m->address }}</option>
                                                  @endforeach
                                                @endif
                                              </select>
                                         </div>
                                             <div class="col-12" id="makemap" style="display:none;">
                                                
                                                <div id="map"></div>
                                                
                                                <input id="pac-input" class="form-control m-t-10" type="text" placeholder="Enter a location">
                                                 <div class="row">
                                                        <div class="col-md-4 m-t-10"> 
                                                             <input id="country" name="country" class="form-control" readonly type="text" placeholder="Country">
                                                        </div>
                                                        <div class="col-md-4 m-t-10"> 
                                                            <input id="state" name="state" class="form-control" readonly type="text" placeholder="State">
                                                        </div>
                                                        <div class="col-md-4 m-t-10"> 
                                                            <input id="city" name="city" class="form-control" readonly type="text" placeholder="City">
                                                        </div>
                                                        <div class="col-md-4 m-t-10"> 
                                                            <input id="lati" name="lati" class="form-control" readonly type="text" placeholder="Latitude">
                                                        </div>
                                                        <div class="col-md-4 m-t-10"> 
                                                            <input id="long" name="long" class="form-control" readonly type="text" placeholder="Longitude">
                                                        </div>
                                                        <div class="col-md-4 m-t-10"> 
                                                            <input id="address" name="address" class="form-control" readonly type="text" placeholder="Address">
                                                        </div>
                                                </div>
                                            </div>
                                            
                                            </div>
                                        @endif
                                            
                                       
               
               
                            

             
            </div>
            <div class="kt-portlet__foot kt-portlet__foot--fit-x">
                <div class="kt-form__actions">
                    <div class="row">
                        
                        <div class="col-lg-12 text-right">
                            <button type="submit" class="btn btn-success">Update</button>
                            <button type="reset" class="btn btn-secondary">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!--end::Form-->
    </div>
</div>

<!-- end:: Content -->
@endsection

@push('scripts')

<script src="https://maps.googleapis.com/maps/api/js?key="APIKEY"&libraries=places&callback=initMap" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
<script src="{{ URL::asset('public/asset/js/uploadHBR.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/additional-methods.min.js"></script>
<!--<script src='https://kit.fontawesome.com/a076d05399.js'></script>-->
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>


<script>

var geocoder;
var map;
var geoMarker;
function initialize() {
    var map = new google.maps.Map(
        document.getElementById("map2"), {
            center: new google.maps.LatLng(29.31166, 47.481766),
            zoom: 6,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });
    geoMarker = new google.maps.Marker();
    geoMarker.setPosition(map.getCenter());
    geoMarker.setMap(map);

    

    $("#country").change(function() {
        const input = $(this).val();
        const latlngStr = input.split(",", 3);
        const latlng = {
            lat: parseFloat(latlngStr[0]),
            lng: parseFloat(latlngStr[1]),
        };

        var geocoder = new google.maps.Geocoder();
        geocoder.geocode({
            location: latlng
        }, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                map.setCenter(results[0].geometry.location);
                geoMarker.setOptions({
                    position: results[0].geometry.location,
                });
                map.setZoom(parseFloat(latlngStr[2]));
            } else {
                alert("Something got wrong " + status);
            }
        });
    });
    $("#state").change(function() {
        const input = $(this).val();
        const latlngStr = input.split(",", 3);
        const latlng = {
            lat: parseFloat(latlngStr[0]),
            lng: parseFloat(latlngStr[1]),
        };
        
        $.ajax({
            type:'GET',
            url:"{{url('get-city')}}",
            data:{
            city_id : jQuery(this).val(),
            },
            success:function(res){
              
                $("[name='state']").val("");
                $("[name='city']").val("");

                $("[name='state']").val(res.state_name);
                $('.city').empty();
                $('.city').append('<option value="">Select City</option>');
                jQuery.each(res.city, function(i, v) {
                    jQuery(".city").append('<option value="'+[v.lat, v.lng,v.zoom].join(',')+'">'+v.name+'</option>');
              });                
            }  
        })

        var geocoder = new google.maps.Geocoder();
        geocoder.geocode({
            location: latlng
        }, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                map.setCenter(results[0].geometry.location);
                geoMarker.setOptions({
                    position: results[0].geometry.location,
                });
                map.setZoom(parseFloat(latlngStr[2]));
            } else {
                alert("Something got wrong " + status);
            }
        });
    });
    $("#city").change(function() {
        const input = $(this).val();
        const latlngStr = input.split(",", 3);
        const latlng = {
            lat: parseFloat(latlngStr[0]),
            lng: parseFloat(latlngStr[1]),
        };

        $.ajax({
            type:'GET',
            url:"{{url('get-city-name')}}",
            data:{
            city_id : jQuery(this).val(),
            },
            success:function(res){
                $("[name='city']").val(res.city_name);
                $("[name='lati']").val(res.latitude);
                $("[name='long']").val(res.longitude);
                              
            }  
        })

        var geocoder = new google.maps.Geocoder();
        geocoder.geocode({
            location: latlng
        }, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                map.setCenter(results[0].geometry.location);
                geoMarker.setOptions({
                    position: results[0].geometry.location,
                });
                    map.setZoom(parseFloat(latlngStr[2]));
            } else {
                alert("Something got wrong " + status);
            }
        });
    });

}
google.maps.event.addDomListener(window, "load", initialize);
$(document).ready(function(){
   $('#formss').validate({
      errorElement: 'span', //default input error message container
      errorClass: 'help-block help-block-error', // default input error message class
      focusInvalid: true, // do not focus the last invalid input
      ignore: "", // validate all fields including form hidden input
      rules:{
         title:{
               required: true,
               maxlength:255,
            },
         price:{
               required: true,
            },
         is_featured:{
               required: true,
            },
         is_latest:{
               required: true,
            },
         is_offer:{
               required: true,
            },
         short_description:{
               required: true,
               maxlength:255,
            },
         long_description:{
               required: true,
               maxlength:800,
            },
         country:{
               required: true,
            },
         state:{
               required: true,
            },
         city:{
               required: true,
            },
         
         },

      messages: {
         title:{
               required: 'Title is required.',
            },
         price:{
               required: 'Price is required.',
            },
         short_description:{
               required: 'Short Description is required.',
            },
         long_description:{
               required: 'Long Description is required.',
            },
         country:{
               required: 'Country is required.',
            },
         state:{
               required: 'State is required.',
            },
         city:{
               required: 'City is required.',
            },
         },

      invalidHandler: function(event, validator) { //display error alert on form submit

      },
      focusInvalid: function() {
            // put focus on tinymce on submit validation
            if (this.settings.focusInvalid) {
               try {
                  var toFocus = $(this.findLastActive() || this.errorList.length && this.errorList[0].element || []);
                  if (toFocus.is("textarea")) {
                        tinyMCE.get(toFocus.attr("id")).focus();
                  } else {
                        toFocus.filter(":visible").focus();
                  }
               } catch (e) {
                  // ignore IE throwing errors when focusing hidden elements
               }
            }
      },

      errorPlacement: function(error, element) {
      if (element.is(':checkbox')) {
            error.insertAfter(element.closest(".md-checkbox-list, .md-checkbox-inline, .checkbox-list, .checkbox-inline"));
      } else if (element.is(':radio')) {
            error.insertAfter(element.closest(".md-radio-list, .md-radio-inline, .radio-list,.radio-inline"));
      } else if (element.hasClass('select2')) {
            error.insertAfter(element.next('span'));
      }
      else if (element.hasClass('textarea')) {
            error.insertAfter(element.next('span'));
      }
      else {
            error.insertAfter(element); // for other inputs, just perform default behavior
      }
      },

      highlight: function(element) { // hightlight error inputs
      $(element)
            .closest('.form-group').addClass('has-error'); // set error class to the control group
      },

      unhighlight: function(element) { // revert the change done by hightlight
      $(element)
            .closest('.form-group').removeClass('has-error'); // set error class to the control group
      },

      success: function(label) {
      label
            .closest('.form-group').removeClass('has-error'); // set success class to the control group
      },
      submitHandler: function(form) {
      form.submit();
      }
   });
});

$("#is_offer").change(function(){
   
   var value = $(this).val();
   if(value==1){

      $("#start_date").show();
      $("#end_date").show();
      $("[name='start_offer']").prop('required',true);
      $("[name='end_offer']").prop('required',true);

      
   }
   else{
      $("#start_date").hide();
      $("#end_date").hide();
      $("[name='start_offer']").prop('required',false);
      $("[name='end_offer']").prop('required',false);
      
   }
});


$("[name='dis_price']").keyup(function(){
  $("[name='dis_percentage']").val("");
  var price = $("[name='price']").val();
  var dis_price = $(this).val();
  var percent = parseInt((price - dis_price) / price * 100);
  $("[name='dis_percentage']").val(percent);
  
});

$("[name='price']").keydown(function(){
  $("[name='dis_percentage']").val("");
  var price = $(this).val();
  var dis_price = $("[name='d_price']").val();
  var percent = parseInt((price - dis_price) / price * 100);
  $("[name='dis_percentage']").val(percent);
  
});   
var old_country = $("#old_country_id").val();
var old_state   = $("#old_state_id").val();
var old_city    = $("#old_city_id").val();
$.ajax({
    type: "post",
    url: "{{url('geo-states')}}",
    data: {
        "_token": "{{ csrf_token() }}",
        id: old_country
    },
    success: function(res){
       
        $('.state').empty();
        var html ='';
        $.each(res, function (index, value) {
            select = value.id==old_state?"selected":"";
            html += '<option value="'+value.id+'" '+select+' >'+value.name+'</option>';

        });
            $('.state').append(html);

    },
    error: function( msg ) {
        console.log();
    }

});

$.ajax({
    type: "post",
    url: "{{url('geo-cities')}}",
    data: {
        "_token": "{{ csrf_token() }}",
        id: old_state
    },
    success: function(res){
       
        // $('.city').empty();
        var html ='';
        $.each(res, function (index, value) {
            select = value.id==old_city?"selected":"";
            html += '<option value="'+value.id+'" '+select+' >'+value.name+'</option>';
        });
        $('.city').append(html);

    },
    error: function( msg ) {
        console.log();
    }

});


jQuery(document).on('change', '.country', function() {
    jQuery.ajax({
        url: "{{url('geo-states')}}",
        type: "POST",
        data: {
          "_token": "{{ csrf_token() }}",
            id: jQuery(this).val()
        },
        beforeSend: function() {
            $(".loader").show();
            jQuery(".state").empty();
            jQuery(".state").html("<option value>--select state--</option>");
        },
        complete: function(data) {
           $(".loader").hide();
            let json = JSON.parse(data.responseText);
            jQuery.each(json, function(i, v) {
                jQuery(".state").append("<option value=" + v['id'] + ">" + v['name'] + "</option>");
            });
        },
    });
});



jQuery(document).on('change', '.state', function() {
    jQuery.ajax({
        url: "{{url('geo-cities')}}",
        type: "POST",
        data: {
          "_token": "{{ csrf_token() }}",
            id: jQuery(this).val()
        },
        beforeSend: function() {
          $(".loader").show();
            jQuery(".city").empty();
            jQuery(".city").html("<option value>--select city--</option>");
        },
        complete: function(data) {
           $(".loader").hide();
            let json = JSON.parse(data.responseText);
            jQuery.each(json, function(i, v) {
                jQuery(".city").append("<option value=" + v['id'] + ">" + v['name'] + "</option>");
            });
        }
    });
});



$("#sell_location").change(function(){
    location_val = $(this).val();
    if(location_val == 'make' ){
        $('#makemap').css('display','block');
    }
    else{
        $('#makemap').css('display','none');
    }
});

       
     initMap();
      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {
            lat: 24.926294, lng: 67.022095},
          zoom: 13
        });


        var input = /** @type {!HTMLInputElement} */(document.getElementById('pac-input'));
        
        

        var types = document.getElementById('type-selector');
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(types);

        // var autocomplete = new google.maps.places.Autocomplete(input,options);
          var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.bindTo('bounds', map);

        var infowindow = new google.maps.InfoWindow();
        var marker = new google.maps.Marker({
          map: map,
          draggable: true,
           animation: google.maps.Animation.DROP,
          anchorPoint: new google.maps.Point(0, -29)
        });

        marker.addListener('dblclick', function() {
          // 3 seconds after the center of the map has changed, pan back to the
          // marker.
          window.setTimeout(function() {
            map.panTo(marker.getPosition());
          }, 3000);

        });



        autocomplete.addListener('place_changed', function() {
            
            
          infowindow.close();
          marker.setVisible(false);
          var place = autocomplete.getPlace();

          if (!place.geometry) {
            // User entered the name of a Place that was not suggested and
            // pressed the Enter key, or the Place Details request failed.
            window.alert("No details available for input: '" + place.name + "'");
            return;
          }

          // If the place has a geometry, then present it on a map.
          if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
          } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);  // Why 17? Because it looks good.
          }
          marker.setIcon(/** @type {google.maps.Icon} */({

            // url: place.icon,
            // size: new google.maps.Size(71, 71),
            // origin: new google.maps.Point(0, 0),
            // anchor: new google.maps.Point(17, 34),
            // scaledSize: new google.maps.Size(35, 35)

          })


          );
          
          console.log(place);
        //   console.log(place.geometry.location.lat());
          
            // $("#country").val(place['address_components'][7]['long_name']);
           
         
               
                var country_array = place.address_components.filter(function(address_component){
                    return address_component.types.includes("country");
                });
            
                var country = country_array.length ? country_array[0].long_name: "";
                
                
                var state_array = place.address_components.filter(function(address_component){
                    return address_component.types.includes("administrative_area_level_1");
                });
            
                var state = state_array.length ? state_array[0].long_name: "";
                
                
                
                var city_array = place.address_components.filter(function(address_component){
                    return address_component.types.includes("locality");
                });
            
                var city = city_array.length ? city_array[0].long_name: "";
                
                

            $("#country").val(country);
            $("#state").val(state);
            $("#city").val(city);
            
            $("#lati").val(place.geometry.location.lat());
            $("#long").val(place.geometry.location.lng());
            $("#address").val(place['formatted_address']);


           // marker.addListener('click', toggleBounce);
           marker.setPosition(place.geometry.location);
           marker.setVisible(true);

      google.maps.event.addListener(marker,'dblclick',function(event) { });

      geocoder = new google.maps.Geocoder();


google.maps.event.addListener(marker, 'dragend', function(){

      console.log("lat: "+marker.position.lat())
      console.log("lon: "+marker.position.lng())

      $("#lat").val(marker.position.lat());
      $("#lon").val(marker.position.lng());


       geocoder.geocode({latLng: marker.getPosition()}, function(responses) {
            if (responses && responses.length > 0) {
                // infoWindow.setContent(
                
                                
                
                   $("#location").val(responses[0].formatted_address);
                   $("#pac-input").val(responses[0].formatted_address);
                    $(".gm-style-iw-d").parent().remove();
                   
                // + "<br /> <small>" 
                // + "Latitude: " + marker.getPosition().lat() + "<br>" 
                // + "Longitude: " + marker.getPosition().lng() + "</small></div>"
                // );
                // infoWindow.open(map, marker);
            } else {
                alert('Error: Google Maps could not determine the address of this location.');
            }
        });


});


     function toggleBounce() {
        if (marker.getAnimation() !== null) {
          marker.setAnimation(null);
        } else {
          marker.setAnimation(google.maps.Animation.BOUNCE);
        }
      }




var item_Lat = place.geometry.location.lat()
var item_Lng = place.geometry.location.lng()
var item_Location = place.formatted_address;

        $("#lat").val(item_Lat);
        $("#lon").val(item_Lng);
        $("#location").val(item_Location);
        
          var address = '';
          if (place.address_components) {
            address = [
              (place.address_components[0] && place.address_components[0].short_name || ''),
              (place.address_components[1] && place.address_components[1].short_name || ''),
              (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
          }

          infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
          infowindow.open(map, marker);
        });

        // Sets a listener on a radio button to change the filter type on Places
        // Autocomplete.
        function setupClickListener(id, types) {
          var radioButton = document.getElementById(id);
          radioButton.addEventListener('click', function() {
            autocomplete.setTypes(types);
          });
        }

        setupClickListener('changetype-all', []);
        setupClickListener('changetype-address', ['address']);
        setupClickListener('changetype-establishment', ['establishment']);
        setupClickListener('changetype-geocode', ['geocode']);
      }




      function getAdd(lat,lon){



 var latlngPlace = new google.maps.LatLng(lat, lon);
      geocoder = new google.maps.Geocoder();
            geocoder.geocode({
            'latLng': latlngPlace
        }, function (results, status) {
           


                        if (status ==
                google.maps.GeocoderStatus.OK) {
                if (results[1]) {

                  

                document.getElementById('location').innerHTML = results[1].formatted_address;
                 
                } else {
                    alert('No results found');
                }
            } else {
                alert('Geocoder failed due to: ' + status);
            }
});
}




function auctionFields(elm){

auction = elm.val();


if(auction == 2){
    
   
  $("#start_date").css('display','block');
  $("#end_date").css('display','block');
  $("#start_time").css('display','block');
  $("#end_time").css('display','block');
  $("#live_bid_time").css('display','none');
  $("#live_bid_time").val(0);
  $("#start_amount_biding").css('display','block');
  
}
else if(auction == 1){
 
  $("#start_date").css('display','block');
  $("#end_date").css('display','none');
   $("#end_date").val(' ');
  $("#start_time").css('display','block');
  $("#end_time").css('display','none');
  $("#end_time").val(' ');
  $("#live_bid_time").css('display','block');
  $("#start_amount_biding").css('display','block');

}
else{
  
  $("#start_date").css('display','none');
  $("#end_date").css('display','none');
  $("#start_time").css('display','none');
  $("#end_time").css('display','none');
  $("#live_bid_time").css('display','none');
  $("#start_amount_biding").css('display','none');
  
}

}
</script>


<script>
    
function getSubBrands(elm){
  brand_id = elm.val();
//   console.log(brand_id)
  $("#properties").css('display','none');
 var h1 = '';
 var select1='';
 var option1 = '';
 var data1 = '';
 
 var h2 = '<h6 for="my-text-field" class="font-18 color-70 m-t-10"><span class="colorRed"></span></h6>';
 var select2='';
 var option2 = '';
 var data2 = '';
  $.ajax({
      type : 'GET',
      url  : "{{url('get-sub-brands')}}",
      data : {
        brand_id : elm.val(),
      },
      beforeSend:function(){
        $(".loader").show();
      },
      success:function(res){
        //   console.log(res);
          $("#subBrands").after('');
            $(".loader").hide();
            
        if(res==1){
          $.notify("Something went wrong", "error");
        }
        else{
          $("#subBrands").show();
          if( $('.clearAttributes').length > 0) {
           $('.clearAttributes').remove();
          }
          $("#oldBrand").hide();
          $("#subBrands").after(res);
        }
      },
      error:function(res){
         $(".loader").hide();
      },
  })
}



function getAssignedAttriubtes(elm){

  $.ajax({
    type : "GET",
    url  : "{{url('get-sub-brands-attributes')}}",
    data : {
      brand_id     : elm.attr('brand-id'),
      sub_brand_id : elm.val(),
    },
    // beforeSend:function(){
    //     $(".loader").show();
    // },
    success:function(res){
        
        console.log(res);
    //   $(".loader").hide();
      // $('.clearAttributes').remove();
      $("#subBrands").after(res);
      

    },
    error:function(res){
        $(".loader").hide();
    } 
  })
}





$('#category').change(function(){


    var categoryId = $(this).val();
    
    
    $.ajax({
        type : "post",
        url  : "{{ url('get-editSubCategories') }}",
        data : {
            "_token": "{{ csrf_token() }}",
            "categoryId": categoryId,

        },
        // beforeSend:function(){
        //   $(".loader").show();
        // },
        success:function(data){
           
        //   $(".loader").hide();
        //     $("#subCategoryButtons").show();


      $("#dropDowns").empty();
      $("#buttons").empty();
      $("#txtBoxes").empty();
      $("#brandDowns").empty();
      
      $("#Brands").empty();
      $("#oldSubCategoryDropDown").empty();
      $("#oldSubCategoryButton").empty();
      $("#oldSubCategoryInput").empty();
      
      $("#oldBrand").empty();
      
      

            // $("[name='category']").val(data.getCategory);
            // $(".selectedCategoryImage").append('<img src=" http://simsar.com/testsimsar/public/assets/media/category/icon/'+data.icon_image+'" class="cat-image">');
            // $(".selectedCategoryImage").append('<p class="colorRed cat-heading">'+data.title+'</p>')
            $("#subCategory").empty();
                $("#subCategory").append('<option value="0" > --Choose An Option--</option>');
            $.each(data.subCategories,function(k,v){
              $("#subCategory").append('<option value="'+v.id+'" > '+v.title+'</option>');
            });
            
            
        },

    });
//   $('.divSelectCategory').fadeOut();
//   $('.divSelectSubCategory').fadeIn();
});



 function bytesToSize(bytes) {
           var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
           if (bytes == 0) return '0 Byte';
           var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
        //   return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
        
        return { values : Math.round(bytes / Math.pow(1024, i), 2), size : sizes[i] };
        }


    // $(document).ready(function() {
    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            var pic_size = input.files[0].size;//get file size 
            var pic_type = input.files[0].type;
        
            var extension = pic_type.split('/').pop().toUpperCase();
        
                var totalsize = bytesToSize(pic_size);
                
                if(extension!="PNG" && extension!="JPG" && extension!="GIF" && extension!="JPEG"){
                    
                      $("#imageDetailValidation").modal('show');
                         $('#imageValidation').empty();
                         $('#imageValidation').append('<li> Only Image Allowed With These Extension PNG ,JPG ,GIF,JPEG</li>');
                         return false;
                    
                }
                else{
                    if( totalsize.values > 1 && totalsize.size == 'MB'){
                     
                         $("#imageDetailValidation").modal('show');
                         $('#imageValidation').empty();
                         $('#imageValidation').append('<li> Image can not be more than 1 MB</li>');
                         return false;
                    }
                    else if( totalsize.values > 1 && totalsize.size == 'GB'){
                        $("#imageDetailValidation").modal('show');
                        $('#imageValidation').empty();
                        $('#imageValidation').append('<li> Image can not be more than 1 MB </li>');
                         return false;
                    }
                    else if( totalsize.values > 1 && totalsize.size == 'TB'){
                         $("#imageDetailValidation").modal('show');
                         $('#imageValidation').empty();
                         $('#imageValidation').append('<li> Image can not be more than 1 MB </li>');
                         return false;
                    }
                    else{
                        
                        // alert('thank you');
                    }
                    
                    
                }
                
                
               
                
            reader.onload = function (e) {
                
                $('#move-Close-Btn1').css('display','block');
                $('.profile-pics').attr('src', e.target.result);
                
            }
    
            reader.readAsDataURL(input.files[0]);
        }
    }
    var readURLs = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            
             var pic_size = input.files[0].size;//get file size 
            var pic_type = input.files[0].type;
        
            var extension = pic_type.split('/').pop().toUpperCase();
        
                var totalsize = bytesToSize(pic_size);
                
                if(extension!="PNG" && extension!="JPG" && extension!="GIF" && extension!="JPEG"){
                    
                      $("#imageDetailValidation").modal('show');
                         $('#imageValidation').empty();
                         $('#imageValidation').append('<li> Only Image Allowed With These Extension PNG ,JPG ,GIF,JPEG</li>');
                         return false;
                    
                }
                else{
                    if( totalsize.values > 1 && totalsize.size == 'MB'){
                     
                         $("#imageDetailValidation").modal('show');
                         $('#imageValidation').empty();
                         $('#imageValidation').append('<li> Image can not be more than 1 MB</li>');
                         return false;
                    }
                    else if( totalsize.values > 1 && totalsize.size == 'GB'){
                        $("#imageDetailValidation").modal('show');
                        $('#imageValidation').empty();
                        $('#imageValidation').append('<li> Image can not be more than 1 MB </li>');
                         return false;
                    }
                    else if( totalsize.values > 1 && totalsize.size == 'TB'){
                         $("#imageDetailValidation").modal('show');
                         $('#imageValidation').empty();
                         $('#imageValidation').append('<li> Image can not be more than 1 MB </li>');
                         return false;
                    }
                    else{
                        
                        // alert('thank you');
                    }
                }

            reader.onload = function (e) {
                $('#move-Close-Btn').css('display','block');
                $('.profile-pic').attr('src', e.target.result);
            }
    
            reader.readAsDataURL(input.files[0]);
        }
    }
    
     $("#move-Close-Btn").on('click', function() {
    //   alert('0');
    
    $('.profile-pic').attr('src', '{{ asset('public/asset/images/upload-image-vector.png') }}');
    $(this).css('display','none');
    });
    
    
     $("#move-Close-Btn1").on('click', function() {
    //   alert('1');
    $('.profile-pics').attr('src', '{{ asset('public/asset/images/upload-image-vector.png') }}');
    $(this).css('display','none');
    });
    
    
    $(".file-uploads").on('change', function(){
        readURL(this);
    });
    $(".upload-buttons").on('click', function() {
       $(".file-uploads").click();
    });
    $(".file-upload").on('change', function(){
        readURLs(this);
    });
    $(".upload-button").on('click', function() {
       $(".file-upload").click();
    });
    
    
   $('#subCategory').change(function(){


    var subCategoryId = $(this).val();
      $("#dropDowns").empty();
      $("#buttons").empty();
      $("#txtBoxes").empty();
      $("#brandDowns").empty();
      
      $("#Brands").empty();
      $("#oldSubCategoryDropDown").empty();
      $("#oldSubCategoryButton").empty();
      $("#oldSubCategoryInput").empty();
      
      $("#oldBrand").empty();
      
    $.ajax({
        type : "post",
        url  : "{{ url('get-attributes') }}",
        data : {
            "_token": "{{ csrf_token() }}",
            "subCategoryId": subCategoryId,
            

        },
        // beforeSend:function(){
        //   $(".loader").show();
        // },
        success:function(data){
            //console.log(data)
            
        //   $(".loader").hide();
           
           




          
           
        //   $("[name='sub_category']").val(data.subCategoryId);
          $("#getAttributesz").show();
          $("#getAttributesz").html(data);
          if(data.dropDowns != null){
            // $("#btnSubCat").prop('disabled', false);
            $("#dropDowns").show();
            $("#dropDowns").append(data.dropDowns);
          }
          
           if(data.brandDowns != null){
               //console.log(data.brandDowns)
            // $("#btnSubCat").prop('disabled', false);
            $("#brandDowns").show();
            $("#brandDowns").append(data.brandDowns);
          }
          if(data.buttons != null){
            // $("#btnSubCat").prop('disabled', false);
            $("#buttons").show(data);
            $("#buttons").append('<div class="radio-toolbar">'+data.buttons+'</div>');
          }
          
           if(data.inputbox != null){
            // $("#btnSubCat").prop('disabled', false);
            $("#txtBoxes").show(data);
            $("#txtBoxes").append(data.inputbox);
          }
          
          
        //   $('.divSelectSubCategory').fadeOut();
        //   $('.finishCategory').fadeIn();
        //   $('.whatTypeOfAd').fadeIn();
        //   $(window).scrollTop(0);
          
        },
    });
    
   });
    
   $("#is_call").change(function(){
    
    is_call_val = $(this).val();
    
    if(is_call_val != 1 ){
        
        $('#start_offer').val(' ');
        // $('#start_offer').val(' ');
        $('#end_offer').val(' ');
        $('#price').val(0);
        $('#dis_price').val(0);
        $('#dis_percentage').val(0);

        // $('#makemap').css('display','block');
        
             $('#start_date').css('display','block');
             $('#end_date').css('display','block');
             $('#uper_price').css('display','block');
             $('#uper_discount_price').css('display','block');
             $('#uper_discount_percentage').css('display','block');

    }
    else{
        
             $('#start_date').css('display','none');
             $('#end_date').css('display','none');
             $('#uper_price').css('display','none');
             $('#uper_discount_price').css('display','none');
             $('#uper_discount_percentage').css('display','none');
        
        // $('#makemap').css('display','none');

    }
});



$('#pac-input').on('keyup keypress', function(e) {
  var keyCode = e.keyCode || e.which;
  if (keyCode === 13) { 
    e.preventDefault();
    return false;
  }
});
</script>
@endpush