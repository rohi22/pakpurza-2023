@extends('admin.layouts.scaffold')

@section('title')
Simsar | View Chat 
@endsection

@push('styles')
<style>
    
    .left{
        text-align:left;
    }
    .right{
       text-align:right; 
    }
    
</style>
@endpush

@section('content')
<link rel='stylesheet' href="http://127.0.0.1:8000/testsimsar/public/asset/css/style.css" type='text/css' media='all' />
<link rel='stylesheet' href="http://127.0.0.1:8000/testsimsar/public/asset/css/mediaqueries.css" type='text/css' media='all' />
<link rel='stylesheet' href="http://127.0.0.1:8000/testsimsar/public/assets/css/updatedCSS.css" type='text/css' media='all' />      

<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="kt-portlet kt-portlet--height-fluid">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    User Conversation
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="dropdown dropdown-inline">
                    <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="flaticon-more-1"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-fit dropdown-menu-md" style="">

                        <!--begin::Nav-->
                        <ul class="kt-nav">
                            <li class="kt-nav__head">
                                Export Options
                                <span data-toggle="kt-tooltip" data-placement="right" title="" data-original-title="Export data as Excel & Pdf">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--type kt-svg-icon--md1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"></rect>
                                            <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"></circle>
                                            <rect fill="#000000" x="11" y="10" width="2" height="7" rx="1"></rect>
                                            <rect fill="#000000" x="11" y="7" width="2" height="2" rx="1"></rect>
                                        </g>
                                    </svg> </span>
                            </li>
                            <li class="kt-nav__separator"></li>
                            <li class="kt-nav__item">
                                <a href="#" class="kt-nav__link">
                                    <i class="kt-nav__link-icon flaticon2-sheet"></i>
                                    <span class="kt-nav__link-text">Export Excel</span>
                                </a>
                            </li>
                            <li class="kt-nav__item">
                                <a href="#" class="kt-nav__link">
                                    <i class="kt-nav__link-icon flaticon2-sheet"></i>
                                    <span class="kt-nav__link-text">Export Pdf</span>
                                </a>
                            </li>
                        </ul>

                        <!--end::Nav-->
                    </div>
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">
            <div class="row">
                <div class="col-md-12 ">
                        <div class="row">
                      <div class="col-12 col-md-4 text-right chat-message-left">
                        <div class="row p-t-10">
                          <div class="col-md-10 col-10 text-left">
                            <span class="div-chat-message"> Conversation </span>
                            
                          </div>
                          <div class="col-md-2 col-2 text-right">
                            <i class="fa fa-ellipsis-v textcolor-aaa" aria-hidden="true"></i>
                          </div>
                          
                        </div>
                        <div class="row chat-card">
                          <div class="col-md-10 col-10 text-left p-l-8">
                            <!--<h6 class="chat-card-heading" style="font-size: 20px !important;font-weight:700;">Ticket Id: #1210</h6>-->
                            <h6 class="chat-card-heading">Ad Id: {{$message_list->ad_id}}</h6>
                            <h6 class="chat-card-desc">Ad Title : {{$message_list->ad_title}}</h6>
                            <hr class="chat-hr width-100">
                            <div class="row">
                              <div class="col-md-12 text-left color-aaa-font-12">
                                <!--<h6 class="chat-card-desc"><strong>Safe Pay Id : 8n843</strong></h6>-->
                                <h6 class="chat-card-desc"><strong>Buyer : {{$message_list->fromId}} {{$message_list->fromName}} </strong></h6>
                                <h6 class="chat-card-desc"><strong>Seller : {{$message_list->toId}} {{$message_list->toName}} </strong></h6>
                              </div>
                            </div>
                            <div class="row">
                            <div class="col-md-12 text-left color-aaa-font-12">
                           
                              </div>
                            </div>
                          </div>
                          <div class="col-md-2 col-2 text-right">
                            <i class="fa fa-ellipsis-v textcolor-aaa" aria-hidden="true"></i>
                          </div>
                        </div>
                      </div>
                      <div class="col-12 col-md-8 text-left chat-message-right hide-mobile">
                        <div class="row p-t-b-10">
            
                          <div class="col-md-8 col-12">
                            <h4 class="chat-username">Ad Id: {{$message_list->ad_id}}</h4>
                            <!--<h6 class="chat-last-seen">Last seen on Today at 02:45 PM </h6>-->
                          </div>
                          <!--<div class="col-md-4 col-12 text-right">-->
                          <!--  <h6 class="chat-card-heading">Safe Pay Id: dbvsfh44</h6>-->
                          <!--</div>-->
                        </div>
                        <div class="row backgroundWhite p-t-5">
                          <div class="col-12">
                            <div class="row">
                              <div class="col p-r-0">
                                <hr class="hr-new-message">
                              </div>
                              
                             
                            </div>
                          </div>
                        </div>
                        
                    
                        <div class="row backgroundWhite" hidden>
                          <div class="col-12">
                            <div class="row">
                              <div class="col-12 col-md-6 text-left">
                                <div class="row bg-chat-received">
                                  <div class="col-12 p-20-b-0">
                                    Lorem ipsum dolor sitamet Lorem ipsum dolor sitamet Lorem ipsum dolor sitametLorem ipsum dolor sitamet Lorem ipsum dolor sitamet Lorem ipsum dolor sitamet Lorem ipsum dolor sitamet Lorem ipsum dolor sitamet....
                                  </div>
                                  <div class="col-8">
                                  </div>
                                  <div class="col-4 text-right p-b-10">
                                    2:14 PM
                                  </div>
            
                                </div>
                              </div>
                              <div class="col-6"></div>
                            </div>
                            <div class="row">
                              <div class="col-6"></div>
                              <div class="col-12 col-md-6 text-left">
                                <div class="row bg-chat-sent">
                                  <div class="col-12 p-20-b-0">
                                    Lorem ipsum dolor sitamet Lorem ipsum dolor sitamet Lorem ipsum dolor sitametLorem ipsum dolor sitamet Lorem ipsum dolor sitamet Lorem ipsum dolor sitamet Lorem ipsum dolor sitamet Lorem ipsum dolor sitamet....
                                  </div>
                                  <div class="col-8">
                                  </div>
                                  <div class="col-4 text-right p-b-10">
                                    2:14 PM
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        
                        
                        
                        @foreach($messages as $key=>$mess)
                      
                       @if($mess->from_id == $message_list->from_id)
                       
                        <div class="left">
                        <p><small>{{$mess->created_at}}</small></p>
                        <p><i>{{$mess->fromName}}</i></p>
                        
                        
                        @if($mess->attachment != null)
                        <p> <a download="" href="{{asset('/images/ticket-attachments/'.$mess->attachment)}}">{{$mess->attachment}} <i class="fa fa-download"></i></a></p>
                        @else
                        <p>{{$mess->body}}</p>
                        @endif
                        
                        </div>
                                
                        @else
                            <div class="right">
                            <p><small>{{$mess->created_at}}</small></p>
                            <p><i>{{$mess->fromName}}</i></p>
                             @if($mess->attachment != null)
                        <p> <a download="" href="{{asset('/images/ticket-attachments/'.$mess->attachment)}}">{{$mess->attachment}} <i class="fa fa-download"></i></a></p>
                        @else
                        <p>{{$mess->body}}</p>
                        @endif
                            </div>
                        
                          @endif          
                        @endforeach
                                    
                                    
                                    
                                   
                                                     
                                                     
                                                     
                                                     
                        <div class="row bg-new-message" hidden>
                          <div class="col-12">
                            <div class="row">
                              <div class="col p-r-0">
                                <hr class="hr-new-message">
                              </div>
                              <div class="col-3 text-center heading-new-message">
                                NEW MESSAGE
                              </div>
                              <div class="col p-l-0">
                                <hr class="hr-new-message">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row backgroundWhite" hidden>
                          <div class="col-12">
                            <div class="row">
                              <div class="col-12 col-md-6 text-left">
                                <div class="row bg-chat-received">
                                  <div class="col-12 p-20-b-0">
                                    OK
                                  </div>
                                  <div class="col-8">
                                  </div>
                                  <div class="col-4 text-right p-b-10">
                                    2:15 PM
                                  </div>
            
                                </div>
                              </div>
                              <div class="col-6"></div>
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

<!-- end:: Content -->
@endsection

@push('scripts')
@endpush