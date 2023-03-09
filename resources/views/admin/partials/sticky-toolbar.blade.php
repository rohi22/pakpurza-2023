@push('styles')
<style>
    .m-t-30px{
        margin-top: 30px;
    }
    .h-50px{
        height: 50px; 
    }
    
</style>
@endpush
<!-- begin::Sticky Toolbar -->
<ul class="kt-sticky-toolbar m-t-30px">
    <li class="kt-sticky-toolbar__item kt-sticky-toolbar__item--success" id="kt_demo_panel_toggle" data-toggle="kt-tooltip" title="Check out more demos" data-placement="right">
        <a href="#" class=""><i class="flaticon2-drop"></i></a>
    </li>
    <li class="kt-sticky-toolbar__item kt-sticky-toolbar__item--type" data-toggle="kt-tooltip" title="Layout Builder" data-placement="left">
        <a href="https://keenthemes.com/metronic/preview/demo6/builder.html" target="_blank"><i class="flaticon2-gear"></i></a>
    </li>
    <li class="kt-sticky-toolbar__item kt-sticky-toolbar__item--warning" data-toggle="kt-tooltip" title="Documentation" data-placement="left">
        <a href="https://keenthemes.com/metronic/?page=docs" target="_blank"><i class="flaticon2-telegram-logo"></i></a>
    </li>
    <li class="kt-sticky-toolbar__item kt-sticky-toolbar__item--danger" id="kt_sticky_toolbar_chat_toggler" data-toggle="kt-tooltip" title="Chat Example" data-placement="left">
        <a href="#" data-toggle="modal" data-target="#kt_chat_modal"><i class="flaticon2-chat-1"></i></a>
    </li>
</ul>

<!-- end::Sticky Toolbar -->

