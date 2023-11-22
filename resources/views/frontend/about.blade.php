@extends('frontend.app')
@section('content')   
    <!--Start Main Image 01-->
    <div class="container-fluid bout_image ">
        <div class="row  about_image">
            <div class="col-sm-12 col-md-12 col-lg-12 p-0 m-0 about_us">
                <h4 class="ps-5 my-2  fw-bold text dark">{{__('About Us')}}</h4>
                <img src="{{asset('uploads/about_setting/about_image/'.$about->about_image)}}" class="img-fluid w-100 " alt="">
            </div>
            <div class="col-12"></div>
        </div>
    </div>
    <div class="container ">
        <div class="row ">
            <div class=" col-sm-12  col-lg-12 responsive_view w-25">
                <div class="post px-0">
                    <h4>{{__('Post')}}</h4>
                    <h1>26</h1>
                </div>
                <div class="  view px-2 mx-1">
                    <h4>{{__('View')}}</h4>
                    <h1>26</h1>
                </div>
                <div class="share">
                    <h4>{{__('Share')}}</h4>
                    <h1>26</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- End Main Image -->

    <!-- Start Text Content -->

    <div class="container">
        <div class="row main_content">
            <div class="col-sm-12 col-lg-6 ">
                <h3>{!!$about->{'about_title_'.session()->get('locale')} !!} </h3>
            </div>
            <div class="col-sm-12 col-lg-6 text-muted">
                <p>{!!$about->{'about_description_'.session()->get('locale')} !!}</p>
            </div>
        </div>
    </div>
    <!-- End Text Content -->

    <!-- Start Collage Image -->
    {{-- 
    <div class="container-fluid mb-5">
        <div class="row  ">
            <div class="col-sm-6 col-md-6  image-collage-1  ">
                <img src="{{asset('uploads/about_page/collage_image/images/'. $collageText->image)}}" class="img-fluid w-100  " alt="">
                <div class=" image-content-1 text-white">
                    <a href="{{route('poem_cat')}}" class="border border-white text-white ">{{ $collageText->category}}</a>
                    <h3 class="my-1">{{ $collageText->title}}</h3>
                    <span>{{$collageText->user?->name}}</span> | <span>{{$collageText->created_at->diffForHumans()}}</span>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 ">
                <div class="pb-1 image-collage-2 ">
                    <img src="{{asset('uploads/about_page/collage2nd_image/images/'.$collageSecond->image)}}" class=" img-fluid w-100   image-collage-2_1 " alt="">
                    <div class="image-content-2 text-black">
                        <a href="{{route('poem_cat')}}" class="border border-dark">{{ $collageSecond->category}}</a>
                        <h5 class="my-0">{{ $collageSecond->title}}</h5>
                        <span> {{ $collageSecond->user?->name}} </span> | <span> {{$collageSecond->created_at->diffForHumans()}}</span>
                    </div>
                </div>
                <div class="row me-0  image_3-4">
                    <div class="col-sm-12 col-md-6 col-lg-6 pe-0 image-collage-3">
                        <img src="{{asset('uploads/about_page/collage3rd_image/images/'.$collageThird->image)}}" class="img-fluid w-100 " alt="">
                        <div class="image-content-3  text-white">
                            <a href="{{route('poem_cat')}}" class="border border-white">{{ $collageThird->category}}</a>
                            <h6>{{ $collageThird->title}}</h6>
                            <span> {{ $collageThird->user?->name}}  </span>|<span> {{$collageThird->created_at->diffForHumans()}}</span>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 pe-0 image-collage-4 ">
                        <img src="{{asset('uploads/about_page/collage4_image/images/'.$collageFour->image)}}" class="img-fluid w-100 " alt="">
                        <div class="image-content-4  text-black">
                            <a href="{{route('poem_cat')}}" class="border border-dark">{{ $collageFour->category}}</a>
                            <h6>{{ $collageFour->title}}</h6>
                            <span> {{ $collageFour->user?->name}}  </span>|<span> {{$collageFour->created_at->diffForHumans()}} </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>--}}
    <!-- End Collage Image -->

    <!-- Start Text & Collage Image -->
    <div class="container-fluid  mb-5">
        <div class="row mx-1 mission">
            <div class="col-sm-4 col-md-1 col-lg-1 box "></div>
            <div class="col-sm-7 col-md-10 col-lg-10 mt-2">
                <h3>{!!$about->{'mission_title_'.session()->get('locale')} !!}</h3>
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-6  mission_content m-0 px-3">
                        <p class="text-muted mb-4">{!!$about->{'mission_description_'.session()->get('locale')} !!}</p>

                        
                    </div>

                    <div class="col-sm-6 col-md-3 col-lg-3 mt-3 ">
                        <img src="{{asset('uploads/about_setting/mission_image/'.$about->mission_image_1)}}" class="img-fluid w-100 mt-1" alt="">
                    </div>
                    <div class="col-sm-6 col-md-3 col-lg-3 mt-3  ">
                        <img src="{{asset('uploads/about_setting/mission_image/'.$about->mission_image_2)}}" class="img-fluid w-100 m-1 mb-3" alt="">
                        <img src="{{asset('uploads/about_setting/mission_image/'.$about->mission_image_3)}}" class="img-fluid w-100 m-1" alt="">
                    </div>
                </div>
            </div>
            <div class=" col-sm-1 col-md-1 col-lg-1 box "></div>
        </div>
    </div>
    @endsection