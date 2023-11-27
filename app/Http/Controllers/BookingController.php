<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $booking=Booking::paginate(10);
        return view('booking.index',compact('booking'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('booking.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $booking=new Booking;
            $booking->name=$request->name;
            $booking->contact_no=$request->contact_no;
            $booking->tour_date=$request->tour_date;
            $booking->booking_date=$request->booking_date;
            $booking->number_of_seat=$request->number_of_seat;
            $booking->price=$request->price;
            $booking->total_price=$request->total_price;
            if($booking->save()){
                Toastr::success('booking Create Successfully!');
                return redirect()->route(currentUser().'.booking.index');
            }else{
                Toastr::warning('Please try Again!');
                return redirect()->back();
            }
        }
        catch (Exception $e){
            Toastr::warning('Please try Again!');
            // dd($e);
            return back()->withInput();
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $booking=Booking::findOrFail(encryptor('decrypt',$id));
        return view('booking.edit',compact('booking'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $data=Booking::findOrFail(encryptor('decrypt',$id));
            $data->name=$request->name;
            $data->contact_no=$request->contact_no;
            $data->tour_date=$request->tour_date;
            $data->booking_date=$request->booking_date;
            $data->number_of_seat=$request->number_of_seat;
            $data->booked_seat=$request->booked_seat;
            $data->price=$request->price;
            $data->total_price=$request->total_price;

            if($data->save()){
                Toastr::success('Updated Successfully!');
                return redirect()->route(currentUser().'.booking.index');
            }else{
                Toastr::warning('Please try Again!');
                return redirect()->back();
            }
        }
        catch (Exception $e){
            dd($e);
            Toastr::warning('Please try Again!');
            return back()->withInput();

        }
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $booking= Booking::findOrFail(encryptor('decrypt',$id));
        $booking->delete();
        return redirect()->back();
    }
}
