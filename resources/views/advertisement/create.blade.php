@extends('layout.app')

@section('pageTitle',trans('Create Advertisement'))
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
                            <form class="form" method="post" enctype="multipart/form-data" action="{{route(currentUser().'.advertisement.store')}}">
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
                                        <div class="form-group">
                                            <label for="link">{{__('Link')}}</label>
                                            <input type="text" id="link" class="form-control" value="{{ old('link')}}" name="link">
                                            @if($errors->has('link'))
                                                <span class="text-danger"> {{ $errors->first('link') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="title">{{__('Title')}}</label>
                                            <input type="text" id="title" class="form-control" value="{{ old('title')}}" name="title">
                                            @if($errors->has('title'))
                                                <span class="text-danger"> {{ $errors->first('title') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            @php $addlocation=array(1=>'Home Page Right','Home Page Left','Category Page Right','Category Page Left','Details Page Right','Details Page Left'); @endphp
                                            <label for="location">{{__('Location')}}</label>
                                            <select id="location" class="form-control" value="{{ old('location')}}" name="location" required>
                                                <option value="">Select location</option>
                                                @foreach($addlocation as $k=>$v)
                                                    <option value="{{$k}}" @if(old('location')==$k) selected @endif>{{$v}}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('location'))
                                                <span class="text-danger"> {{ $errors->first('location') }}</span>
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
