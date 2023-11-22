@extends('frontend.app')
@section('content')
@php $site_setting=\App\Models\Setting::first(); @endphp

    <!--  Start Main Home Body -->
    <div class="container main_body my-3">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-lg-8  ps-5 main_home_image">
                <img src="{{asset('uploads/settings/home_page_image/'.$site_setting?->home_page_image)}}" class="img-fluid w-100" alt="">
                <div class="container mt-5 ">
                    <div class="row div_design">            
                        <div class="col-sm-flex col-md-12 col-lg-12 ">
                            <div class="card shadow" style="width: 18rem;">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <img class="ad_img_1 mt-1" src="{{asset('uploads/userimg/'.$front_right?->user?->image)}}" onerror="this.onerror=null;this.src='{{ asset('assets/images/logo/default.jpeg')}}';" > 
                                        </div>
                                        <div class="col-sm-10 ps-3">
                                            <h5 class="card-title mb-0 mt-0 fw-bold"> {!!$front_right?->user?->{'name_'.session()->get('locale')}!!}  </h5>
                                            <p class="mt-0 text_p">{{$front_right?->created_at->diffForHumans()}}</p>
                                        </div>
                                     </div>
                                
                                    <h4 class="card-text mt-0  mb-3 my-2 text-para-1">{!! $front_right?->{'title_'.session()->get('locale')} !!} 
                                    </h4>
                                    <p class="text-para-2">
                                        {!! $front_right?->{'short_text_'.session()->get('locale')} !!} 
                                        <b><a href="{{$front_right? route('single_post',$front_right->id):''}}" class="text-decoration-none ms-1"> {{__('Read More')}}</a></b>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4 ">
                <div class="row">
                    @forelse($featured as $h)
                        <div class="col-6 col-sm-6 col-md-4 col-lg-4 ">
                            <div><img src="{{asset('uploads/post/image/'.$h->image)}}" class="rounded img-fluid w-100  mt-3 mb-4" alt=""></div>
                        </div>
                        <div class="col-6 col-sm-6 col-md-8 col-lg-8 mt-3">
                            <div class="d-flex">
                                <img class="ad_img_2" src="{{asset('uploads/userimg/'.$h->user?->image)}}" onerror="this.onerror=null;this.src='{{ asset('assets/images/logo/default.jpeg')}}';">
                                <h5 class="fs-6 fw-3 ps-2 ad-img-2_text">{!! $h->user?->{'name_'.session()->get('locale')}!!} </h5> 
                            </div>
                            <h6 class="mt-1 text-para-2"><a class="text-decoration-none text-dark" href="{{route('single_post',$h->id)}}">{!! $h?->{'title_'.session()->get('locale')} !!}</a> </h6>
                            <span class="ad-img-2_text-cat ">{!! $h->category?->{'category_'.session()->get('locale')} !!} ,</span>
                            <span class=" ms-3 ad-img-2_text-time ">{{$h->created_at->diffForHumans()}}</span>
                        </div>
                    @empty
                        <div>No Data Found</div>
                    |@endforelse
                </div>
            </div>
        </div>
    </div>

    <!--  End Main Home Body -->
    <!-- Start Advertisement Section -->
    <div class="container  advertimernt_body ">
        <div class="row"> 
            <div class=" col-sm-2 col-md-2 col-lg-2 advertisement">
                @forelse(\App\Models\Advertisement::where('location',1)->get() as $adl)
                    <a href="{{$adl->link}}"><img class="mt-2" src="{{asset('uploads/advertisement/image/'.$adl->image)}}" alt=""></a>
                @empty
                
                @endforelse 
            </div>

            <div class="col-sm-8 col-md-8 col-lg-8 ">
            @forelse($homeArticle as $h)
                <div class="row">
                    <div class="col-2 col-sm-2 col-md-1"><img class="ad_img_3" src="{{asset('uploads/userimg/'.$h->user?->image)}}" onerror="this.onerror=null;this.src='{{ asset('assets/images/logo/default.jpeg')}}';">
                    </div>
                    <div class="col-10 col-sm-10 col-md-11"><h5 class=" ms-4 mb-0 mt-0 fw-bold"> {!! $h->user?->{'name_'.session()->get('locale')}!!}</h5>
                        <p class="ms-4">{!! $h->category?->{'category_'.session()->get('locale')} !!}, <span class="ms-1 text_p">{{$h->created_at->diffForHumans()}}</span></p>
                    </div>
                    <div class="col-12">
                        <p class="ad_img_3_text">{!! $h?->{'short_text_'.session()->get('locale')} !!}<b> <a href="{{route('single_post',$h->id)}}" class="text-decoration-none">{{__('Read More')}}</a></b> </p>
                    </div>
                    <hr>
                </div>
            @empty
               <div>data not found</div>
            @endforelse 
            </div>
            <div class="col-md-2 col-lg-2 advertisement">
                @forelse(\App\Models\Advertisement::where('location',2)->get() as $adl)
                    <a href="{{$adl->link}}"><img class="mt-2" src="{{asset('uploads/advertisement/image/'.$adl->image)}}" alt=""></a>
                @empty
                
                @endforelse 
            </div>
        </div>
    </div>
    <!-- End Advertisement Section -->
    <!-- Start media -->
    <div class="container  my-5">
        <div class="row">
            <div class="d-flex justify-content-center button_body">
                @forelse(\App\Models\Category::where('front_bottom',1)->get() as $menu)
                    <a href="{{route('fcat',$menu->slug)}}" class="button_design text-muted active me-1 pb-1 ">{!! $menu?->{'category_'.session()->get('locale')} !!}</a>
                @empty

                @endforelse
            </div>
        </div>
    </div>
    <!-- End media -->
    <div class="container d-lg-flex justify-content-center mb-5">  
        <div class="row g-3">
        @forelse($homeCard as $hc)
            <div class="col-sm-12 col-md-4">
                <div class="card">
                    <img src="{{asset('uploads/post/image/'.$hc->image)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h6 class="card-title">{!! $hc?->{'title_'.session()->get('locale')} !!}</h6>
                        <p>{{$hc->created_at->diffForHumans()}}</p>
                    </div>
                </div>
            </div>
        @empty
        <div>data not found</div>
        @endforelse
        </div>
    </div>
@endsection