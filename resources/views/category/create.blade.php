@extends('layout.app')

@section('pageTitle',trans('Create Category'))
@section('pageSubTitle',trans('Create'))

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
                            <form class="form" method="post" enctype="multipart/form-data" action="{{route(currentUser().'.category.store')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="image">{{__('Image')}}</label>
                                            <input type="file" id="image" class="form-control"
                                                placeholder="Image" name="image">
                                                @if($errors->has('image'))
                                                    <span class="text-danger"> {{ $errors->first('image')}}</span>
                                                @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label for="category_en">{{__('Category_EN')}}</label>
                                        <input type="text" required id="category_en" class="form-control" value="{{ old('category_en')}}" name="category_en">
                                        @if($errors->has('category_en'))
                                            <span class="text-danger"> {{ $errors->first('category_en') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label for="category_bn">{{__('Category_BN')}}</label>
                                        <input type="text" required id="category_bn" class="form-control" value="{{ old('category_bn')}}" name="category_bn">
                                        @if($errors->has('category_bn'))
                                            <span class="text-danger"> {{ $errors->first('category_bn') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label for="slug">{{__('Slug')}}</label>
                                        <input type="text" required id="slug" class="form-control" value="{{ old('slug')}}" name="slug" pattern="[-a-zA-Z0-9_\.]+">
                                        @if($errors->has('slug'))
                                            <span class="text-danger"> {{ $errors->first('slug') }}</span>
                                        @endif 
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label for="top_menu">{{__('Top Menu')}}</label>
                                        <select class="form-select" aria-label="Default select example" name="top_menu">
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label for="front_bottom">{{__('Bottom Menu')}}</label>
                                        <select class="form-select" aria-label="Default select example" name="front_bottom">
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
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
