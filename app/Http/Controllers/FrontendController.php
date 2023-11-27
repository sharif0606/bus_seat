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
            $booking=new Booking;
            $booking->name=$request->name;
            $booking->contact_no=$request->contact_no;
            $booking->tour_date=$request->tour_date;
            $booking->booking_date=$request->booking_date;
            $booking->number_of_seat=$request->number_of_seat;
            $booking->price=$request->price;
            $booking->total_price=$request->total_price;
            if($booking->save()){
                $booked_seat=explode(',',$request->booked_seat);
                if(count($booked_seat)> 1){
                    foreach($booked_seat as $seat){
                        $bd=new BookingDetail;
                        $bd->booking_id=$booking->id;
                        $bd->seat_no=$seat;
                        $bd->tour_date=$request->tour_date;
                        $bd->save();
                    }
                }
                Toastr::success('booking Create Successfully!');
                return redirect()->back();
            }
        }
        catch (Exception $e){
            Toastr::warning('Please try Again!');
            // dd($e);
            return back()->withInput();
        }
    }

    public function about()
    {
        $about = AboutSetting::first();
        return view('frontend.about',compact('about'));
    }
    public function post_cat($slug)
    {
        $catinfo=Category::where('slug',$slug)->first();
        if($catinfo){
            $data=Post::where('category_id',$catinfo->id)->where('publish_date','<=',date('Y-m-d'))->paginate(10);
            $homeCard=Post::where('category_id','!=',$catinfo->id)->where('publish_date','<=',date('Y-m-d'))->get();
            return view('frontend.post_cat',compact('data','catinfo','homeCard'));
        }else{
            return redirect('home');
        }
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
