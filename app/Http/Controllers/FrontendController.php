<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Post;
use App\Models\Category;
use App\Models\AboutSetting;
use App\Models\Booking;
use App\Models\BookingDetail;

use Illuminate\Http\Request;
use Toastr;
use DB;
class FrontendController extends Controller
{
    public function home(Request $request)
    {
        $booked=array();
        if(!session()->get('locale'))
            session()->put('locale', 'en');
        
        if($request->booking_date)
            session()->put('booking_date', $request->booking_date);
        else
            session()->put('booking_date',false);

        if(session()->get('booking_date'))
            $booked=BookingDetail::where('tour_date',session()->get('booking_date'))->pluck('seat_no')->toArray();
        
        return view('frontend.home',compact('booked'));
    }

    public function booking_store(Request $request)
    {
        try{
            DB::beginTransaction();
            $booking=new Booking;
            $booking->name=$request->name;
            $booking->contact_no=$request->contact_no;
            $booking->tour_date=session()->get('booking_date');
            $booking->booking_date=\Carbon\Carbon::now()->format('d-m-Y');
            $booking->number_of_seat=$request->number_of_seat;
            $booking->price=500;//$request->price;
            $booking->total_price=($request->number_of_seat * 500);//$request->total_price;
            if($booking->save()){
                $seat_list=explode(',',$request->seat_list);
                if(count($seat_list)> 1){
                    foreach($seat_list as $seat){
                        $bd=new BookingDetail;
                        $bd->booking_id=$booking->id;
                        $bd->seat_no=$seat;
                        $bd->tour_date=$booking->tour_date;
                        $bd->save();
                    }
                    DB::commit();
                    session()->put('booking_date',false);
                    Toastr::success('booking Create Successfully!');
                    return redirect()->route('success',encryptor('encrypt',$booking->id));
                }else{
                    Toastr::success('No seat booked!');
                    return back()->withInput();
                }
            }
        }
        catch (Exception $e){
            DB::rollback();
            Toastr::warning('Please try Again!');
            //dd($e);
            return back()->withInput();
        }
    }

    public function about()
    {
        $about = AboutSetting::first();
        return view('frontend.about',compact('about'));
    }
    public function success($id)
    {
        $data=Booking::where('id',encryptor('decrypt',$id))->first();
        return view('frontend.success',compact('data'));
        
    }
    
    public function single_post($id)
    {
        $post=Post::findOrFail($id);
        return view('frontend.single_post',compact('post'));
    }
    public function single_page($slug)
    {
        $page=Page::where('page_slug',$slug)->first();
        return view('frontend.single_page',compact('page'));
    }
   

}
