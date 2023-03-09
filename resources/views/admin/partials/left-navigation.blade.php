<!-- begin:: Aside -->
@php
$urlcat =  Request::segment(3);
$urlbrand = Request::segment(1);

@endphp
{{$urlcat,$urlbrand}}
<button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
<div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">

    <!-- begin:: Aside Menu -->
    <div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
        <div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1" data-ktmenu-dropdown-timeout="500" style="max-height:635px;overflow-y:hidden;">
            
            
            <ul class="kt-menu__nav ">
                <li class="kt-menu__item @if(isset($menu) ? $menu == 'dashboardmenu' : '')  kt-menu__item--active  @endif" aria-haspopup="true">
                    <a href="{{ url('admin-dashboard') }}" class="kt-menu__link ">
                        <i class="kt-menu__link-icon flaticon2-protection"></i><span class="kt-menu__link-text">Dashboard </span></a></li>
                
                <li class="kt-menu__item  kt-menu__item--submenu @if(isset($menu) ? $menu == 'categorymenu' : '' || isset($urlcat)) kt-menu__item--open @endif" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                    <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                        <i class="kt-menu__link-icon flaticon2-protection"></i> 
                        <span class="kt-menu__link-text">Categories</span>
                        <i class="kt-menu__ver-arrow la la-angle-right"></i>
                    </a>
                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{ url('categories') }}" class="kt-menu__link ">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot "><span></span></i>
                                                                     
                                    <span class="kt-menu__link-text  @if( (isset($submenu) ? $submenu == 'categorysubmenu1': '') && ($urlbrand != 'create-sub-type') && $urlbrand != 'sub-type') active-class @endif @if(isset($urlcat)) active-class @endif  @php echo ($urlbrand == 'create-sub-type' && $urlbrand != 'sub-types')?'active-classs':''; ($urlbrand == 'sub-types')?'':'active-class'; @endphp" >View Categories</span>
                                </a>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{ url('create-category') }}" class="kt-menu__link ">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text @if(isset($submenu) ? $submenu == 'categorysubmenu2' : '') active-class @endif">Add Category</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                
                            
                <!--<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon2-gear"></i><span class="kt-menu__link-text">Setups</span><span class="kt-menu__link-badge"><span class="kt-badge kt-badge--type">2</span></span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>-->
                <!--    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>-->
                <!--        <ul class="kt-menu__subnav">-->
                            
                <!--        </ul>-->
                <!--    </div>-->
                <!--</li>-->
                
                <li class="kt-menu__item  kt-menu__item--submenu @if(isset($menu) ? $menu == 'webmenu' : '') kt-menu__item--open @endif" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon  flaticon-globe "></i><span class="kt-menu__link-text">Web Settings</span></span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="{{ url('header-setting') }}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text @if($submenu == 'websubmenu1') active-class @endif ">Header</span></a>
                            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="{{ url('footer-setting') }}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text @if($submenu == 'websubmenu2') active-class @endif ">Footer</span></a>
                            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="{{ url('sms-email-setting') }}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text @if($submenu == 'websubmenu3') active-class @endif ">SMS/Email</span></a>
                            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="{{ url('coin-wallet-setting') }}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text @if($submenu == 'websubmenu4') active-class @endif ">Coin Wallet</span></a>
                            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="{{ url('deposit-limit-setting') }}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text @if($submenu == 'websubmenu5') active-class @endif ">Deposit Limit</span></a>
                            
                            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                                <a href="{{ url('ads-setting') }}" class="kt-menu__link kt-menu__toggle">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text @if(isset($submenu) ? $submenu == 'websubmenu7' : '') active-class @endif ">
                                        Ads Setting
                                    </span>
                                </a>
                            
                            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                                <a href="{{ url('developer-mode') }}" class="kt-menu__link kt-menu__toggle">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text @if(isset($submenu) ? $submenu == 'websubmenu6' : '') active-class @endif ">
                                        Developer Mode 
                                    </span>
                                </a>
                        </ul>
                    </div>
                </li>
                
                
                <li class="kt-menu__item  kt-menu__item--submenu @if(isset($menu) ? $menu == 'cmsmenu' : '') kt-menu__item--open @endif" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon  flaticon-globe "></i><span class="kt-menu__link-text">CMS</span></span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                                
                                 <a href="{{ url('admin/faq-category') }}" class="kt-menu__link kt-menu__toggle">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                        <span></span>
                                    </i><span class="kt-menu__link-text @if(isset($submenu) ? $submenu == 'faqcategorymenu' : '') active-class @endif">FAQ Category</span>
                                </a>
                                </li>
                                <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                                <a href="{{ url('admin/all-faqs') }}" class="kt-menu__link kt-menu__toggle">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                        <span></span>
                                    </i><span class="kt-menu__link-text @if(isset($submenu) ? $submenu == 'cmssubmenu8' : '') active-class @endif">FAQs page</span>
                                </a>
                                </li>
                                <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                                 <a href="{{ url('admin/pages/1') }}" class="kt-menu__link kt-menu__toggle">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                        <span></span>
                                    </i><span class="kt-menu__link-text @if(isset($submenu) ? $submenu == 'cmssubmenu1' : '') active-class @endif">About us page</span>
                                </a>
                                </li>
                                <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                                <a href="{{ url('admin/contact-us') }}" class="kt-menu__link kt-menu__toggle">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                        <span></span>
                                    </i><span class="kt-menu__link-text @if(isset($submenu) ? $submenu == 'cmssubmenu7' : '') active-class @endif">Contact us page</span>
                                </a>
                                </li>
                                <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                                 <a href="{{ url('admin/pages/4') }}" class="kt-menu__link kt-menu__toggle">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                        <span></span>
                                    </i><span class="kt-menu__link-text @if(isset($submenu) ? $submenu == 'cmssubmenu4' : '') active-class @endif">	Terms of use</span>
                                </a>
                                </li>
                                <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                                <a href="{{ url('admin/pages/2') }}" class="kt-menu__link kt-menu__toggle">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                        <span></span>
                                    </i><span class="kt-menu__link-text @if(isset($submenu) ? $submenu == 'cmssubmenu2' : '') active-class @endif">	Privacy policy</span>
                                </a>
                                </li>
                                <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                                 <a href="{{ url('admin/pages/3') }}" class="kt-menu__link kt-menu__toggle">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                        <span></span>
                                    </i><span class="kt-menu__link-text @if(isset($submenu) ? $submenu == 'cmssubmenu3' : '') active-class @endif">Terms and conditions</span>
                                </a>
                                </li>
                                <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                                <a href="{{ url('admin/pages/5') }}" class="kt-menu__link kt-menu__toggle">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                        <span></span>
                                    </i><span class="kt-menu__link-text @if(isset($submenu) ? $submenu == 'cmssubmenu5' : '') active-class @endif">Payment methods</span>
                                </a>
                                </li>
                                <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                                <a href="{{ url('admin/pages/6') }}" class="kt-menu__link kt-menu__toggle">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                        <span></span>
                                    </i><span class="kt-menu__link-text @if(isset($submenu) ? $submenu == 'cmssubmenu6' : '') active-class @endif">Return Policy</span>
                                </a>
                                </li>
                               
                            
                        </ul>
                    </div>
                </li>
                
                 <!--<li class="kt-menu__item @if(isset($submenu) ? $menu == 'sellnowmenu' : '')  kt-menu__item--active  @endif " aria-haspopup="true"><a href="{{ url('admin/sell-now-setting') }}" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-calendar-6"></i><span class="kt-menu__link-text">Sell Now fields</span></a></li>-->
                <li class="kt-menu__item @if(isset($menu) ? $menu == 'typemenu' : '' && !isset($urlcat) )  kt-menu__item--active  @endif @php ($urlbrand=='create-sub-type')?'kt-menu__item--active':''; @endphp @php echo ($urlbrand == 'create-sub-type')?'kt-menu__item--active':''; @endphp @php echo ($urlbrand == 'sub-type')?'kt-menu__item--active':''; @endphp" aria-haspopup="true">
                    <a href="{{ url('admin/types') }}" class="kt-menu__link ">
                    <i class="kt-menu__link-icon flaticon2-calendar-6"></i>
                    <span class="kt-menu__link-text">Types</span></a>
                </li>
                
                
                <li class="kt-menu__item @if(isset($menu) ? $menu == 'typemenu' : '' && !isset($urlcat) )  kt-menu__item--active  @endif @php ($urlbrand=='create-sub-type')?'kt-menu__item--active':''; @endphp @php echo ($urlbrand == 'create-sub-type')?'kt-menu__item--active':''; @endphp @php echo ($urlbrand == 'sub-types')?'kt-menu__item--active':''; @endphp" aria-haspopup="true">
                    <a href="{{ url('admin/userchat') }}" class="kt-menu__link ">
                    <i class="kt-menu__link-icon flaticon2-calendar-6"></i>
                    <span class="kt-menu__link-text">User Chat</span></a>
                </li>
                
              
                
                
                <li class="kt-menu__item  kt-menu__item--submenu @if(isset($menu) ? $menu == 'packagemenu' : '') kt-menu__item--open @endif" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                    <a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon  flaticon-globe ">
                        
                    </i><span class="kt-menu__link-text">Packages</span></span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            
                            
               
                
                <li class="kt-menu__item  kt-menu__item--submenu @if(isset($submenu) ? $submenu == 'packageservicemenu2' : '') kt-menu__item--open @endif" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                    <a href="javascript:;" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-text">Services</span></span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                                <a href="{{ url('admin/services') }}" class="kt-menu__link kt-menu__toggle">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text @if(isset($submenusub)  ? $submenusub == 'packageservicemenu21' : '') active-class @endif">Settings</span></a>
                            </li>
                        </ul>
                    </div>
                </li>
                
                
                <li class="kt-menu__item  kt-menu__item--submenu @if(isset($submenusub)  ? $submenu == 'packagesubmenu2' : '') kt-menu__item--open @endif" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                    <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                        <span class="kt-menu__link-text">Bump up ads</span></span>
                        <i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                                <a href="{{ url('admin/all-bump-up-ads') }}" class="kt-menu__link kt-menu__toggle">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text @if(isset($submenusub)  ? $submenusub == 'packagesubmenu21' : '') active-class @endif">Settings</span></a>
                            </li>
                        </ul>
                    </div>
                </li>
                
                
                <li class="kt-menu__item  kt-menu__item--submenu @if(isset($submenusub)  ? $submenu == 'packagesubmenu3' : '') kt-menu__item--open @endif" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-text">Featured listings</span></span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            
                            <li class="kt-menu__item  kt-menu__item--submenu @if(isset($submenusub)  ? $submenulevel1 == 'packagesubmenu3_1' : '') kt-menu__item--open @endif" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                                <a href="javascript:;" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-text">Search Featured</span></span>
                                <i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                                    <ul class="kt-menu__subnav">
                                        <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                                             <a href="{{ url('admin/search-featured-listings') }}" class="kt-menu__link kt-menu__toggle">
                                                 <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                                 <span class="kt-menu__link-text @if(isset($submenusub)  ? $submenusub == 'packagesubmenu31' : '') active-class @endif">Settings</span></a>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </li>
                
                             <li class="kt-menu__item  kt-menu__item--submenu @if(isset($submenusub)  ? $submenulevel1 == 'packagesubmenu3_2' : '') kt-menu__item--open @endif" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                                 <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                                     <span class="kt-menu__link-text">Category Featured</span></span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                                    <ul class="kt-menu__subnav">
                                        <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                                            <a href="{{ url('admin/category-featured-listings') }}" class="kt-menu__link kt-menu__toggle">
                                                <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                                <span class="kt-menu__link-text @if(isset($submenusub)  ? $submenusub == 'packagesubmenu32' : '') active-class @endif">Settings</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            
                            <li class="kt-menu__item  kt-menu__item--submenu @if(isset($submenusub)  ? $submenulevel1 == 'packagesubmenu3_4' : '') kt-menu__item--open @endif" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                                <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                                    <span class="kt-menu__link-text">Type Featured</span></span>
                                    <i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                                    <ul class="kt-menu__subnav">
                                        <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                                            <a href="{{ url('admin/type-featured-listings') }}" class="kt-menu__link kt-menu__toggle">
                                                <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                                <span class="kt-menu__link-text @if(isset($submenusub)  ? $submenusub == 'packagesubmenu34' : '') active-class @endif">Settings</span></a>
                                        </li>
                                      
                                    </ul>
                                </div>
                            </li>
                            
                            
                            <li class="kt-menu__item  kt-menu__item--submenu @if(isset($submenusub)  ? $submenulevel1 == 'packagesubmenu3_5' : '') kt-menu__item--open @endif" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                                <a href="javascript:;" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-text">Shop Featured</span></span>
                                <i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                                    <ul class="kt-menu__subnav">
                                        <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                                            <a href="{{ url('admin/shop-featured-listings') }}" class="kt-menu__link kt-menu__toggle">
                                                <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                                <span class="kt-menu__link-text @if(isset($submenusub)  ? $submenusub == 'packagesubmenu35' : '') active-class @endif">Settings</span></a>
                                        </li>
                                       
                                    </ul>
                                </div>
                            </li>
                            
                            <li class="kt-menu__item  kt-menu__item--submenu @if(isset($submenulevel1)  ? $submenulevel1 == 'packagesubmenu3_6' : '') kt-menu__item--open @endif" aria-haspopup="true" data-ktmenu-submenu-toggle="hover" style="display:none;">
                                <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                                    <span class="kt-menu__link-text">Hot Item Featured</span></span>
                                    <i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                                    <ul class="kt-menu__subnav">
                                        <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                                            <a href="{{ url('admin/hot-featured-listings') }}" class="kt-menu__link kt-menu__toggle">
                                                <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                                <span class="kt-menu__link-text @if(isset($submenusub) ? $submenusub == 'packagesubmenu36' : '') active-class @endif">Settings</span></a>
                                        </li>
                                        <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                                            <a href="{{ url('admin/purchases-hot-featured-listings') }}" class="kt-menu__link kt-menu__toggle">
                                                <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                                <span class="kt-menu__link-text  @if(isset($submenusub) ? $submenusub == 'packagesubmenu326' : '') active-class @endif">Purchases</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            
                            
                            
                           
                            
                            
                        </ul>
                    </div>
                </li>
                          
                          <li class="kt-menu__item  kt-menu__item--submenu @if(isset($submenusub) ? $submenu == 'packagesubmenu4' : '') kt-menu__item--open @endif" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                              <a href="javascript:;" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-text">Banner ads</span></span>
                              <i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                                    <ul class="kt-menu__subnav">
                                        
                                       @php  $Pagelist = App\Models\Pagelist::get();  @endphp
                                        
                                        
                @if($Pagelist->count() > 0)
                  @foreach($Pagelist as $p)
                   
                  
                   <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                                            <a href="{{ url('admin/all-banner-ads/'.$p->id) }}" class="kt-menu__link kt-menu__toggle">
                                                <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                                <span class="kt-menu__link-text @if(isset($submenusub) ? $submenusub == 'packagesubmenu41_{{$p->id}}' : '') active-class @endif">{{ ucwords($p->page_title)}}</span></a>
                                        </li>
                                        
                  @endforeach
                  @endif
                  
                  
                                        
                                        
                                        
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
                
                
                <li class="kt-menu__item  kt-menu__item--submenu @if(isset($menu) ? $menu == 'purchasesmenu' : '') kt-menu__item--open @endif" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                    <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                        <i class="kt-menu__link-icon flaticon-imac"></i>
                        <span class="kt-menu__link-text">Purchases</span>
                        </span>
                    <i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            
                        
                            
                            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
    <a href="{{ url('admin/purchases-services') }}" class="kt-menu__link kt-menu__toggle">
        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
        <span class="kt-menu__link-text @if(isset($$submenusub) ? $submenusub == 'purchasessubmenu1' : '') active-class @endif">Services Purchases</span></a>