<!-- begin::Demo Panel -->
<div id="kt_demo_panel" class="kt-demo-panel">
    <div class="kt-demo-panel__head">
        <h3 class="kt-demo-panel__title">
            Select A Demo

            <!--<small>5</small>-->
        </h3>
        <a href="#" class="kt-demo-panel__close" id="kt_demo_panel_close"><i class="flaticon2-delete"></i></a>
    </div>
    <div class="kt-demo-panel__body">
        <div class="kt-demo-panel__item ">
            <div class="kt-demo-panel__item-title">
                Demo 1
            </div>
            <div class="kt-demo-panel__item-preview">
                <img src="{{URL::asset('public/assets/media//demos/preview/demo1.jpg')}}" alt="" />
                <div class="kt-demo-panel__item-preview-overlay">
                    <a href="https://keenthemes.com/metronic/preview/demo1/index.html" class="btn btn-type btn-elevate " target="_blank">Default</a>
                    <a href="https://keenthemes.com/metronic/preview/demo1/rtl/index.html" class="btn btn-light btn-elevate" target="_blank">RTL Version</a>
                </div>
            </div>
        </div>
        <div class="kt-demo-panel__item ">
            <div class="kt-demo-panel__item-title">
                Demo 2
            </div>
            <div class="kt-demo-panel__item-preview">
                <img src="{{URL::asset('public/assets/media//demos/preview/demo2.jpg')}}" alt="" />
                <div class="kt-demo-panel__item-preview-overlay">
                    <a href="https://keenthemes.com/metronic/preview/demo2/index.html" class="btn btn-type btn-elevate " target="_blank">Default</a>
                    <a href="https://keenthemes.com/metronic/preview/demo2/rtl/index.html" class="btn btn-light btn-elevate" target="_blank">RTL Version</a>
                </div>
            </div>
        </div>
        <div class="kt-demo-panel__item ">
            <div class="kt-demo-panel__item-title">
                Demo 3
            </div>
            <div class="kt-demo-panel__item-preview">
                <img src="{{URL::asset('public/assets/media//demos/preview/demo3.jpg')}}" alt="" />
                <div class="kt-demo-panel__item-preview-overlay">
                    <a href="https://keenthemes.com/metronic/preview/demo3/index.html" class="btn btn-type btn-elevate " target="_blank">Default</a>
                    <a href="https://keenthemes.com/metronic/preview/demo3/rtl/index.html" class="btn btn-light btn-elevate" target="_blank">RTL Version</a>
                </div>
            </div>
        </div>
        <div class="kt-demo-panel__item ">
            <div class="kt-demo-panel__item-title">
                Demo 4
            </div>
            <div class="kt-demo-panel__item-preview">
                <img src="{{URL::asset('public/assets/media//demos/preview/demo4.jpg')}}" alt="" />
                <div class="kt-demo-panel__item-preview-overlay">
                    <a href="https://keenthemes.com/metronic/preview/demo4/index.html" class="btn btn-type btn-elevate " target="_blank">Default</a>
                    <a href="https://keenthemes.com/metronic/preview/demo4/rtl/index.html" class="btn btn-light btn-elevate" target="_blank">RTL Version</a>
                </div>
            </div>
        </div>
        <div class="kt-demo-panel__item ">
            <div class="kt-demo-panel__item-title">
                Demo 5
            </div>
            <div class="kt-demo-panel__item-preview">
                <img src="{{URL::asset('public/assets/media//demos/preview/demo5.jpg')}}" alt="" />
                <div class="kt-demo-panel__item-preview-overlay">
                    <a href="https://keenthemes.com/metronic/preview/demo5/index.html" class="btn btn-type btn-elevate " target="_blank">Default</a>
                    <a href="https://keenthemes.com/metronic/preview/demo5/rtl/index.html" class="btn btn-light btn-elevate" target="_blank">RTL Version</a>
                </div>
            </div>
        </div>
        <div class="kt-demo-panel__item kt-demo-panel__item--active">
            <div class="kt-demo-panel__item-title">
                Demo 6
            </div>
            <div class="kt-demo-panel__item-preview">
                <img src="{{URL::asset('public/assets/media//demos/preview/demo6.jpg')}}" alt="" />
                <div class="kt-demo-panel__item-preview-overlay">
                    <a href="https://keenthemes.com/metronic/preview/demo6/index.html" class="btn btn-type btn-elevate " target="_blank">Default</a>
                    <a href="https://keenthemes.com/metronic/preview/demo6/rtl/index.html" class="btn btn-light btn-elevate" target="_blank">RTL Version</a>
                </div>
            </div>
        </div>
        <div class="kt-demo-panel__item ">
            <div class="kt-demo-panel__item-title">
                Demo 7
            </div>
            <div class="kt-demo-panel__item-preview">
                <img src="{{URL::asset('public/assets/media//demos/preview/demo7.jpg')}}" alt="" />
                <div class="kt-demo-panel__item-preview-overlay">
                    <a href="https://keenthemes.com/metronic/preview/demo7/index.html" class="btn btn-type btn-elevate " target="_blank">Default</a>
                    <a href="https://keenthemes.com/metronic/preview/demo7/rtl/index.html" class="btn btn-light btn-elevate" target="_blank">RTL Version</a>
                </div>
            </div>
        </div>
        <div class="kt-demo-panel__item ">
            <div class="kt-demo-panel__item-title">
                Demo 8
            </div>
            <div class="kt-demo-panel__item-preview">
                <img src="{{URL::asset('public/assets/media//demos/preview/demo8.jpg')}}" alt="" />
                <div class="kt-demo-panel__item-preview-overlay">
                    <a href="https://keenthemes.com/metronic/preview/demo8/index.html" class="btn btn-type btn-elevate " target="_blank">Default</a>
                    <a href="https://keenthemes.com/metronic/preview/demo8/rtl/index.html" class="btn btn-light btn-elevate" target="_blank">RTL Version</a>
                </div>
            </div>
        </div>
        <div class="kt-demo-panel__item ">
            <div class="kt-demo-panel__item-title">
                Demo 9
            </div>
            <div class="kt-demo-panel__item-preview">
                <img src="{{URL::asset('public/assets/media//demos/preview/demo9.jpg')}}" alt="" />
                <div class="kt-demo-panel__item-preview-overlay">
                    <a href="https://keenthemes.com/metronic/preview/demo9/index.html" class="btn btn-type btn-elevate " target="_blank">Default</a>
                    <a href="https://keenthemes.com/metronic/preview/demo9/rtl/index.html" class="btn btn-light btn-elevate" target="_blank">RTL Version</a>
                </div>
            </div>
        </div>
        <div class="kt-demo-panel__item ">
            <div class="kt-demo-panel__item-title">
                Demo 10
            </div>
            <div class="kt-demo-panel__item-preview">
                <img src="{{URL::asset('public/assets/media//demos/preview/demo10.jpg')}}" alt="" />
                <div class="kt-demo-panel__item-preview-overlay">
                    <a href="https://keenthemes.com/metronic/preview/demo10/index.html" class="btn btn-type btn-elevate " target="_blank">Default</a>
                    <a href="https://keenthemes.com/metronic/preview/demo10/rtl/index.html" class="btn btn-light btn-elevate" target="_blank">RTL Version</a>
                </div>
            </div>
        </div>
        <div class="kt-demo-panel__item ">
            <div class="kt-demo-panel__item-title">
                Demo 11
            </div>
            <div class="kt-demo-panel__item-preview">
                <img src="{{URL::asset('public/assets/media//demos/preview/demo11.jpg')}}" alt="" />
                <div class="kt-demo-panel__item-preview-overlay">
                    <a href="https://keenthemes.com/metronic/preview/demo11/index.html" class="btn btn-type btn-elevate " target="_blank">Default</a>
                    <a href="https://keenthemes.com/metronic/preview/demo11/rtl/index.html" class="btn btn-light btn-elevate" target="_blank">RTL Version</a>
                </div>
            </div>
        </div>
        <div class="kt-demo-panel__item ">
            <div class="kt-demo-panel__item-title">
                Demo 12
            </div>
            <div class="kt-demo-panel__item-preview">
                <img src="{{URL::asset('public/assets/media//demos/preview/demo12.jpg')}}" alt="" />
                <div class="kt-demo-panel__item-preview-overlay">
                    <a href="https://keenthemes.com/metronic/preview/demo12/index.html" class="btn btn-type btn-elevate " target="_blank">Default</a>
                    <a href="https://keenthemes.com/metronic/preview/demo12/rtl/index.html" class="btn btn-light btn-elevate" target="_blank">RTL Version</a>
                </div>
            </div>
        </div>
        <div class="kt-demo-panel__item ">
            <div class="kt-demo-panel__item-title">
                Demo 13
            </div>
            <div class="kt-demo-panel__item-preview">
                <img src="{{URL::asset('public/assets/media//demos/preview/demo13.jpg')}}" alt="" />
                <div class="kt-demo-panel__item-preview-overlay">
                    <a href="#" class="btn btn-type btn-elevate disabled">Coming soon</a>
                </div>
            </div>
        </div>
        <div class="kt-demo-panel__item ">
            <div class="kt-demo-panel__item-title">
                Demo 14
            </div>
            <div class="kt-demo-panel__item-preview">
                <img src="{{URL::asset('public/assets/media//demos/preview/demo14.jpg')}}" alt="" />
                <div class="kt-demo-panel__item-preview-overlay">
                    <a href="#" class="btn btn-type btn-elevate disabled">Coming soon</a>
                </div>
            </div>
        </div>
        <div class="kt-demo-panel__item ">
            <div class="kt-demo-panel__item-title">
                Demo 15
            </div>
            <div class="kt-demo-panel__item-preview">
                <img src="{{URL::asset('public/assets/media//demos/preview/demo15.jpg')}}" alt="" />
                <div class="kt-demo-panel__item-preview-overlay">
                    <a href="#" class="btn btn-type btn-elevate disabled">Coming soon</a>
                </div>
            </div>
        </div>
        <div class="kt-demo-panel__item ">
            <div class="kt-demo-panel__item-title">
                Demo 16
            </div>
            <div class="kt-demo-panel__item-preview">
                <img src="{{URL::asset('public/assets/media//demos/preview/demo16.jpg')}}" alt="" />
                <div class="kt-demo-panel__item-preview-overlay">
                    <a href="#" class="btn btn-type btn-elevate disabled">Coming soon</a>
                </div>
            </div>
        </div>
        <div class="kt-demo-panel__item ">
            <div class="kt-demo-panel__item-title">
                Demo 17
            </div>
            <div class="kt-demo-panel__item-preview">
                <img src="{{URL::asset('public/assets/media//demos/preview/demo17.jpg')}}" alt="" />
                <div class="kt-demo-panel__item-preview-overlay">
                    <a href="#" class="btn btn-type btn-elevate disabled">Coming soon</a>
                </div>
            </div>
        </div>
        <div class="kt-demo-panel__item ">
            <div class="kt-demo-panel__item-title">
                Demo 18
            </div>
            <div class="kt-demo-panel__item-preview">
                <img src="{{URL::asset('public/assets/media//demos/preview/demo18.jpg')}}" alt="" />
                <div class="kt-demo-panel__item-preview-overlay">
                    <a href="#" class="btn btn-type btn-elevate disabled">Coming soon</a>
                </div>
            </div>
        </div>
        <div class="kt-demo-panel__item ">
            <div class="kt-demo-panel__item-title">
                Demo 19
            </div>
            <div class="kt-demo-panel__item-preview">
                <img src="{{URL::asset('public/assets/media//demos/preview/demo19.jpg')}}" alt="" />
                <div class="kt-demo-panel__item-preview-overlay">
                    <a href="#" class="btn btn-type btn-elevate disabled">Coming soon</a>
                </div>
            </div>
        </div>
        <div class="kt-demo-panel__item ">
            <div class="kt-demo-panel__item-title">
                Demo 20
            </div>
            <div class="kt-demo-panel__item-preview">
                <img src="{{URL::asset('public/assets/media//demos/preview/demo20.jpg')}}" alt="" />
                <div class="kt-demo-panel__item-preview-overlay">
                    <a href="#" class="btn btn-type btn-elevate disabled">Coming soon</a>
                </div>
            </div>
        </div>
        <div class="kt-demo-panel__item ">
            <div class="kt-demo-panel__item-title">
                Demo 21
            </div>
            <div class="kt-demo-panel__item-preview">
                <img src="{{URL::asset('public/assets/media//demos/preview/demo21.jpg')}}" alt="" />
                <div class="kt-demo-panel__item-preview-overlay">
                    <a href="#" class="btn btn-type btn-elevate disabled">Coming soon</a>
                </div>
            </div>
        </div>
        <div class="kt-demo-panel__item ">
            <div class="kt-demo-panel__item-title">
                Demo 22
            </div>
            <div class="kt-demo-panel__item-preview">
                <img src="{{URL::asset('public/assets/media//demos/preview/demo22.jpg')}}" alt="" />
                <div class="kt-demo-panel__item-preview-overlay">
                    <a href="#" class="btn btn-type btn-elevate disabled">Coming soon</a>
                </div>
            </div>
        </div>
        <a href="https://1.envato.market/EA4JP" target="_blank" class="kt-demo-panel__purchase btn btn-type btn-elevate btn-bold btn-upper">
            Buy Metronic Now!
        </a>
    </div>
