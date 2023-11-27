@extends('frontend.app')
@section('content')
  <section class="hero-section">
    <div class="container-fluid hero-image">
      <div class="hero-text text-center">
        <p class="mb-0">Where would you like to Go?</p>
        <h1 class="mt-o"> Family-Friendly Bus <span>Tours</span> <br /> Fun for All Ages</h1>
        <a class="button-design" type="button" href="#">Booking Now</a>
      </div>
    </div>
  </section>
  <section class="bg-white div_design_p">
    <div class="div-design">
      <div class="py-2 ps-3 div-design-text">
        <form action="{{route('home')}}" method="get">
          <label for="" class="div-design-text-date text-dark">Date : </label>
          <input type="date" name="booking_date" id="" class="me-5" @if(session()->get('booking_date')) value="{{session()->get('booking_date')}}" @endif/>
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
          <?php print_r($booked); ?>
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
                  <input id="name-input name" class="form-control inp-style" type="text" name="name" value="{{ old('name')}}" placeholder="Enter your name"/> 
                  @if($errors->has('name'))
                    <span class="text-danger"> {{ $errors->first('name') }}</span>
                  @endif
                </div>
                <div class="form-group">
                  <label for="contact_no">Contact No.</label>
                  <input id="contact-no-input contact_no" class="inp-style form-control" type="tel" value="{{ old('contact_no')}}" name="contact_no" placeholder="+880-1819000000" />
                  @if($errors->has('contact_no'))
                    <span class="text-danger"> {{ $errors->first('contact_no') }}</span>
                  @endif
                </div>
                <div class="form-group">
                  <label for="tour_date">Tour Date</label>
                  <input id="tour-date-input tour_date" class="inp-style form-control" value="{{ old('tour_date')}}" type="date" name="tour_date" required="required"  />
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
                <button id="book-now" class="btn-style py-2 my-2" type="submit">Get Tickets!</button> 
              </form>
            </div>
              <div style="padding: 2em 0; margin:2em 0 1em 0;" id="booking-successful">
                <!-- <span style="text-align: center;""><img src="images\ticket2.jpg" alt="" width="300"/></span> -->
                <h3 style="text-align: center;">Thank you so much!</h3>
                <p class="fw=200" style="text-align: center; color: #e33741;">You have successfully completed your booking.</p>
                    <hr>
                
                <h5 class="text-center mt-3 booking-date-class">Name: 
                  <span id="name-final-view"> invalid</span> , Contact No.:
                  <span id="contact-no-final-view"> invalid </span>  
                </h5>

                    <p class="booking-date-class mt-3">Your booking date: <span id="booking-date-final-view"></span> </p>
                    <p class="concert-date-class">Your tour date: <span id="tour-date-final-view"></span> </p>
                <hr>
                    <p>You have booked <span id="first-class-seatBooking-final-view"></span></p>
                
                <hr>
                <p>Your total cost is  <span id="total-final-view"></span> </p>
                <!-- <p><a href="abcdefgh@gmail.com">Send email</a></p> -->
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
      if (button.style.backgroundColor !== 'lightgreen') {
          button.style.backgroundColor = 'lightgreen';
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
          //  button.addEventListener('click', (e) => {
          //   console.log(e.target.value);
      
      });
  });

      

      // function handleTicketChange(ticket, isIncrease) {
      //   const ticketInput = document.getElementById(ticket + "-count");
      //   const ticketCount = getInputValueTicket(ticket);
      //   let ticketNewCount = ticketCount;
      //   if (isIncrease == true) {
      //     ticketNewCount = ticketCount + 1;
      //   }
      //   if (isIncrease == false && ticketCount > 0) {
      //     ticketNewCount = ticketCount - 1;
      //   }
      //   ticketInput.value = ticketNewCount;
      //   let ticketTotal = 0;
      //   if (ticket == "first-class") {
      //     ticketTotal = ticketNewCount * 1219;
      //   }
      //   if (ticket == "economy") {
      //     ticketTotal = ticketNewCount * 59;
      //   }
      //   calculateTotal();
      // }

      // function calculateTotal() {
      //   const firstClassCount = getInputValueTicket("first-class");
      //   const economyCount = getInputValueTicket("economy");

      //   const totalPrice = firstClassCount * 150 + economyCount * 100;

      //   document.getElementById("sub-total").innerText = "$" + totalPrice;

      //   const tax = Math.round(totalPrice * 0.1);
      //   document.getElementById("tax-amount").innerText = "$" + tax;

      //   const grandTotal = totalPrice + tax;
      //   document.getElementById("total").innerText = "$" + grandTotal;
      // }

      // function getInputValueTicket(ticket) {
      //   const ticketInput = document.getElementById(ticket + "-count");
      //   const ticketCount = parseInt(ticketInput.value);

      //   return ticketCount;
      // }

      document.getElementById("book-now").addEventListener("click", function () {
        document.getElementById("booking-going-on").style.display = "none";
        document.getElementById("booking-successful").style.display = "block";

        getInputValueBooking("name");
        getInputValueBooking("contact-no");
        getInputValueDate("booking-date");
        getInputValueDate("tour-date");
        getCurrentTicketCount("first-class-seatBooking-final-view");
        getCurrentTotalCost("total");
      });

      function getInputValueBooking(status) {
        const updatedStatus = document.getElementById(status + "-input").value;
        if (updatedStatus != "") {
          document.getElementById(status + "-final-view").innerText =
            updatedStatus;
        } else {
          document.getElementById(status + "-final-view").innerText = "invalid";
        }
      }

      function getInputValueDate(status) {
        const dateEntered = document.getElementById(status + "-input").value;
        const updatedDate = new Date(dateEntered);
        console.log(dateEntered);
        document.getElementById(status + "-final-view").innerText = updatedDate;
      }

      function getCurrentTicketCount(status) {
        const updatedStatus = document.getElementById(status).value;
        document.getElementById(status + "-final-view").innerText = updatedStatus;
      }

      function getCurrentTotalCost(status) {
        const updatedStatus = document.getElementById(status).innerText;
        document.getElementById(status + "-final-view").innerText = updatedStatus;
      }
</script>
@endpush