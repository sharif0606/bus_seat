@extends('layout.app')

@section('pageTitle',trans('Edit Category'))
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
                            <form class="form" method="post" enctype="multipart/form-data" action="{{route(currentUser().'.category.update',encryptor('encrypt',$category->id))}}">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="uptoken" value="{{encryptor('encrypt',$category->id)}}">
                                <div class="row">
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
                                            <label for="category_en">{{__('Category_EN')}}</label>
                                            <input type="text" required id="category_en" class="form-control" value="{{ old('category_en',$category->category_en)}}" name="category_en">
                                            @if($errors->has('category_en'))
                                                <span class="text-danger"> {{ $errors->first('category_en') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="category_bn">{{__('Category_BN')}}</label>
                                            <input type="text" required id="category_bn" class="form-control" value="{{ old('category_bn',$category->category_bn)}}" name="category_bn">
                                            @if($errors->has('category_bn'))
                                                <span class="text-danger"> {{ $errors->first('category_bn') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label for="slug">{{__('Slug')}}</label>
                                        <input type="text" id="slug" required class="form-control" value="{{ old('slug',$category->slug)}}" name="slug" pattern="[-a-zA-Z0-9_\.]+"> 
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label for="top_menu">{{__('Top Menu')}}</label>
                                        <select class="form-select" aria-label="Default select example" name="top_menu">
                                            <option value="1" {{ $category->top_menu=='1'?'selected':''}}>Yes</option>
                                            <option value="0" {{ $category->top_menu=='0'?'selected':''}}>No</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label for="front_bottom">{{__('Bottom Menu')}}</label>
                                        <select class="form-select" aria-label="Default select example" name="front_bottom">
                                            <option value="1" {{ $category->front_bottom=='1'?'selected':''}}>Yes</option>
                                            <option value="0" {{ $category->front_bottom=='0'?'selected':''}}>No</option>
                                        </select>
                                    </div>
                                
                                <div class="row">
                                    <div class="col-12">
                                        <span>Category Image</span><img width="60px" height="50px" src="{{asset('uploads/category/image/'.$category->image)}}" alt="image" class="mx-4">
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">{{__('Save')}}</button>
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