</div>

<!-- end::Demo Panel -->

<!--Begin:: Chat-->
<div class="modal fade- modal-sticky-bottom-right" id="kt_chat_modal" role="dialog" data-backdrop="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="kt-chat">
                <div class="kt-portlet kt-portlet--last">
                    <div class="kt-portlet__head">
                        <div class="kt-chat__head ">
                            <div class="kt-chat__left">
                                <div class="kt-chat__label">
                                    <a href="#" class="kt-chat__title">Jason Muller</a>
                                    <span class="kt-chat__status">
                                        <span class="kt-badge kt-badge--dot kt-badge--success"></span> Active
                                    </span>
                                </div>
                            </div>
                            <div class="kt-chat__right">
                                <div class="dropdown dropdown-inline">
                                    <button type="button" class="btn btn-clean btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="flaticon-more-1"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-md">

                                        <!--begin::Nav-->
                                        <ul class="kt-nav">
                                            <li class="kt-nav__head">
                                                Messaging
                                                <i class="flaticon2-information" data-toggle="kt-tooltip" data-placement="right" title="Click to learn more..."></i>
                                            </li>
                                            <li class="kt-nav__separator"></li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-group"></i>
                                                    <span class="kt-nav__link-text">New Group</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-open-text-book"></i>
                                                    <span class="kt-nav__link-text">Contacts</span>
                                                    <span class="kt-nav__link-badge">
                                                        <span class="kt-badge kt-badge--type  kt-badge--rounded-">5</span>
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-bell-2"></i>
                                                    <span class="kt-nav__link-text">Calls</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-dashboard"></i>
                                                    <span class="kt-nav__link-text">Settings</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__item">
                                                <a href="#" class="kt-nav__link">
                                                    <i class="kt-nav__link-icon flaticon2-protected"></i>
                                                    <span class="kt-nav__link-text">Help</span>
                                                </a>
                                            </li>
                                            <li class="kt-nav__separator"></li>
                                            <li class="kt-nav__foot">
                                                <a class="btn btn-label-type btn-bold btn-sm" href="#">Upgrade plan</a>
                                                <a class="btn btn-clean btn-bold btn-sm" href="#" data-toggle="kt-tooltip" data-placement="right" title="Click to learn more...">Learn more</a>
                                            </li>
                                        </ul>

                                        <!--end::Nav-->
                                    </div>
                                </div>
                                <button type="button" class="btn btn-clean btn-sm btn-icon" data-dismiss="modal">
                                    <i class="flaticon2-cross"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div class="kt-scroll kt-scroll--pull" data-height="410" data-mobile-height="225">
                            <div class="kt-chat__messages kt-chat__messages--solid">
                                <div class="kt-chat__message kt-chat__message--success">
                                    <div class="kt-chat__user">
                                        <span class="kt-media kt-media--circle kt-media--sm">
                                            <img src="{{URL::asset('public/assets/media/users/100_12.jpg')}}" alt="image">
                                        </span>
                                        <a href="#" class="kt-chat__username">Jason Muller</span></a>
                                        <span class="kt-chat__datetime">2 Hours</span>
                                    </div>
                                    <div class="kt-chat__text">
                                        How likely are you to recommend our company<br> to your friends and family?
                                    </div>
                                </div>
                                <div class="kt-chat__message kt-chat__message--right kt-chat__message--type">
                                    <div class="kt-chat__user">
                                        <span class="kt-chat__datetime">30 Seconds</span>
                                        <a href="#" class="kt-chat__username">You</span></a>
                                        <span class="kt-media kt-media--circle kt-media--sm">
                                            <img src="{{URL::asset('public/assets/media/users/300_21.jpg')}}" alt="image">
                                        </span>
                                    </div>
                                    <div class="kt-chat__text">
                                        Hey there, we’re just writing to let you know that you’ve<br> been subscribed to a repository on GitHub.
                                    </div>
                                </div>
                                <div class="kt-chat__message kt-chat__message--success">
                                    <div class="kt-chat__user">
                                        <span class="kt-media kt-media--circle kt-media--sm">
                                            <img src="{{URL::asset('public/assets/media/users/100_12.jpg')}}" alt="image">
                                        </span>
                                        <a href="#" class="kt-chat__username">Jason Muller</span></a>
                                        <span class="kt-chat__datetime">30 Seconds</span>
                                    </div>
                                    <div class="kt-chat__text">
                                        Ok, Understood!
                                    </div>
                                </div>
                                <div class="kt-chat__message kt-chat__message--right kt-chat__message--type">
                                    <div class="kt-chat__user">
                                        <span class="kt-chat__datetime">Just Now</span>
                                        <a href="#" class="kt-chat__username">You</span></a>
                                        <span class="kt-media kt-media--circle kt-media--sm">
                                            <img src="{{URL::asset('public/assets/media/users/300_21.jpg')}}" alt="image">
                                        </span>
                                    </div>
                                    <div class="kt-chat__text">
                                        You’ll receive notifications for all issues, pull requests!
                                    </div>
                                </div>
                                <div class="kt-chat__message kt-chat__message--success">
                                    <div class="kt-chat__user">
                                        <span class="kt-media kt-media--circle kt-media--sm">
                                            <img src="{{URL::asset('public/assets/media/users/100_12.jpg')}}" alt="image">
                                        </span>
                                        <a href="#" class="kt-chat__username">Jason Muller</span></a>
                                        <span class="kt-chat__datetime">2 Hours</span>
                                    </div>
                                    <div class="kt-chat__text">
                                        You were automatically <b class="kt-font-type">subscribed</b> <br>because you’ve been given access to the repository
                                    </div>
                                </div>
                                <div class="kt-chat__message kt-chat__message--right kt-chat__message--type">
                                    <div class="kt-chat__user">
                                        <span class="kt-chat__datetime">30 Seconds</span>
                                        <a href="#" class="kt-chat__username">You</span></a>
                                        <span class="kt-media kt-media--circle kt-media--sm">
                                            <img src="{{URL::asset('public/assets/media/users/300_21.jpg')}}" alt="image">
                                        </span>
                                    </div>
                                    <div class="kt-chat__text">
                                        You can unwatch this repository immediately <br>by clicking here: <a href="#" class="kt-font-bold kt-link"></a>
                                    </div>
                                </div>
                                <div class="kt-chat__message kt-chat__message--success">
                                    <div class="kt-chat__user">
                                        <span class="kt-media kt-media--circle kt-media--sm">
                                            <img src="{{URL::asset('public/assets/media/users/100_12.jpg')}}" alt="image">
                                        </span>
                                        <a href="#" class="kt-chat__username">Jason Muller</span></a>
                                        <span class="kt-chat__datetime">30 Seconds</span>
                                    </div>
                                    <div class="kt-chat__text">
                                        Discover what students who viewed Learn <br>Figma - UI/UX Design Essential Training also viewed
                                    </div>
                                </div>
                                <div class="kt-chat__message kt-chat__message--right kt-chat__message--type">
                                    <div class="kt-chat__user">
                                        <span class="kt-chat__datetime">Just Now</span>
                                        <a href="#" class="kt-chat__username">You</span></a>
                                        <span class="kt-media kt-media--circle kt-media--sm">
                                            <img src="{{URL::asset('public/assets/media/users/300_21.jpg')}}" alt="image">
                                        </span>
                                    </div>
                                    <div class="kt-chat__text">
                                        Most purchased Business courses during this sale!
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__foot">
                        <div class="kt-chat__input">
                            <div class="kt-chat__editor">
                                <textarea placeholder="Type here..."  class="h-50px" ></textarea>
                            </div>
                            <div class="kt-chat__toolbar">
                                <div class="kt_chat__tools">
                                    <a href="#"><i class="flaticon2-link"></i></a>
                                    <a href="#"><i class="flaticon2-photograph"></i></a>
                                    <a href="#"><i class="flaticon2-photo-camera"></i></a>
                                </div>
                                <div class="kt_chat__actions">
                                    <button type="button" class="btn btn-type btn-md  btn-font-sm btn-upper btn-bold kt-chat__reply">reply</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--ENd:: Chat-->