</li>




<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
    <a href="{{ url('admin/purchases-bump-up-ads') }}" class="kt-menu__link kt-menu__toggle">
        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
        <span class="kt-menu__link-text @if(isset($submenusub) ?  $submenusub == 'purchasessubmenu2' : '') active-class @endif">Bump up ads Purchases</span></a>
</li>





<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
	<a href="{{ url('admin/purchases-search-featured-listings') }}" class="kt-menu__link kt-menu__toggle">
	<i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
	<span class="kt-menu__link-text @if(isset($submenusub) ? $submenusub == 'purchasessubmenu3' : '') active-class @endif">Search Featured Purchases</span></a>
</li>



<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
    <a href="{{ url('admin/purchases-category-featured-listings') }}" class="kt-menu__link kt-menu__toggle">
        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
        <span class="kt-menu__link-text @if(isset($submenusub) ? $submenusub == 'purchasessubmenu4' : '') active-class @endif">Category Featured Purchases</span></a>
</li>



<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
    <a href="{{ url('admin/purchases-type-featured-listings') }}" class="kt-menu__link kt-menu__toggle">
        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
        <span class="kt-menu__link-text @if(isset($submenusub) ? $submenusub == 'purchasessubmenu5' : '') active-class @endif ">Type Featured Purchases</span></a>
