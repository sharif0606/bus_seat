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
    <section class="bg-white">
        <div class="div-design">
            <div class="py-2 div-design-text">
                {{-- <label for="" class="div-design-text-date">Date : </label>
                <input type="date" name="" id="" class="me-5" />
                <label for="">From: </label>
                <input type="text" placeholder="select your Place"name=""id=""class="me-5"/>
                <label for="">To: </label>
                <input type="text" name="" id=""placeholder="select destination" class="me-5" />
                <input type="search" class="bg-dark text-light   py-1 ps-4" name="" id="" placeholder="  Search"/>
                <span class="bg-dark"> <a href=""><i class="fas fa-search text-white"></i></a> </span> --}}
            </div>
        </div>
    </section>
    <section>
        <div class="container-fluid mt-2">
            <div class="row ">
                <div class="col-12 col-md-6 mb-2">
                <div class="booking-form ">
                    <div id="booking-going-on">
                        <h4 class="text-dark  fw-bold">Bus Tickets Booking for Tour!</h4>
                        <p >  Get tickets today before it's too late!</p>
                        <div class="input-group">
                            <label for="">Name</label>
                            <input id="name-input" class="inp-style type="text" name="" placeholder="Enter your name"/>
                        </div>
                        <div class="input-group">
                            <label for="">Contact No.</label>
                            <input id="contact-no-input" class="inp-style" type="tel" name="" placeholder="+880-1819000000" />
                        </div>
                        <div class="input-group">
                            <label for="">Tour Date</label>
                            <input id="tour-date-input" class="inp-style" type="date" name="" required="required"  />
                        </div>
                        <div class="input-group">
                            <div class="input-group">
                                <label for="">Booking Date</label>
                                <input id="booking-date-input" class="inp-style" type="date" name="" required="required"/> 
                            </div>
                                <label for="">Number of Seat Booking</label >
                                <input id="counter" class="first-class-seatBooking-seat inp-style inp-width " readonly type="number" name="" value="0" /> 
                            
                                <label for="">Price Per Ticket</label>
                                <input id="ticketPrice" class="inp-style inp-width " readonly  type="number"  name="" value="500"  />     
                            
                        </div> 
                        <div class="input-group d-grid">
                            <button class="booking-button-design py-2 my-1">  <a href="#"  class="text-decoration-none text-white">Booking Seat</a></button>       
                        </div>
                        <div class="calculations">
                            
                            <div class="amount ">
                                    <div class="left" readonly>
                                        <h4>Total</h4>
                                    </div>
                                    <div class="right" id="totalAmount">
                                        <p id="total">$0</p>
                                    </div>
                            </div>
                        </div>
                        <button id="book-now" class="btn-style  py-2 my-2">Get Tickets!</button> 
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
                <div class=" col-12 col-md-6  mt-3 desktop-seat">
                    
                    <h4 class="text-center text-dark  fw-bold ">Tourist Mini Bus Seat Layout</h4>
                        <table class="w-100 seat_plan">
                            <tbody cl="seat-list">
                                <tr>
                                    <th scope="col" class="border text-center ">
                                        <button type="button" class="btn text-black fw-bold" value="1" >1</button>
                                    </th>
                                    <th scope="col" colspan="2" class="border text-center ">
                                    </th>


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
                                            <button type="button" class="btn btn-outline-secondary" value="23">
                                            23
                                            </button>
                                    </th>
                                    <th   class="border w-25 text-center " >
                                            <button type="button" class="btn text-black fw-bold fullbutton" value="3">3</button>
                                    </th>
                                    <th  class="border w-25 text-center " >
                                            <button type="button" class="btn text-black fw-bold fullbutton" value="4">4</button>
                                    </th>
                                    
                                </tr>
                                <tr>
                                    <th scope="row"  class="border w-25 text-center ">
                                            <button type="button" class="btn text-black fw-bold disabled">
                                            <span class="material-symbols-outlined">Gate</span>
                                        </button>
                                    </th>    
                                    <th  class="text-center w-25 ">
                                        <button type="button" class="btn btn-outline-secondary text-black fw-bold" value="24">
                                            24
                                        </button>
                                        </th>
                                    <th   class="border text-center w-25"  >
                                            <button type="button" class="btn text-black fw-bold fullbutton" value="5">5</button>
                                    </th>
                                    <th   class="border text-center w-25 " >
                                            <button type="button" class="btn text-black fw-bold fullbutton" value="6">6</button>
                                    </th>
                                </tr>
                                <tr>
                                    <th scope="row" class="border text-center w-25 " >
                                        <button type="button" class="btn text-black fw-bold fullbutton" value="7">7</button>
                                        </th>
                                    <th  class="text-center w-25 ">
                                        <button type="button" class="btn btn-outline-secondary text-black fw-bold" value="25">
                                            25
                                        </button>
                                        </th>
                                        <th   class="border text-center w-25" >
                                        <button type="button" class="btn text-black fw-bold fullbutton" value="8">8</button>
                                        </th>
                                        <th   class="border text-center  w-25 " >
                                        <button type="button" class="btn text-black fw-bold fullbutton" value="9">9</button>
                                        </th>
                                </tr>
                            <tr>
                            <th scope="row" class="border text-center w-25 " >
                                    <button type="button" class="btn text-black fw-bold fullbutton" value="10">10</button>
                                    </th>
                                <th  class="text-center ">
                                    <button type="button" class="btn btn-outline-secondary text-black fw-bold" value="26">
                                        26
                                    </button>
                                    </th>
                                    <th   class="border text-center " >
                                    <button type="button" class="btn text-black fw-bold fullbutton" value="11">11</button>
                                    </th>
                                    <th   class="border text-center " >
                                    <button type="button" class="btn text-black fw-bold fullbutton" value="12">12</button>
                                    </th>
                            </tr>
                            <tr>
                            <th scope="row" class="border text-center " >
                                    <button type="button" class="btn text-black fw-bold fullbutton" value="13">13</button>
                                    </th>
                                <th  class="text-center ">
                                    <button type="button" class="btn btn-outline-secondary text-black fw-bold" value="27">
                                        27
                                    </button>
                                    </th>
                                    <th   class="border text-center " >
                                    <button type="button" class="btn text-black fw-bold fullbutton" value="14">14</button>
                                    </th>
                                    <th   class="border text-center " >
                                    <button type="button" class="btn text-black fw-bold fullbutton" value="15">15</button>
                                    </th>
                            </tr>
                            <tr>
                            <th scope="row" class="border text-center  " >
                                    <button type="button" class="btn  fw-bold fullbutton" value="16">16</button>
                                    </th>
                                <th  class="text-center">
                                    <button type="button" class="btn btn-outline-secondary text-black fw-bold" value="28">
                                        28
                                    </button>
                                    </th>
                                    <th   class="border text-center " >
                                    <button type="button" class="btn text-black fw-bold fullbutton" value="17">17</button>
                                    </th>
                                    <th   class="border text-center " >
                                    <button type="button" class="btn text-black fw-bold fullbutton" value="18">18</button>
                                    </th>
                            </tr>
                            
                    
                                <tr>
                                    <th scope="row" class="border text-center ">
                                    <button type="button" class="btn text-black fw-bold fullbutton" value="19">19</button>
                                    </th>
                        
                            
                                    <th class="border text-center ">
                                    <button type="button" class="btn text-black fw-bold fullbutton" value="20">20</button>
                                    </th>
                            
                                
                                    <th class="border text-center ">
                                    <button type="button" class="btn text-black fw-bold fullbutton" value="21">21</button>
                                    </th>
                            
                                
                                    <th class="border text-center ">
                                    <button type="button" class="btn text-black fw-bold fullbutton" value="22">22</button>
                                    </th>
                                </tr>
                                
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section> 
          
  <section>
    <div class="container my-4">
      <div class="mobile-seat row">
           <h3 class="text-center text-black fw-bold">Tourist Mini Bus Seat Layout</h3>
          <div class="col-12">
                    <table class="w-100 seat_plan">
                      <tr>
                          <th scope="col" colspan="2" class="border text-center">
                              <button type="button" class="btn text-black fw-bold " id="seat_booking" value="1">1</button>
                          </th>
                                  
                          
                          <th scope="col" colspan="2" class=" border text-center ">
                              <button type="button" class="btn text-black disabled"><span class="material-symbols-outlined">airline_seat_recline_normal </span> </button> 
                          </th>    
                      </tr>
                           
                      <tr>
                            <th scope="row" class="w-25 border text-center ">
                                <button type="button" class="btn text-black text-black disabled">
                                <span class="material-symbols-outlined">kitchen</span></button>
                          </th>  


                        
                            
                          <th   class="text-center w-25 ">
                                  <button type="button" class="btn btn-outline-secondary" value="1">
                                    23
                                  </button>
                          </th>
                        
                          <th   class="border w-25 text-center" >
                                  <button type="button" class="btn text-black fw-bold fullbutton" value="1">3</button>
                          </th>
                          <th  class="border w-25 text-center " >
                                  <button type="button" class="btn text-black fw-bold " value="1">4</button>
                          </th>
                             
                      </tr>
                      <tr>
                        <th scope="row"  class="border w-25 text-center ">
                                  <button type="button" class="btn text-black fw-bold disabled">
                                  <span class="material-symbols-outlined">door_sliding</span>
                                </button>
                        </th>    
                           <th  class="text-center w-25">
                                <button type="button" class="btn btn-outline-secondary text-black fw-bold" value="1">
                                  24
                                </button>
                              </th>
                          th  class="border w-25 text-center " >
                                  <button type="button" class="btn text-black fw-bold fullbutton" value="1">5</button>
                          </th>
                          <th   class="border text-center w-25" >
                                  <button type="button" class="btn text-black fw-bold" value="1">6</button>
                          </th>
                      </tr>
                      <tr>
                        <th scope="row" class="border text-center w-25" >
                                <button type="button" class="btn text-black fw-bold" value="1">7</button>
                              </th>
                            <th  class="text-center w-25 ">
                                <button type="button" class="btn btn-outline-secondary text-black fw-bold" value="1">
                                  25
                                </button>
                              </th>
                              <th   class="border text-center w-25 " >
                                <button type="button" class="btn text-black fw-bold" value="1">8</button>
                              </th>
                              <th   class="border text-center  w-25" >
                                <button type="button" class="btn text-black fw-bold" value="1">9</button>
                              </th>
                      </tr>
                      <tr>
                        <th scope="row" class="border text-center w-25" >
                                <button type="button" class="btn text-black fw-bold" value="1">10</button>
                              </th>
                            <th  class="text-center ">
                                <button type="button" class="btn btn-outline-secondary text-black fw-bold" value="1">
                                  26
                                </button>
                              </th>
                              <th   class="border text-center " >
                                <button type="button" class="btn text-black fw-bold" value="1">11</button>
                              </th>
                              <th   class="border text-center " >
                                <button type="button" class="btn text-black fw-bold" value="1">12</button>
                              </th>
                      </tr>
                      <tr>
                        <th scope="row" class="border text-center " >
                                <button type="button" class="btn text-black fw-bold" value="1">13</button>
                              </th>
                            <th  class="text-center ">
                                <button type="button" class="btn btn-outline-secondary text-black fw-bold">
                                  27
                                </button>
                              </th>
                              <th   class="border text-center " >
                                <button type="button" class="btn text-black fw-bold" value="1">14</button>
                              </th>
                              <th   class="border text-center " >
                                <button type="button" class="btn text-black fw-bold" value="1">15</button>
                              </th>
                      </tr>
                      <tr>
                        <th scope="row" class="border text-center " >
                                <button type="button" class="btn text-black fw-bold" value="1">16</button>
                              </th>
                            <th  class="text-center ">
                                <button type="button" class="btn btn-outline-secondary text-black fw-bold" value="1">
                                  28
                                </button>
                              </th>
                              <th   class="border text-center " >
                                <button type="button" class="btn text-black fw-bold" value="1">17</button>
                              </th>
                              <th   class="border text-center " >
                                <button type="button" class="btn text-black fw-bold" value="1">18</button>
                              </th>
                      </tr>
                      
               
                          <tr>
                              <th scope="row" class="border text-center ">
                                <button type="button" class="btn text-black fw-bold" value="1">19</button>
                              </th>
                     
                      
                              <th class="border text-center ">
                                <button type="button" class="btn text-black fw-bold" value="1">20</button>
                              </th>
                        
                          
                              <th class="border text-center ">
                                <button type="button" class="btn text-black fw-bold" value="1">21</button>
                              </th>
                         
                           
                              <th class="border text-center ">
                                <button type="button" class="btn text-black fw-bold" value="1">22</button>
                              </th>
                            </tr>
                           
                 </table>
          </div>
      </div>
      </div>
  </section>
 
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
      document.getElementById('totalAmount').textContent = `Total Amount: ${totalAmount}`;
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