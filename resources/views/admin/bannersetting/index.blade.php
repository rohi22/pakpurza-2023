@extends('admin.layouts.scaffold')

@section('title')
Simsar | Banner Setting
@endsection
@push('styles')
<style>
    .center{
        text-align:center;
    }
    .h-150-w-300{
        width:300px;height:150px;
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
                    Banner Setting
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
                                    </svg> 
                                </span>
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
            
            <div class="col-md-12 text-right">
                <button type="button" class="btn btn-danger mb-3" id="btbdeleteall"><i class="fa fa-trash"></i>delete</button></a>
                </div>

            <div class="kt-timeline-v2__items  kt-padding-top-25 kt-padding-bottom-30">
                <div class="kt-section__content">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%;">
                            <thead>
                                <tr>
                                    <th width="5%;" class='center'>#</th>
                                    <th width="25%;">Page Name</th>
                                    <th width="10%;" class='center'>Banner Image</th>
                                    <th width="15%;" class='center'>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($bannersetting->count() > 0)
                                @foreach ($bannersetting as $key=>$b)
                                    <tr>
                                        <th scope="row" class='center'>{{$key + $bannersetting->firstItem()}}</th>
                                        <td>{{ucfirst($b->page_title)}}</td>
                                        <td>
                                        <img src="{{ URL::asset('public/assets/media/bannersetting/'.$b->banner_image ) }}" class="h-150-w-300" />
                                          </td>
                                        
                                        <td align="center">
                                            <a href="{{url('edit-banner-setting/'.$b->id)}}"><button type="button" class="btn btn-type btn-primary btn-sm btn-icon"  data-placement="top" data-content="Edit"><i class="fa fa-edit"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="8" class='center'>No Record Found</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                        
                        {!! $bannersetting->links() !!}
                        
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