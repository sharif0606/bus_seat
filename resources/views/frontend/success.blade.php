@extends('frontend.app')
@section('siteTitle','success')
@section('content')   
    <!--End Menu-Part -->
    <div class="container">
        <div class="row">
            <div style="padding: 2em 0; margin:2em 0 1em 0;" >
                <!-- <span style="text-align: center;""><img src="images\ticket2.jpg" alt="" width="300"/></span> -->
                <h3 style="text-align: center;">Thank you so much!</h3>
                <p class="fw=200" style="text-align: center; color: #e33741;">You have successfully completed your booking.</p>
                    <hr>
                
                <h5 class="text-center mt-3 booking-date-class">Name: 
                  <span id="name-final-view"> {{($data->name)}}</span> , Contact No.:
                  <span id="contact-no-final-view"> {{($data->contact_no)}} </span>  
                </h5>

                    <p class="booking-date-class mt-3">Your booking date: <span id="booking-date-final-view">{{($data->booking_date)}}</span> </p>
                    <p class="concert-date-class">Your tour date: <span id="tour-date-final-view">{{($data->tour_date)}}</span> </p>
                <hr>
                    <p>You have booked: <span id="first-class-seatBooking-final-view">
                        @forelse ($data->seats as $item)
                            {{$item->seat_no}},
                        @empty
                            
                        @endforelse
                    </span></p>
                
                <hr>
                <p>Your total cost is:  <span id="total-final-view">{{($data->total_price)}}</span> </p>
                <!-- <p><a href="abcdefgh@gmail.com">Send email</a></p> -->
            </div>
        </div>
    </div>
    <!-- End media -->
    
@endsection
