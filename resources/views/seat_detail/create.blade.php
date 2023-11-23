@extends('layout.app')

@section('pageTitle',trans('Create Seat_detail'))
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
                            <form class="form" method="post" enctype="multipart/form-data" action="{{route(currentUser().'.seat_detail.store')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="name">booking_id</label>
                                            <select class="form-select" aria-label="Default select example" name="booking_id">
                                            <option selected>Select booking_id</option>
                                            @forelse ($booking as $cat )
                                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                                            @empty
                                                <option value="">No Data Found</option>
                                            @endforelse
                                            </select>
                                        </div>
                                    </div>
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
                                            <label for="tour_date">{{__('Tour Date')}}</label>
                                            <input type="date" id="tour_date" class="form-control" value="{{ old('tour_date')}}" name="tour_date">
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
                                            <label for="booked_seat">{{__('Booked Seat')}}</label>
                                            <input type="number" id="booked_seat" class="form-control" value="{{ old('booked_seat')}}" name="booked_seat">
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
