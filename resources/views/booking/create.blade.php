@extends('layout.app')

@section('pageTitle',trans('Create Booking'))
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
                            <form class="form" method="post" enctype="multipart/form-data" action="{{route(currentUser().'.booking.store')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" id="name" class="form-control" value="{{ old('name')}}" name="name">
                                            @if($errors->has('name'))
                                                <span class="text-danger"> {{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="contact_no">Contact Number</label>
                                            <input type="text" id="contact_no" class="form-control" value="{{ old('contact_no')}}" name="contact_no">
                                            @if($errors->has('contact_no'))
                                                <span class="text-danger"> {{ $errors->first('contact_no') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="tour_date">{{__('Tour Date')}}</label>
                                            <input type="date" id="tour_date" class="form-control" value="{{ old('tour_date')}}" name="tour_date">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="booking_date">{{__('Booking Date')}}</label>
                                            <input type="date" id="booking_date" class="form-control" value="{{ old('booking_date')}}" name="booking_date">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="number_of_seat">{{__('Number of Seat')}}</label>
                                            <input type="number" id="number_of_seat" class="form-control" value="{{ old('number_of_seat')}}" name="number_of_seat">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="price">{{__('price')}}</label>
                                            <input type="number" id="price" class="form-control" value="{{ old('price')}}" name="price">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="total_price">{{__('Total_price')}}</label>
                                            <input type="number" id="total_price" class="form-control" value="{{ old('total_price')}}" name="total_price">
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
