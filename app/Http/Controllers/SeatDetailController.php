<?php

namespace App\Http\Controllers;

use App\Models\Seat_detail;
use App\Models\Booking;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class SeatDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $booking=Seat_detail::paginate(10);
        return view('seat_detail.index',compact('booking'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $booking=Booking::all();
        return view('seat_detail.create',compact('booking'));
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
            $booking=new Seat_detail;
            $booking->booking_id=$request->booking_id;
            $booking->name=$request->name;
            $booking->tour_date=$request->tour_date;
            $booking->number_of_seat=$request->number_of_seat;
            $booking->booked_seat=$request->booked_seat;
            if($booking->save()){
                Toastr::success('booking Create Successfully!');
                return redirect()->route(currentUser().'.seat_detail.index');
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
     * @param  \App\Models\Seat_detail  $seat_detail
     * @return \Illuminate\Http\Response
     */
    public function show(Seat_detail $seat_detail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Seat_detail  $seat_detail
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $booking=Seat_detail::findOrFail(encryptor('decrypt',$id));
        return view('Seat_detail.edit',compact('booking'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Seat_detail  $seat_detail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $data=Seat_detail::findOrFail(encryptor('decrypt',$id));
            $booking->booking_id=$request->booking_id;
            $booking->name=$request->name;
            $booking->tour_date=$request->tour_date;
            $booking->number_of_seat=$request->number_of_seat;
            $booking->booked_seat=$request->booked_seat;

            if($data->save()){
                Toastr::success('Updated Successfully!');
                return redirect()->route(currentUser().'.seat_detail.index');
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
     * @param  \App\Models\Seat_detail  $seat_detail
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $booking= Seat_detail::findOrFail(encryptor('decrypt',$id));
        $booking->delete();
        return redirect()->back();
    }
}
