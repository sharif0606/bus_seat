@extends('layout.app')

@section('pageTitle',trans('Edit this post'))
@section('pageSubTitle',trans('Update'))

@section('content')
  <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    @if(Session::has('response'))
                        {!!Session::get('response')['message']!!}
                    @endif
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="post" enctype="multipart/form-data" action="{{route(currentUser().'.post.update',encryptor('encrypt',$post->id))}}">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="uptoken" value="{{encryptor('encrypt',$post->id)}}">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <label for="category">{{__('Category')}}</label>
                                        <select class="form-select" aria-label="Default select example" name="category_id">
                                            <option selected>Select Category</option>
                                            @forelse ($category as $cat )
                                                <option value="{{$cat->id}}" {{ $post->category_id==$cat->id?"selected":""}}>{{$cat->category_en}}</option>
                                            @empty
                                                <option value="">No Data Found</option>
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="image">{{__('Image')}}</label>
                                            <input type="file" id="image" class="form-control"
                                                placeholder="Image" name="image">
                                                @if($errors->has('image'))
                                                    <span class="text-danger"> {{ $errors->first('image') }}</span>
                                                @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="title_bn">{{__('Title_BN')}}</label>
                                            <textarea type="text" id="title_bn" class="form-control" value="{{ old('title_bn',$post->title_bn)}}" name="title_bn">{{$post->title_bn}}</textarea> 
                                            @if($errors->has('title_bn'))
                                                <span class="text-danger"> {{ $errors->first('title_bn') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="title_en">{{__('Title_EN')}}</label>
                                            <textarea type="text" id="title_en" class="form-control" value="{{ old('title_en',$post->title_en)}}" name="title_en">{{$post->title_en}}</textarea> 
                                            @if($errors->has('title_en'))
                                                <span class="text-danger"> {{ $errors->first('title_en') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="short_text_bn">{{__('Short Text_BN')}}</label>
                                            <textarea type="text" id="short_text_bn" class="form-control" value="{{ old('short_text_bn',$post->short_text_bn)}}" name="short_text_bn" cols="30" rows="5">{{$post->short_text_bn}}</textarea>
                                            
                                            @if($errors->has('short_text_bn'))
                                                <span class="text-danger"> {{ $errors->first('short_text_bn') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="short_text_en">{{__('Short Text_EN')}}</label>
                                            <textarea type="text" id="short_text_en" class="form-control" value="{{ old('short_text_en',$post->short_text_en)}}" name="short_text_en" cols="30" rows="5">{{$post->short_text_en}}</textarea>
                                            
                                            @if($errors->has('short_text_en'))
                                                <span class="text-danger"> {{ $errors->first('short_text_en') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="text_bn">{{__('Text_BN')}}</label>
                                            <textarea type="text" id="text_bn" class="form-control" value="{{ old('text_bn',$post->text_bn)}}" name="text_bn" cols="30" rows="15">{{$post->text_bn}}</textarea>
                                            @if($errors->has('text_bn'))
                                                <span class="text-danger"> {{ $errors->first('text_bn') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="text_en">{{__('Text_EN')}}</label>
                                            <textarea type="text" id="text_en" class="form-control" value="{{ old('text_en',$post->text_en)}}" name="text_en" cols="30" rows="15">{{$post->text_en}}</textarea>
                                            @if($errors->has('text_en'))
                                                <span class="text-danger"> {{ $errors->first('text_en') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="publish_date">{{__('Publish Date')}}</label>
                                            <input type="date" id="publish_date" class="form-control" value="{{ old('publish_date',$post->publish_date)}}" name="publish_date">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="unpublish_date">{{__('Unpublish Date')}}</label>
                                            <input type="date" id="unpublish_date" class="form-control" value="{{ old('unpublish_date',$post->unpublish_date)}}" name="unpublish_date">
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <label for="featured">{{__('Featured')}}</label>
                                        <select class="form-select" aria-label="Default select example" name="featured">
                                            <option selected>Select Option</option>
                                            <option value="1" {{ $post->featured=='1'?'selected':''}}>Yes</option>
                                            <option value="0" {{ $post->featured=='0'?'selected':''}}>No</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label for="front_right">{{__('Front_right')}}</label>
                                        <select class="form-select" aria-label="Default select example" name="front_right">
                                            <option selected>Select Option</option>
                                            <option value="1" {{ $post->front_right=='1'?'selected':''}}>Yes</option>
                                            <option value="0" {{ $post->front_right=='0'?'selected':''}}>No</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label for="front_bottom">{{__('Front_Bottom')}}</label>
                                        <select class="form-select" aria-label="Default select example" name="front_bottom">
                                            <option selected>Select Option</option>
                                            <option value="1" {{ $post->front_bottom=='1'?'selected':''}}>Yes</option>
                                            <option value="0" {{ $post->front_bottom=='0'?'selected':''}}>No</option>
                                        </select>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <span>Article/Poem Image</span><img width="60px" height="50px" src="{{asset('uploads/post/image/'.$post->image)}}" alt="image" class="mx-4">
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">{{__('Save')}}</button>
                                        </div>
                                    </div>    
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
