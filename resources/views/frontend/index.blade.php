@extends('frontend.layouts.app')

@section('content')


    <div class="page-content bg-white">


        <!-- Slider -->
        <div class="slidearea ps-0">
            <div class="silder-two">
                    <div class="swiper-container main-silder-swiper-02">
                        <div class="swiper-wrapper">
                            @foreach($sliders as $slider)
                            <div class="swiper-slide" style="background-image:url(public/images/background/bg1.png); background-position:bottom left; background-repeat:no-repeat;">
                            
                                <div class="silder-content" data-swiper-parallax="-40%">
                                    <div class="side-image" data-swiper-parallax="100%">
                                        <img src="{{asset('public/storage/slider/' . $slider->left_image)}}" alt="" />
                                    </div>
                                    
                                    <div class="inner-content">
                                        <div class="inner-text">
                                            <h3 class="title-small" style="white-space: pre-wrap;">{{$slider->title}}</h3>
                                            <p>{{ strip_tags($slider->description)}}</p>
                                            @if($slider->read_more == 1)
                                                <a href="{{$slider->url}}" class="btn shadow-primary btn-primary btn-rounded">Read More</a>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="overlay-slide" data-swiper-parallax="100%">
                                        <img src="{{asset('public/storage/slider/' . $slider->right_image)}}" alt="{{$slider->title}}">
                                    </div>
                                </div>
                            </div>
                            @endforeach  
                        </div>
                     
                    
                        </div>
                        <div class="swiper-pagination swiper-pagination-white"></div>
                        <div class="slider-one-pagination">
                            <div class="btn-prev swiper-button-prev2 swiper-button-white"><i class="las la-angle-left"></i></div>
                            <div class="btn-next swiper-button-next2 swiper-button-white"><i class="las la-angle-right"></i></div>
                        </div>
               
            </div>
        </div>
        <section class="section-full content-inner about-bx2" style="background-image:url(public/images/background/bg2.png); background-position:right bottom; background-size:100%; background-repeat:no-repeat;">
            <div class="container">
                <div class="row">
                    {{-- {{$images}}    --}}
                                   
                    <div class="col-lg-6">
                        <div class="dz-media">
                            @if(isset($yearWorkExp))
                            <?php $i =0; ?>
                        @foreach($WorkExpImageGalleries as  $index=>$yearWork)
                         <?php $i++; ?>
                                <div class="img{{$i}} " data-aos="fade-up" data-aos-duration="800" data-aos-delay="200"><img src="{{asset('public/storage/YearWorkExperience/gallery/' .$yearWork['name'])}}" alt=""></div>
                         @endforeach 
                        @endif

                        
                    </div>
                </div>
                           
                <div class="col-lg-6 align-self-center">
                    <div class="year-exp">
                        <h2 class="year " data-aos="fade-up" data-aos-duration="800" data-aos-delay="400">{{isset($yearWorkExp['total_year']) ? $yearWorkExp['total_year'] : null}}</h2>
                        <h4 class="text " data-aos="fade-up" data-aos-duration="1000" data-aos-delay="600">{{isset($yearWorkExp['title']) ? $yearWorkExp['title'] : null}}</h4>
                    </div>
                    <p class="m-b30  mt-5" data-aos="fade-up" data-aos-duration="800" data-aos-delay="400">{{strip_tags(isset($yearWorkExp['description']) ? $yearWorkExp['description'] : null)}}</p>
                </div>
                    
                </div>
            </div>
        </section>
        <!-- Counter And  Video -->
        <section class="content-inner-2 bg-secondary pb-5" style="background-image: url(images/background/bg2-1.png); background-position: center;">
            <div class="container">
                <div class="row section-head-bx align-items-center">
                    <div class="col-md-8">
                        <div class="section-head style-1">
                            <h6 class="sub-title text-white">OUR PORTFOLIOS</h6>
                            <h2 class="title text-white">Our Ongoing Projects</h2>
                        </div>
                    </div>
                    <div class="col-md-4 text-start text-md-end mb-4 mb-md-0">
                        <a href="{{route('our-projects')}}" class="btn-link">See All Projects <i class="fas fa-plus scale08"></i></a>
                    </div>
                </div>
            </div>
          
            <div class="container-fluid mb-5">
                <div class="swiper-container swiper-portfolio lightgallery " data-aos="fade-in" data-aos-duration="1000" data-aos-delay="400">
                    <div class="swiper-wrapper">
                        @foreach($OnGoingProject as $OnGoingProjects)
                                     
                            <div class="swiper-slide">

                                <a href="{{url('/project'.'/'.$OnGoingProjects->slug)}}">
                                    <div class="dz-box overlay style-1 mt-5">
                                           
                                            <div class="dz-media">
                                                <img src="{{asset('public/storage/Project/slider/'.$OnGoingProjects->image)}}" alt="">
                                            </div>
                                            <div class="dz-info">
									<h6 class="sub-title"><strong style="color:#fff">{{$OnGoingProjects->title}}</strong></h6>
									<h4 class="title m-b15" style="color:#fff"><span></span></h4>
								</div>

                                        </div>
                                    </a>

                                </div>
                       
                        @endforeach
                               
                       
                    </div>
                </div>	
            </div>				
        </section>
        <section class="content-inner-1 portfolio-2 bg-secondary" style="background-image: url(public/images/background/bg2-1.png); background-position: center;">
            <div class="setResizeMargin">
                <div class="row spno">
                    <div class="col-xl-3 col-lg-4 align-self-center px-3 mb-lg-0 mb-4">
                        <div class="section-head style-1 text-white">
                            <h6 class="sub-title text-primary">OUR PROJECTS</h6>
                            <h2 class="title  text-white">Our Completed Projects</h2>
                            <p class="m-b30">Phasellus facilisis urna at ultrices egestas. Nulla mi arcu, finibus non lectus non, mollis tempus enim.</p>
                        </div>
                        <a href="{{route('our-projects')}}" class="btn btn-primary btn-rounded">View All Projects</a>
                    </div>
                    <div class="col-xl-9 col-lg-8">
                     <div class="swiper-container swiper-portfolio-2 lightgallery">
                            <div class="swiper-wrapper">
                                @foreach($CompletedProject as $OnGoingProjects)
                                 <div class="swiper-slide">
                                    <a href="{{url('/project'.'/'.$OnGoingProjects->slug)}}">
                                    <div class="dz-box overlay style-1 mt-5">
                                        <div class="dz-media">
                                            <img src="{{asset('public/storage/Project/slider/'.$OnGoingProjects->image)}}" alt="">
                                        </div>
                                        
                                        <div class="dz-info">
											<h6 class="sub-title"><strong style="color:#fff">{{$OnGoingProjects->title}}</strong></h6>
											<h4 class="title m-b15"><a href="project-details.html"{{$OnGoingProjects->title}}<span></span></a></h4>
										
										</div>
                                        
                                    </div>
                                    </a>
                                </div>
                                @endforeach
                           </div>
                            <div>
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                        <!--<div class="swiper-container swiper-portfolio-2 lightgallery">-->
                        <!--    <div class="swiper-wrapper">-->
                        <!--    @foreach($CompletedProject as $OnGoingProjects)-->
                        <!--         <div class="swiper-slide">-->
                        <!--            <a href="{{route('project.detail',$OnGoingProjects->id)}}">-->
                        <!--            <div class="dz-box overlay style-1 mt-5">-->
                        <!--                <div class="dz-media">-->
                        <!--                    <img src="{{asset('public/storage/Project/slider/'.$OnGoingProjects->image)}}" alt="">-->
                        <!--                </div>-->
                        <!--                <div class="dz-info">-->
                        <!--                     <h6 class="sub-title">{{$OnGoingProjects->title}}</h6>-->
                        <!--                    <h4 class="title m-b15"><span style="color: #fff">{{$OnGoingProjects->title}}</span></h4>-->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--            </a>-->
                        <!--        </div>-->
                        <!--     @endforeach-->
                       
                               
                        <!--    </div>-->
                        <!--    <div>-->
                        <!--        <div class="swiper-pagination"></div>-->
                        <!--    </div>-->
                            
                        <!--</div>	-->
                    </div>
                </div>
            </div>
        </section>
        <section class="content-inner-2"  style="background-image:url(images/background/bg1.png); background-position:left top; background-size:100%; background-repeat:no-repeat;">
			<div class="container">
				<div class="section-head style-1 text-center">
					<h6 class="sub-title text-primary">OUR SERVICES</h6>
					<h2 class="title">Our Featured Services</h2>
				</div>
				<div class="row">
					<div class="col-lg-4 col-sm-6 aos-item" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
						<div class="icon-bx-wraper style-3  m-b30">
							<div class="icon-xl m-b30"> 
								<a href="javascript:void(0);" class="icon-cell"><i class="flaticon-construction-site"></i></a> 
							</div>
							<div class="icon-content">
							<h4 class="title m-b10"><a href="services-details.html">Road Construction</a></h4>
								<p class="m-b30">Phasellus facilisis urna at ultrices egestas. Nulla mi arcu, finibus non lectus non, mollis tempus enim.</p>
								<a href="services-details.html" class="btn btn-primary btn-rounded btn-sm hover-icon">
									<span>Read More</span>
									<i class="fas fa-arrow-right"></i>
								</a>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-sm-6 aos-item" data-aos="fade-up" data-aos-duration="800" data-aos-delay="400">
						<div class="icon-bx-wraper style-3  m-b30">
							<div class="icon-xl m-b30"> 
								<a href="javascript:void(0);" class="icon-cell"><i class="flaticon-crane"></i></a> 
							</div>
							<div class="icon-content">
							<h4 class="title m-b10"><a href="services-details.html">Building Construction</a></h4>
								<p class="m-b30">Phasellus facilisis urna at ultrices egestas. Nulla mi arcu, finibus non lectus non, mollis tempus enim.</p>
								<a href="services-details.html" class="btn btn-primary btn-rounded btn-sm hover-icon">
									<span>Read More</span>
									<i class="fas fa-arrow-right"></i>
								</a>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-sm-6 aos-item" data-aos="fade-up" data-aos-duration="800" data-aos-delay="600">
						<div class="icon-bx-wraper style-3  m-b30">
							<div class="icon-xl m-b30"> 
								<a href="javascript:void(0);" class="icon-cell"><i class="flaticon-bridge"></i></a> 
							</div>
							<div class="icon-content">
							<h4 class="title m-b10"><a href="services-details.html">Bridge Construction</a></h4>
								<p class="m-b30">Phasellus facilisis urna at ultrices egestas. Nulla mi arcu, finibus non lectus non, mollis tempus enim.</p>
								<a href="services-details.html" class="btn btn-primary btn-rounded btn-sm hover-icon">
									<span>Read More</span>
									<i class="fas fa-arrow-right"></i>
								</a>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-sm-6 aos-item" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
						<div class="icon-bx-wraper style-3  m-b30">
							<div class="icon-xl m-b30"> 
								<a href="javascript:void(0);" class="icon-cell"><i class="flaticon-dam"></i></a> 
							</div>
							<div class="icon-content">
							<h4 class="title m-b10"><a href="services-details.html">Small Dams</a></h4>
								<p class="m-b30">Phasellus facilisis urna at ultrices egestas. Nulla mi arcu, finibus non lectus non, mollis tempus enim.</p>
								<a href="services-details.html" class="btn btn-primary btn-rounded btn-sm hover-icon">
									<span>Read More</span>
									<i class="fas fa-arrow-right"></i>
								</a>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-sm-6 aos-item" data-aos="fade-up" data-aos-duration="800" data-aos-delay="400">
						<div class="icon-bx-wraper style-3  m-b30">
							<div class="icon-xl m-b30"> 
								<a href="javascript:void(0);" class="icon-cell"><i class="flaticon-chiller"></i></a> 
							</div>
							<div class="icon-content">
							<h4 class="title m-b10"><a href="services-details.html">Air Conditioning Plants</a></h4>
								<p class="m-b30">Phasellus facilisis urna at ultrices egestas. Nulla mi arcu, finibus non lectus non, mollis tempus enim.</p>
								<a href="services-details.html" class="btn btn-primary btn-rounded btn-sm hover-icon">
									<span>Read More</span>
									<i class="fas fa-arrow-right"></i>
								</a>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</section>	
       
        {{-- <section class="content-inner-2"  style="background-image:url(public/images/background/bg1.png); background-position:left top; background-size:100%; background-repeat:no-repeat;">
            <div class="container overflow-hidden">
                <div class="section-head style-1 text-center">
                    <h6 class="sub-title text-primary">OUR SERVICES</h6>
                    <h2 class="title">Our Featured Services</h2>
                </div>
                <div class="row position-relative">
                    @foreach($services as $our_service)
                        <div class="col-lg-4 col-sm-6 " data-aos="fade-up">
                            <div class="icon-bx-wraper style-3  m-b30">
                                <div class="icon-xl m-b30"> 
                                    <a href="javascript:void(0);" class="icon-cell"><i class="{{$our_service->icon}}"></i></a> 
                                </div>
                                <div class="icon-content">
                                <h4 class="title m-b10"><a href="services-details.html">{{$our_service->title}}</a></h4>
                                    <p class="m-b30">{{strip_tags($our_service->description)}}</p>
                                    <a href="{{url('/service'.'/'.$our_service->slug)}}" class="btn btn-primary btn-rounded btn-sm hover-icon">
                                        <span>Read More</span>
                                        <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                       @endforeach 
                    
                </div>
            </div>
        </section>						 --}}
        <!-- Testimonials -->
        {{-- <section class="bg-secondary test-area" style="background-image: url(public/images/background/bg2-1.png); background-position: center;">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 " data-aos="fade-right" >
                        <div class="content-inner-1">
                            <div class="section-head style-1">
                                <h6 class="text-primary sub-title">TESTIMONIAL</h6>
                                <h2 class="title text-white">What Our Client Say’s</h2>
                            </div>
                         
                            <div class="testi-inner">
                                <div class="swiper-container testimonial-swiper-2">
                                       @foreach($client as $clients)
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="testimonial-2">
                                                <div class="testimonial-text">
                                                    <p>{{strip_tags($clients->description)}}</p>
                                                </div>
                                                <div class="testimonial-detail">
                                                    <div class="testimonial-pic">
                                                        <img src="{{asset('public/storage/client/'.$clients->image)}}" alt="">
                                                    </div>
                                                    <div class="clearfix">
                                                        <h4 class="testimonial-name">{{$clients->title}}</h4> 
                                                        <span class="testimonial-position">Pakistan</span> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                         @endforeach
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="media-full">
                            <img src="public/images/about/pic5.jpg" alt=""/>
                        </div>
                    </div>
                </div>
            </div>	
        </section> --}}
        <!-- Our Team -->
        <section class="content-inner" style="background-image:url(images/background/bg2.png); background-position:right bottom; background-size:100%; background-repeat:no-repeat;">
            <div class="container">
                <div class="section-head style-1 text-center">
                    <h6 class="sub-title text-primary">Our Team</h6>
                    <h2 class="title">Creative Expertise</h2>
                </div>

                
                <div class="row">
                    <div class="col-lg-12 m-b30">
                        <div class="swiper-container team-swiper-2">
                            <div class="swiper-wrapper">
                                @foreach($team as $teams)
                                <div class="swiper-slide">
                                    <div class="dz-team style-3 text-center m-b30 overlay-shine ">
                                        <div class="dz-media">
                                            <a href="{{route('our.team')}}"><img src="{{asset('public/storage/team/'.$teams->image)}}" alt="" style="width:200px;height: 200px;"></a>
                                            <ul class="team-social">
                                                <li><a href="{{$teams->fb_url}}"><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="{{$teams->ins_url}}"><i class="fab fa-instagram"></i></a></li>
                                                <li><a href="{{$teams->twt_url}}"><i class="fab fa-twitter"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="dz-content m-t20">
                                            <h6 class="dz-position line text-primary">{{$teams->position}}</h6>
                                            <h5 class="dz-name"><a href="javascript:void(0);">{{$teams->title}}</a></h5>
                                        </div>
                                    </div>
                                </div>
                                
                                @endforeach
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Footer End -->
    <button class="scroltop icon-up" type="button"><i class="fa fa-arrow-up"></i></button>
</div>
@endsection

