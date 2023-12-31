@extends('layout.app')

@section('pageTitle',trans('Create Settings'))
@section('pageSubTitle',trans('Create'))

@section('content')
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="post" enctype="multipart/form-data" action="{{route(currentUser().'.settings.store')}}">
                                @csrf
                                <div class="row mb-3">
                                    <label for="contact" class="col-sm-2 offset-1 col-form-label"><b>{{__('Contact')}}:</b></label>
                                    <div class="col-sm-6 offset-1">
                                        <input type="text" value="{{ old('contact_no')}}" class="form-control" placeholder="contact" name="contact_no">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="email" class="col-sm-2 offset-1 col-form-label"><b>{{__('Email')}}:</b></label>
                                    <div class="col-sm-6 offset-1">
                                        <input type="email" value="{{ old('email_address')}}" class="form-control" placeholder="Email" name="email_address">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="contact" class="col-sm-2 offset-1 col-form-label"><b>{{__('Address EN')}}:</b></label>
                                    <div class="col-sm-6 offset-1">
                                        <textarea name="address_en" class="form-control" cols="30" rows="2">{{ old('address_en')}}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="contact" class="col-sm-2 offset-1 col-form-label"><b>{{__('Address BN')}}:</b></label>
                                    <div class="col-sm-6 offset-1">
                                        <textarea name="address_bn" class="form-control" cols="30" rows="2">{{ old('address_bn')}}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="Facebook" class="col-sm-2 offset-1 col-form-label"><b>{{__('Facebook Link')}}:</b></label>
                                    <div class="col-sm-6 offset-1">
                                        <input type="text" value="{{ old('facebook_link')}}" class="form-control" name="facebook_link">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="Twitter" class="col-sm-2 offset-1 col-form-label"><b>{{__('Twitter Link')}}:</b></label>
                                    <div class="col-sm-6 offset-1">
                                        <input type="text" value="{{ old('twitter_link')}}" class="form-control" name="twitter_link">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="Youtube" class="col-sm-2 offset-1 col-form-label"><b>{{__('Youtube Link')}}:</b></label>
                                    <div class="col-sm-6 offset-1">
                                        <input type="text" value="{{ old('youtube_link')}}" class="form-control" name="youtube_link">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="Linkdin" class="col-sm-2 offset-1 col-form-label"><b>{{__('Linkdin Link')}}:</b></label>
                                    <div class="col-sm-6 offset-1">
                                        <input type="text" value="{{ old('linkdin_link')}}" class="form-control" name="linkdin_link">
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <label for="image" class="col-sm-2 offset-1 col-form-label"><b>{{__('Header Logo')}}:</b></label>
                                    <div class="col-sm-6 offset-1">
                                        <input type="file" class="form-control" name="header_logo">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="image" class="col-sm-2 offset-1 col-form-label"><b>{{__('Home Page Image')}}:</b></label>
                                    <div class="col-sm-6 offset-1">
                                        <input type="file" class="form-control" name="home_page_image">
                                    </div>
                                </div>
                                
                                <div class="col-8 offset-2 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1"><b>{{__('Save')}}</b></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection