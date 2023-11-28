@extends('frontend.app')
@section('content')
  <section class="hero-section">
    <div class="container-fluid hero-image">
      <div class="hero-text text-center">
        <p class="mb-0">Where would you like to Go?</p>
        <h1 class="mt-o"> Family-Friendly Bus <span>Tours</span> <br /> Fun for All Ages</h1>
      </div>
    </div>
  </section>
  <section class="bg-white div_design_p">
    <div class="div-design">
      <div class="py-2 ps-3 div-design-text">
        <form action="{{route('home')}}" method="get">
          <label for="" class="div-design-text-date text-dark">Date : </label>
          <input type="date" min="{{date('Y-m-d',strtotime('next Friday'))}}" value="{{date('Y-m-d',strtotime('next Friday'))}}" step="7" name="booking_date" id="booking_date" class="me-5" @if(session()->get('booking_date')) value="{{session()->get('booking_date')}}" @endif/>
          <button type="submit" class="btn btn-dark btn-round"><span class="fa fa-search text-white"></span> Search</button>
        </form>
        
      </div>
    </div>
  </section>
  <section>
    @if(session()->has('booking_date') && session()->get('booking_date')!='')
    <div class="container-fluid mt-2">
      <div class="row ">
        <div class=" col-12 col-md-6  mt-3">
          <h4 class="text-center text-dark  fw-bold ">Tourist Mini Bus Seat Layout</h4>
          <table class="w-100 seat_plan">
            <tbody cl="seat-list">
              <tr>
                <th scope="col" class="border text-center ">
                  <button type="button" class="btn text-black fw-bold fullbutton" value="1"  @if(in_array(1,$booked)) disabled @endif>1</button>
                </th>
                <th scope="col" colspan="2" class="border text-center "></th>
                <th scope="col" class=" border text-center ">
                  <button type="button" class="btn text-black disabled"><span class="material-symbols-outlined">2/Driver</span> </button> 
                </th>  
              </tr>
              <tr>
                <th scope="row" class="w-25 border text-center ">
                  <button type="button" class="btn text-black text-black disabled">
                  <span class="material-symbols-outlined">29/Fridge</span></button>
                </th>
                <th class="text-center w-25 ">
                  <button type="button" class="btn btn-outline-secondary" value="23" @if(in_array(23,$booked)) disabled @endif>23</button>
                </th>
                <th   class="border w-25 text-center " >
                  <button type="button" class="btn text-black fw-bold fullbutton" value="3" @if(in_array(3,$booked)) disabled @endif>3</button>
                </th>
                <th  class="border w-25 text-center " >
                  <button type="button" class="btn text-black fw-bold fullbutton" value="4" @if(in_array(4,$booked)) disabled @endif>4</button>
                </th>
              </tr>
              <tr>
                <th scope="row"  class="border w-25 text-center ">
                  <button type="button" class="btn text-black fw-bold disabled"><span class="material-symbols-outlined">Gate</span></button>
                </th>    
                <th  class="text-center w-25 ">
                  <button type="button" class="btn btn-outline-secondary text-black fw-bold" value="24" @if(in_array(24,$booked)) disabled @endif>24</button>
                </th>
                <th class="border text-center w-25"  >
                  <button type="button" class="btn text-black fw-bold fullbutton" value="5" @if(in_array(5,$booked)) disabled @endif>5</button>
                </th>
                <th   class="border text-center w-25 " >
                  <button type="button" class="btn text-black fw-bold fullbutton" value="6" @if(in_array(6,$booked)) disabled @endif>6</button>
                </th>
              </tr>
              <tr>
                <th scope="row" class="border text-center w-25 " >
                  <button type="button" class="btn text-black fw-bold fullbutton" value="7" @if(in_array(7,$booked)) disabled @endif>7</button>
                </th>
                <th  class="text-center w-25 ">
                  <button type="button" class="btn btn-outline-secondary text-black fw-bold" value="25" @if(in_array(25,$booked)) disabled @endif>25</button>
                </th>
                <th class="border text-center w-25" >
                  <button type="button" class="btn text-black fw-bold fullbutton" value="8" @if(in_array(8,$booked)) disabled @endif>8</button>
                </th>
                <th class="border text-center  w-25 " >
                  <button type="button" class="btn text-black fw-bold fullbutton" value="9" @if(in_array(9,$booked)) disabled @endif>9</button>
                </th>
              </tr>
              <tr>
                <th scope="row" class="border text-center w-25 " >
                  <button type="button" class="btn text-black fw-bold fullbutton" value="10" @if(in_array(10,$booked)) disabled @endif>10</button>
                </th>
                <th  class="text-center ">
                  <button type="button" class="btn btn-outline-secondary text-black fw-bold" value="26" @if(in_array(26,$booked)) disabled @endif>26</button>
                </th>
                <th   class="border text-center " >
                  <button type="button" class="btn text-black fw-bold fullbutton" value="11" @if(in_array(11,$booked)) disabled @endif>11</button>
                </th>
                <th   class="border text-center " >
                  <button type="button" class="btn text-black fw-bold fullbutton" value="12" @if(in_array(12,$booked)) disabled @endif>12</button>
                </th>
              </tr>
              <tr>
                <th scope="row" class="border text-center " >
                  <button type="button" class="btn text-black fw-bold fullbutton" value="13" @if(in_array(13,$booked)) disabled @endif>13</button>
                </th>
                <th  class="text-center ">
                  <button type="button" class="btn btn-outline-secondary text-black fw-bold" value="27" @if(in_array(27,$booked)) disabled @endif>27</button>
                </th>
                <th class="border text-center " >
                  <button type="button" class="btn text-black fw-bold fullbutton" value="14" @if(in_array(14,$booked)) disabled @endif>14</button>
                </th>
                <th class="border text-center " >
                  <button type="button" class="btn text-black fw-bold fullbutton" value="15" @if(in_array(15,$booked)) disabled @endif>15</button>
                </th>
              </tr>
              <tr>
                <th scope="row" class="border text-center  " >
                  <button type="button" class="btn  fw-bold fullbutton" value="16" @if(in_array(16,$booked)) disabled @endif>16</button>
                </th>
                <th  class="text-center">
                  <button type="button" class="btn btn-outline-secondary text-black fw-bold" value="28" @if(in_array(28,$booked)) disabled @endif>28</button>
                </th>
                <th class="border text-center " >
                  <button type="button" class="btn text-black fw-bold fullbutton" value="17" @if(in_array(17,$booked)) disabled @endif>17</button>
                </th>
                <th class="border text-center " >
                  <button type="button" class="btn text-black fw-bold fullbutton" value="18" @if(in_array(18,$booked)) disabled @endif>18</button>
                </th>
              </tr>
              <tr>
                <th scope="row" class="border text-center ">
                  <button type="button" class="btn text-black fw-bold fullbutton" value="19" @if(in_array(19,$booked)) disabled @endif>19</button>
                </th>
                <th class="border text-center ">
                  <button type="button" class="btn text-black fw-bold fullbutton" value="20" @if(in_array(20,$booked)) disabled @endif>20</button>
                </th>
                <th class="border text-center ">
                  <button type="button" class="btn text-black fw-bold fullbutton" value="21" @if(in_array(21,$booked)) disabled @endif>21</button>
                </th>
                <th class="border text-center ">
                  <button type="button" class="btn text-black fw-bold fullbutton" value="22" @if(in_array(22,$booked)) disabled @endif>22</button>
                </th>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="col-12 col-md-6 mb-2">
          <div class="booking-form ">
            <div id="booking-going-on">
              <h4 class="text-dark  fw-bold">Bus Tickets Booking for Tour!</h4>
              <p>  Get tickets today before it's too late!</p>
              <form action="{{route('booking.store')}}" method="post">
                @csrf
                <div class="form-group">
                  <label for="name">Name</label>
                  <input id="name-input name" class="form-control inp-style" type="text" required name="name" value="{{ old('name')}}" placeholder="Enter your name"/> 
                  @if($errors->has('name'))
                    <span class="text-danger"> {{ $errors->first('name') }}</span>
                  @endif
                </div>
                <div class="form-group">
                  <label for="contact_no">Contact No.</label>
                  <input id="contact-no-input contact_no" class="inp-style form-control" required type="tel" value="{{ old('contact_no')}}" name="contact_no" placeholder="+880-1819000000" />
                  @if($errors->has('contact_no'))
                    <span class="text-danger"> {{ $errors->first('contact_no') }}</span>
                  @endif
                </div>
                <div class="form-group">
                  <label for="tour_date">Tour Date</label>
                  <input class="inp-style form-control" value="{{ old('tour_date',session()->get('booking_date'))}}" type="date" readonly name="tour_date"/>
                </div>

                <div class="form-group">
                  <label for="number_of_seat">Number of Seat Booking</label >
                  <input id="counter" class="first-class-seatBooking-seat inp-style inp-width " readonly type="number" name="number_of_seat" value="0" /> 
                  <input id="seat_list" readonly type="hidden" name="seat_list" value="" /> 

                  <label for="">Price Per Ticket</label>
                  <input id="ticketPrice" class="inp-style inp-width " readonly  type="number"  name="price" value="500"  />
                </div>
                <div class="calculations">
                  <div class="amount ">
                    <div class="left" readonly>
                      <h4>Total</h4>
                    </div>
                    <div class="right" id="totalAmount">
                      <p id="total">BDT0</p>
                    </div>
                    <input type="hidden" id="total_cost" name="total_price">
                  </div>
                </div>
                <button class="btn-style py-2 my-2" type="submit">Get Tickets!</button> 
              </form>
            </div>
          </div> 
        </div> 
      </div>
    </div>
  </section> 
    @endif
  
 
