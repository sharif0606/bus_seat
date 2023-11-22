@extends('frontend.app')
@section('content')
<meta property="og:url"                content="{{urlencode(route('single_post',$post->id))}}" />
<meta property="og:type"               content="article" />
<meta property="og:title"              content="{!!$post->{'title_'.session()->get('locale')}!!}" />
<meta property="og:description"        content="{!!$post->{'short_text_'.session()->get('locale')}!!}" />
<meta property="og:image"              content="{{asset('uploads/post/image/'.$post->image)}}" />
<style>
.hidden{
    display: none
}
</style>
    <div class="container-fluid  mb-5">
        <div class="row mx-1">
            <div class="col-sm-2 col-md-2 col-lg-2 box ">
                @forelse(\App\Models\Advertisement::where('location',5)->get() as $adl)
                    <a href="{{$adl->link}}"><img class="mt-2" src="{{asset('uploads/advertisement/image/'.$adl->image)}}" alt=""></a>
                @empty
                
                @endforelse 
            </div>
            <div class="col-sm-8 col-md-8 col-lg-8 ">
                <div class="row mt-3">
                    <div class="col-sm-12 col-md-12 col-lg-12  ">
                        <div class=" poem_title">

                            <h5 class="text-primary m-auto">{!! $post->category?->{'category_'.session()->get('locale')} !!}</h5>
                            <h4 class="mt-2 fw-bold">{!!$post->{'title_'.session()->get('locale')}!!}</h4>
                            <div class="mb-2">
                                <img class="image_icon" src="{{asset('uploads/userimg/'.$post->user?->image)}}" onerror="this.onerror=null;this.src='{{ asset('assets/images/logo/default.jpeg')}}';" > 
                                <span class="ms-2 image_icon_text ">{!! $post->user?->{'name_'.session()->get('locale')}!!}</span> | <span class="image_icon_text"> {{$post->created_at->diffForHumans()}}</span>
                            </div>
                            <img src="{{asset('uploads/post/image/'.$post->image)}}" class="w-100 " alt="">
                            <hr>

                            {{--<h3> <i class="fa-solid fa-circle fs-5"></i> {!!$post->heading!!}</h3>
                            <hr> --}}
                            {!!$post->{'text_'.session()->get('locale')}!!} 
                            
                            {{-- <div class=" mb-5">
                                <button type="button" class="btn btn-outline-primary mx-2">কবিতা</button>
                                <button type="button" class="btn btn-outline-primary mx-2">কবিতা</button>
                                <button type="button" class="btn btn-outline-primary mx-2">কবিতা</button>
                            </div> --}}
                            <hr>
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <h4>comment</h4>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6  ">
                                    <ul class="d-flex justify-content-end ">
                                        <li class="px-3"> <a href="https://www.facebook.com/sharer/sharer.php?u={{urlencode(route('single_post',$post->id))}}"><i class="fa-brands fa-facebook"></i></a> </li>
                                        <li class="px-3"> <a href="https://twitter.com/share?url={{urlencode(route('single_post',$post->id))}}"><i class="fa-brands fa-twitter"></i></a> </li>
                                        <li class="px-3"> <a href="whatsapp://send?text={{urlencode(route('single_post',$post->id))}}"><i class="fa-brands fa-whatsapp"></i></a> </li>
                                        <li class="px-3"><a href="https://www.linkedin.com/sharing/share-offsite/?url={{urlencode(route('single_post',$post->id))}}"><i class="fa-brands fa-linkedin"></i></a> </li>
                                    </ul>
                                </div>
                            </div>
                            <hr>
                            <div class="row mb-3">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body p-4">
                                            <div class="d-flex flex-start mt-4">
                                                <div class="flex-grow-1 flex-shrink-1">
                                                    @forelse($comment as $com)
                                                        <div>
                                                            <div class="d-flex justify-content-between align-items-center mt-3">
                                                                <p class="mb-1">
                                                                    <b>{{ $com->name}}</b> <span class="small">- {{$com->created_at->diffForHumans()}}</span>
                                                                </p>
                                                                <a href="javascript:void()" onclick="$('.replay'+{{$com->id}}).toggle()"><i class="fas fa-reply fa-xs"></i><span class="small"> reply</span></a>
                                                            </div>
                                                            <p class="small mb-0">
                                                                {{ $com->comment}}
                                                            </p>
                                                        </div>
                                                        
                                                        @forelse($com->children as $rep)
                                                            <div class="d-flex flex-start mt-2 ms-5">
                                                                <div class="flex-grow-1 flex-shrink-1">
                                                                    <div>
                                                                        <div class="d-flex justify-content-between align-items-center">
                                                                            <p class="mb-1">
                                                                            <b>{{ $rep->name}}</b> <span class="small">- {{$rep->created_at->diffForHumans()}}</span>
                                                                            </p>
                                                                        </div>
                                                                        <p class="small mb-0">
                                                                            {{ $rep->comment}}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @empty @endforelse
                                                            <div class="replay{{$com->id}} hidden ms-5">
                                                                <form action="{{route('comment.store')}}" method="post">
                                                                    @csrf
                                                                    <label for="yname" class="form-label">Name</label>
                                                                    <input type="text" name="yname" id="yname" class="form-control" placeholder="Your Name">
                                                                    @if($errors->has('yname'))
                                                                        <span class="text-danger"> {{ $errors->first('yname')}}</span>
                                                                    @endif
                                                                    <input type="hidden" name="post" value="{{ $post->id }}">
                                                                    <input type="hidden" name="parent" value="{{ $com->id }}">
                                                                    
                                                                    <label for="comment_d" class="form-label">Comment</label>
                                                                    <textarea name="comment_d" class="form-control" id="comment_d" placeholder="Share Your Thoughts" rows="1"></textarea>
                                                                    @if($errors->has('comment_d'))
                                                                        <span class="text-danger"> {{ $errors->first('comment_d')}}</span>
                                                                    @endif
                                                                    <div class="d-flex justify-content-end"> 
                                                                        <button type="submit" class="btn btn-primary px-5  mt-2"> Comment</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                    @empty

                                                    @endforelse
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <form action="{{route('comment.store')}}" method="post">
                                        @csrf
                                        <label for="yname" class="form-label">Name</label>
                                        <input type="text" name="yname" id="yname" class="form-control" placeholder="Your Name">
                                        @if($errors->has('yname'))
                                            <span class="text-danger"> {{ $errors->first('yname')}}</span>
                                        @endif
                                        <input type="hidden" name="post" value="{{ $post->id }}">
                                        <input type="hidden" name="parent" value="0">
                                        
                                        <label for="comment_d" class="form-label">Comment</label>
                                        <textarea name="comment_d" class="form-control" id="comment_d" placeholder="Share Your Thoughts" rows="1"></textarea>
                                        @if($errors->has('comment_d'))
                                            <span class="text-danger"> {{ $errors->first('comment_d')}}</span>
                                        @endif
                                        <div class="d-flex justify-content-end"> 
                                            <button type="submit" class="btn btn-primary px-5  mt-2"> Comment</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" col-sm-2 col-md-2 col-lg-2 box ">
                @forelse(\App\Models\Advertisement::where('location',6)->get() as $adl)
                    <a href="{{$adl->link}}"><img class="mt-2" src="{{asset('uploads/advertisement/image/'.$adl->image)}}" alt=""></a>
                @empty
                
                @endforelse 
            </div>
        </div>
    </div>

@endsection