</li>



<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
    <a href="{{ url('admin/purchases-shop-featured-listings') }}" class="kt-menu__link kt-menu__toggle">
        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
        <span class="kt-menu__link-text  @if(isset($submenusub) ? $submenusub == 'purchasessubmenu6' : '') active-class @endif">Shop Featured Purchases</span></a>
</li>


{{-- <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
    <a href="{{ url('admin/purchases-banner-ads') }}" class="kt-menu__link kt-menu__toggle">
        <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
        <span class="kt-menu__link-text @if(isset($submenusub) ? $submenusub == 'purchasessubmenu7' : '') active-class @endif">Banner ads Purchases</span></a>
</li> --}}
                            
                           
                        </ul>
                    </div>
                </li>
                
                
                
                <li class="kt-menu__item  kt-menu__item--submenu @if(isset($menu) ? $menu == 'bannerslotsdmenu' : '')  kt-menu__item--active  @endif" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                                 <a href="{{ url('admin/banner-slots') }}" class="kt-menu__link kt-menu__toggle">
                                     <i class="kt-menu__link-icon flaticon-imac"></i><span class="kt-menu__link-text">Banner Slots</span>
                                </a>
                           </li>
                           
                           <li class="kt-menu__item  kt-menu__item--submenu @if(isset($menu) ? $menu == 'attributesdmenu' : '')  kt-menu__item--active  @endif" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                                 <a href="{{ url('admin/attributes') }}" class="kt-menu__link kt-menu__toggle">
                                     <i class="kt-menu__link-icon flaticon-imac"></i><span class="kt-menu__link-text">All Attributes</span>
                                </a>
                           </li>
                           
                           
                           <li class="kt-menu__item  kt-menu__item--submenu @if(isset($menu) ? $menu == 'transactionsmenu' : '')  kt-menu__item--active  @endif" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                                 <a href="{{ url('admin/transactions') }}" class="kt-menu__link kt-menu__toggle">
                                     <i class="kt-menu__link-icon flaticon-imac"></i><span class="kt-menu__link-text">All Transactions </span>
                                </a>
                           </li>
                           
                
                <li class="kt-menu__item  kt-menu__item--submenu @if(isset($menu) ? $menu == 'slidermenu' : '') kt-menu__item--open @endif" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                    <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                        <i class="kt-menu__link-icon flaticon-imac"></i>
                        <span class="kt-menu__link-text">Slider</span>
                        </span>
                    <i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                                <a href="{{ url('slider') }}" class="kt-menu__link kt-menu__toggle">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text @if(isset($submenu) ? $submenu == 'slidermenu1' : '') active-class @endif">View Slides</span></a>
                            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                                <a href="{{ url('create-slider') }}" class="kt-menu__link kt-menu__toggle">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text @if(isset($submenu) ? $submenu == 'slidermenu2' : '') active-class @endif">Add a Slide</span></a>
                            </li>
                        </ul>
                    </div>
                </li>
                
                
                <li class="kt-menu__item  kt-menu__item--submenu @if(isset($menu) ? $menu == 'applicationmenu' : '') kt-menu__item--open @endif" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                    <a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon-imac"></i>
                    <span class="kt-menu__link-text">Application Slider</span></span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                                <a href="{{ url('application-slider') }}" class="kt-menu__link kt-menu__toggle">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text @if(isset($submenu) ? $submenu == 'applicationmenu1' : '') active-class @endif">View Slides</span></a>
                            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                                <a href="{{ url('create-application-slider') }}" class="kt-menu__link kt-menu__toggle">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text @if(isset($submenu) ? $submenu == 'applicationmenu2' :'') active-class @endif">Add a Slide</span></a>
                            </li>
                        </ul>
                    </div>
                </li>

              
            <li class="kt-menu__item kt-menu__item--submenu @if(isset($menu) ? $menu == 'usermenu' : '')  kt-menu__item--active  @endif " aria-haspopup="true">
                <a href="{{ url('user-list') }}" class="kt-menu__link ">
                    <i class="kt-menu__link-icon flaticon-user"></i><span class="kt-menu__link-text">Users</span></a>
            </li>
            
            <li class="kt-menu__item kt-menu__item--submenu @if(isset($submenu) ? $menu == 'userwallet' : '')  kt-menu__item--active  @endif " aria-haspopup="true">
                <a href="{{ url('admin/user-wallet') }}" class="kt-menu__link ">
                    <i class="kt-menu__link-icon flaticon-user"></i><span class="kt-menu__link-text">User Wallet</span></a>
            </li>
            
             <li class="kt-menu__item kt-menu__item--submenu @if(isset($submenu) ? $menu == 'companymenu' : '')  kt-menu__item--active  @endif " aria-haspopup="true">
                <a href="{{ url('company-list') }}" class="kt-menu__link ">
                    <i class="kt-menu__link-icon flaticon-user"></i><span class="kt-menu__link-text">Company</span></a>
            </li>
            
            <li class="kt-menu__item  kt-menu__item--submenu @if(isset($submenu) ? $menu == 'listingmenu' : '')  kt-menu__item--active  @endif" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                <a href="{{ url('adsell') }}" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon-imac"></i><span class="kt-menu__link-text">Listing</span></a>
            </li>
            <li class="kt-menu__item  kt-menu__item--submenu @if(isset($menu) ? $menu == 'wishmenu' : '')  kt-menu__item--active  @endif" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                <a href="{{ url('admin/wish-list') }}" class="kt-menu__link kt-menu__toggle">
                    <i class="kt-menu__link-icon flaticon-imac"></i>
                    <span class="kt-menu__link-text">Wish List</span>
                </a> 
            </li>
            
            <li class="kt-menu__item  kt-menu__item--submenu @if(isset($submenu) ? $menu == 'contactmenu' : '')  kt-menu__item--active  @endif" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                <a href="{{ url('admin/contact-list') }}" class="kt-menu__link kt-menu__toggle">
                    <i class="kt-menu__link-icon flaticon-imac"></i>
                    <span class="kt-menu__link-text">Contact List</span>
                </a> 
            </li>
            
            
             <li class="kt-menu__item  kt-menu__item--submenu @if(isset($submenu) ? $menu == 'userlogsmenu' : '')  kt-menu__item--active  @endif" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                <a href="{{ url('admin/userlogs-list') }}" class="kt-menu__link kt-menu__toggle">
                    <i class="kt-menu__link-icon flaticon-imac"></i>
                    <span class="kt-menu__link-text">All Logs</span>
                </a> 
            </li>
            
            


             <li class="kt-menu__item  kt-menu__item--submenu @if(isset($submenu) ? $menu == 'walletpanelmenu' : '') kt-menu__item--open @endif" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                    <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                        <i class="kt-menu__link-icon flaticon2-protection"></i> 
                        <span class="kt-menu__link-text">Wallet</span>
                        <i class="kt-menu__ver-arrow la la-angle-right"></i>
                    </a>
                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="#" class="kt-menu__link ">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot "><span></span></i>
                                    <span class="kt-menu__link-text @if(isset($submenu) ? $submenu == 'walletsubmenu1' : '') active-class @endif ">Safe Pay</span>
                                </a>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{ url('wallet-funds') }}" class="kt-menu__link ">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot "><span></span></i>
                                    <span class="kt-menu__link-text @if(isset($submenu) ? $submenu == 'walletsubmenu2'  : '') active-class @endif ">Wallet Funds</span>
                                </a>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{ url('wallet-transactions') }}" class="kt-menu__link ">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text @if(isset($submenu) ? $submenu == 'walletsubmenu3' : '') active-class @endif">Transaction</span>
                                </a>
                            </li>
                            
                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="#{{-- {{ route('admin.bank.index') }} --}}" class="kt-menu__link ">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
                                    <span class="kt-menu__link-text @if(isset($submenu) ? $submenu == 'walletsubmenu4' : '') active-class @endif">Bank Accounts</span>
                                </a>
                            </li>
                            
                        </ul>
                    </div>
                </li>
            
             <li class="kt-menu__item  kt-menu__item--submenu @if(isset($submenu) ? $menu == 'coins_menu' : '') kt-menu__item--open @endif" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                    <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                        <i class="kt-menu__link-icon flaticon2-protection"></i> 
                        <span class="kt-menu__link-text">Coin Wallet</span>
                        <i class="kt-menu__ver-arrow la la-angle-right"></i>
                    </a>
                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{ url('coin-transactions') }}" class="kt-menu__link ">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot "><span></span></i>
                                    <span class="kt-menu__link-text @if(isset($submenu) ? $submenu == 'coin-transactions' : '') active-class @endif ">Coin Transactions</span>
                                </a>
                            </li>
                           
                        </ul>
                    </div>
                </li>
            
            
            
           
           
                <li class="kt-menu__item  kt-menu__item--submenu @if(isset($menu) ? $menu == 'controlpanelmenu' : '') kt-menu__item--open @endif" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                    <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                        <i class="kt-menu__link-icon flaticon2-protection"></i> 
                        <span class="kt-menu__link-text">Setting Control</span>
                        <i class="kt-menu__ver-arrow la la-angle-right"></i>
                    </a>
                    <div class="kt-menu__submenu "><span class="kt-menu__arrow" ></span>
                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{ url('bumup-ads-setting') }}" class="kt-menu__link ">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot "><span></span></i>
                                    <span class="kt-menu__link-text @if(isset($submenu) ? $submenu == 'controlpanelsubmenu1' : '') active-class @endif ">BumUp Ads Setting</span>
                                </a>
                            </li>
                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{ url('banner-setting') }}" class="kt-menu__link ">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot "><span></span></i>
                                    <span class="kt-menu__link-text @if(isset($submenu) ? $submenu == 'controlpanelsubmenu5' : '') active-class @endif ">Banner Setting</span>
                                </a>
                            </li>

                             <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{ url('report-setting') }}" class="kt-menu__link ">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot "><span></span></i>
                                    <span class="kt-menu__link-text @if(isset($submenu) ? $submenu == 'controlpanelsubmenu3' : '') active-class @endif ">Report Setting</span>
                                </a>
                            </li>
                            
                              <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{ url('user-report-list') }}" class="kt-menu__link ">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot "><span></span></i>
                                    <span class="kt-menu__link-text @if(isset($submenu) ? $submenu == 'controlpanelsubmenu4' : '') active-class @endif ">User Report List</span>
                                </a>
                              </li>
                              
                              
                              
                              <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{ url('registration-setting') }}" class="kt-menu__link ">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot "><span></span></i>
                                    <span class="kt-menu__link-text @if(isset($submenu) ? $submenu == 'controlpanelsubmenu6' : '') active-class @endif ">Registration Setting</span>
                                </a>
                              </li>
                              
                              
                              <li class="kt-menu__item " aria-haspopup="true" style="display:none">
                                <a href="{{ url('ads-sell-setting') }}" class="kt-menu__link ">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot "><span></span></i>
                                    <span class="kt-menu__link-text @if(isset($submenu) ? $submenu == 'controlpanelsubmenu7' : '') active-class @endif ">Ads Sell Setting</span>
                                </a>
                              </li>
                              
                              <li class="kt-menu__item " aria-haspopup="true" style="display:none">
                                <a href="{{ url('developer-mode-setting') }}" class="kt-menu__link ">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot "><span></span></i>
                                    <span class="kt-menu__link-text @if(isset($submenu) ? $submenu == 'controlpanelsubmenu7' : '') active-class @endif ">Developer Mode Setting</span>
                                </a>
                              </li>
                              
                            
                        </ul>
                    </div>
                </li>
                
                
                
                <li class="kt-menu__item  kt-menu__item--submenu @if(isset($submenu) ? $menu == 'paymentpanelmenu' : '') kt-menu__item--open @endif" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                    <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                        <i class="kt-menu__link-icon flaticon2-protection"></i> 
                        <span class="kt-menu__link-text">Payment Control</span>
                        <i class="kt-menu__ver-arrow la la-angle-right"></i>
                    </a>
                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{ url('payment-setting') }}" class="kt-menu__link ">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot "><span></span></i>
                                    <span class="kt-menu__link-text @if(isset($submenu) ? $submenu == 'paymentpanelsubmenu1' : '') active-class @endif ">Payment Setting</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                
                
                <li class="kt-menu__item  kt-menu__item--submenu @if(isset($submenu) ? $menu == 'adminearning' : '') kt-menu__item--open @endif" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                    <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                        <i class="kt-menu__link-icon flaticon2-protection"></i> 
                        <span class="kt-menu__link-text">Admin Earning</span>
                        <i class="kt-menu__ver-arrow la la-angle-right"></i>
                    </a>
                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item " aria-haspopup="true">
                                <a href="{{ url('admin-earning') }}" class="kt-menu__link ">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot "><span></span></i>
                                    <span class="kt-menu__link-text @if(isset($submenu) ? $submenu == 'adminearningsubmenu1' : '') active-class @endif ">Admin Earning</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            
            
            
            </ul>
        </div>
    </div>

    <!-- end:: Aside Menu -->