@extends('frontend.app')
@section('siteTitle',$catinfo->{'category_'.session()->get('locale')})
@section('content')   
    <!--End Menu-Part -->
    <div class="container">
        <div class="row">
            <div class="col-2 col-sm-2.col-md-2 box">
                @forelse(\App\Models\Advertisement::where('location',3)->get() as $adl)
                    <a href="{{$adl->link}}"><img class="mt-2" src="{{asset('uploads/advertisement/image/'.$adl->image)}}" alt=""></a>
                @empty
                
                @endforelse 
            </div>
            <div class="col-8 col-sm-8.col-md-8">
                <h3 class="text-danger mt-5 mb-3"> {!! $catinfo->{'category_'.session()->get('locale')} !!}</h3>
                @forelse ($data as $fs)
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                            <img src="{{asset('uploads/post/image/'.$fs->image)}}" class="img-fluid w-100 mb-3" alt="">
                        </div>
                        <div class="col-12 col-sm-12 col-md-6">
                            <div class="row">
                                <div class=" col-2 col-sm-2">
                                    <img class="ad_img_1" src="{{asset('uploads/userimg/'.$fs->user?->image)}}" onerror="this.onerror=null;this.src='{{ asset('assets/images/logo/default.jpeg')}}';"  >
                                </div>
                                <div class="col-10 col-sm-10 "> 
                                    <h6 class="mb-0 ms-1 fw-bold">{!! $fs->user?->{'name_'.session()->get('locale')}!!}</h6>
                                    <p class="mt-0 ms-1 ad-img-2_text-cat">{!! $fs->category?->{'category_'.session()->get('locale')} !!}, <span class="ms-2">{{$fs->created_at->diffForHumans()}}</span></p>
                                </div>
                            </div>
                            <div class="col-12">
                                <p class="mb-5 ad_img_3_text">{!! $fs?->{'short_text_'.session()->get('locale')} !!}...<b><a href="{{route('single_post',$fs->id)}}" class="text-decoration-none ms-2">{{__('Read More')}}</a></b> </p>
                            </div>
                        </div>
                    </div>
                @empty
                    
                @endforelse
                <div>{{$data->links()}}</div>
            </div>
            <div class="col-2 col-sm-2.col-md-2 box">
                @forelse(\App\Models\Advertisement::where('location',4)->get() as $adl)
                    <a href="{{$adl->link}}"><img class="mt-2" src="{{asset('uploads/advertisement/image/'.$adl->image)}}" alt=""></a>
                @empty
                
                @endforelse 
            </div>
        </div>

    </div>
    <!-- End media -->
    <div class="container d-lg-flex justify-content-center mt-5">
        <div class="row g-3">
        @forelse($homeCard as $hc)
            <div class="col-sm-12 col-md-4">
                <div class="card">
                    <img src="{{asset('uploads/home_page/home_card/image/'.$hc->image)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h6 class="card-title">{{$hc->title}}</h6>
                        <p>{{$hc?->created_at->diffForHumans()}}</p>
                    </div>
                </div>
            </div>
        @empty
        <div>data not found</div>
        @endforelse
        </div>
    </div>
@endsection
