@extends('layout.app')

@section('pageTitle',trans('Edit About Page'))
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
                            <form class="form" method="post" enctype="multipart/form-data" action="{{route(currentUser().'.about_setting.update',encryptor('encrypt',$setting->id))}}">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="uptoken" value="{{encryptor('encrypt',$setting->id)}}">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="about_image">{{__('Header_image')}}</label>
                                            <input type="file" id="about_image" class="form-control"
                                            placeholder="about_image" name="about_image">
                                            @if($errors->has('about_image'))
                                                <span class="text-danger"> {{ $errors->first('about_image')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="about_title_en">{{__('About title')}}</label>
                                            <textarea type="text" id="about_title_en" class="form-control" name="about_title_en" rows="2">{{ old('about_title_en',$setting->about_title_en)}}</textarea>
                                            @if($errors->has('about_title_en'))
                                                <span class="text-danger"> {{ $errors->first('about_title_en') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="about_title_bn">{{__('About title')}}</label>
                                            <textarea type="text" id="about_title_bn" class="form-control" name="about_title_bn" rows="2">{{ old('about_title_bn',$setting->about_title_bn)}}</textarea>
                                            @if($errors->has('about_title_bn'))
                                                <span class="text-danger"> {{ $errors->first('about_title_bn') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="about_description_en">{{__('About description')}}</label>
                                            <textarea type="text" id="about_description_en" class="form-control" name="about_description_en"  rows="3">{{ old('about_description_en',$setting->about_description_en)}}</textarea>
                                            @if($errors->has('about_description_en'))
                                                <span class="text-danger"> {{ $errors->first('about_description_en') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="about_description_bn">{{__('About description')}}</label>
                                            <textarea type="text" id="about_description_bn" class="form-control" name="about_description_bn"  rows="3">{{ old('about_description_bn',$setting->about_description_bn)}}</textarea>
                                            @if($errors->has('about_description_bn'))
                                                <span class="text-danger"> {{ $errors->first('about_description_bn') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="mission_title_en">{{__('Mission title')}}</label>
                                            <textarea type="text" id="mission_title_en" class="form-control" name="mission_title_en"  rows="2">{{ old('mission_title_en',$setting->mission_title_en)}}</textarea>
                                            @if($errors->has('mission_title_en'))
                                                <span class="text-danger"> {{ $errors->first('mission_title_en') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="mission_title_bn">{{__('Mission title')}}</label>
                                            <textarea type="text" id="mission_title_bn" class="form-control" name="mission_title_bn"  rows="2">{{ old('mission_title_bn',$setting->mission_title_bn)}}</textarea>
                                            @if($errors->has('mission_title_bn'))
                                                <span class="text-danger"> {{ $errors->first('mission_title_bn') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="mission_description_en">{{__('Mission description')}}</label>
                                            <textarea type="text" id="mission_description_en" class="form-control" name="mission_description_en"  rows="3">{{ old('mission_description_en',$setting->mission_description_en)}}</textarea>
                                            @if($errors->has('mission_description_en'))
                                                <span class="text-danger"> {{ $errors->first('mission_description_en') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="mission_description_bn">{{__('Mission description')}}</label>
                                            <textarea type="text" id="mission_description_bn" class="form-control" name="mission_description_bn"  rows="3">{{ old('mission_description_bn',$setting->mission_description_bn)}}</textarea>
                                            @if($errors->has('mission_description_bn'))
                                                <span class="text-danger"> {{ $errors->first('mission_description_bn') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="mission_image_1">{{__('Mission image 1')}}</label>
                                            <input type="file" id="mission_image_1" class="form-control"
                                            placeholder="mission_image_1" name="mission_image_1">
                                            @if($errors->has('mission_image_1'))
                                                <span class="text-danger"> {{ $errors->first('mission_image_1')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="mission_image_2">{{__('Mission image 2')}}</label>
                                            <input type="file" id="mission_image_2" class="form-control"
                                            placeholder="mission_image_2" name="mission_image_2">
                                            @if($errors->has('mission_image_2'))
                                                <span class="text-danger"> {{ $errors->first('mission_image_2')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="mission_image_3">{{__('Mission image 3')}}</label>
                                            <input type="file" id="mission_image_3" class="form-control"
                                            placeholder="mission_image_3" name="mission_image_3">
                                            @if($errors->has('mission_image_3'))
                                                <span class="text-danger"> {{ $errors->first('mission_image_3')}}</span>
                                            @endif
                                        </div>
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
