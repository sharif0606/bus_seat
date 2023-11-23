@extends('layout.app')

@section('pageTitle',trans('Update Booking'))
@section('pageSubTitle',trans('Update'))

@section('content')
  <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            @if(Session::has('response'))
                                {!!Session::get('response')['message']!!}
                            @endif
                            <form class="form" method="post" enctype="multipart/form-data" action="{{route(currentUser().'.booking.update',encryptor('encrypt',$booking->id))}}">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="uptoken" value="{{encryptor('encrypt',$booking->id)}}">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" id="name" class="form-control" value="{{ old('name',$booking->name)}}" name="name">
                                            @if($errors->has('name'))
                                                <span class="text-danger"> {{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="contact_no">Contact Number</label>
                                            <input type="text" id="contact_no" class="form-control" value="{{ old('contact_no',$booking->contact_no)}}" name="contact_no">
                                            @if($errors->has('contact_no'))
                                                <span class="text-danger"> {{ $errors->first('contact_no') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="tour_date">{{__('Tour Date')}}</label>
                                        <input type="date" id="tour_date" class="form-control" value="{{ old('tour_date',$booking->tour_date)}}" name="tour_date">
                                    </div>
                                </div>    
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="booking_date">{{__('Booking Date')}}</label>
                                        <input type="date" id="booking_date" class="form-control" value="{{ old('booking_date',$booking->booking_date)}}" name="booking_date">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="number_of_seat">{{__('Number of Seat')}}</label>
                                        <textarea type="text" id="number_of_seat" class="form-control" value="{{ old('number_of_seat',$booking->number_of_seat)}}" name="number_of_seat">{{$booking->number_of_seat}}</textarea> 
                                        @if($errors->has('number_of_seat'))
                                            <span class="text-danger"> {{ $errors->first('number_of_seat') }}</span>
                                        @endif
                                    </div>
                                </div> 
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="booked_seat">{{__('Booked Seat')}}</label>
                                        <textarea type="text" id="booked_seat" class="form-control" value="{{ old('booked_seat',$booking->booked_seat)}}" name="booked_seat">{{$booking->booked_seat}}</textarea> 
                                        @if($errors->has('booked_seat'))
                                            <span class="text-danger"> {{ $errors->first('booked_seat') }}</span>
                                        @endif
                                    </div>
                                </div> 
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="price">{{__('Price')}}</label>
                                        <input type="number" id="price" class="form-control" value="{{ old('price',$booking->price)}}" name="price">
                                    </div>
                                </div>   
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label for="total_price">{{__('Total Price')}}</label>
                                        <input type="number" id="total_price" class="form-control" value="{{ old('total_price',$booking->total_price)}}" name="total_price">
                                    </div>
                                </div>   
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Save</button>
                                        
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