@endsection
@push('scripts')
<script>
  
    // Get all buttons with the .btn class
  const allButtons = document.querySelectorAll('.btn');
  //console.log(allButtons);

  // Define the price per seat
  const seatPrice = 500; // You can change this as needed

  // Initialize variables for tracking booked seats and the total amount
  let bookedSeats = 0;
  let totalAmount = 0;
    let seatbooked=new Array();
  // Function to update seat status and total amount
  function updateSeatStatus(button) {
      if (button.style.backgroundColor !== '#6eaf6e') {
          button.style.backgroundColor = '#6eaf6e';
          bookedSeats++;
          totalAmount += seatPrice;
          seatbooked.push($(button).val());
          console.log(seatbooked)
      } else {
          button.style.backgroundColor = '';
          bookedSeats--;
          totalAmount -= seatPrice;
          seatbooked = seatbooked.filter(item => item !== $(button).val())
      }
      document.getElementById('counter').value = bookedSeats;
      document.getElementById('totalAmount').textContent = `Total Amount: BDT ${totalAmount}`;
      document.getElementById('total_cost').value =totalAmount;
      document.getElementById('seat_list').value=seatbooked.join();
  }

  // Add click event listeners to all buttons
  allButtons.forEach(button => {
    button.addEventListener('click', () => {
      updateSeatStatus(button);
    });
  });

</script>
@endpush