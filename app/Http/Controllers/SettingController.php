<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Traits\ImageHandleTraits;
use Exception;

class SettingController extends Controller
{
    use ImageHandleTraits;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings=Setting::paginate(10);
        return view('setting.index',compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('setting.create');
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
            $data=new Setting;
            $data->address_en=$request->address_en;
            $data->address_bn=$request->address_bn;
            $data->contact_no=$request->contact_no;
            $data->email_address=$request->email_address;
            $data->facebook_link=$request->facebook_link;
            $data->twitter_link=$request->twitter_link;
            $data->youtube_link=$request->youtube_link;
            $data->linkdin_link=$request->linkdin_link;
            if($request->has('header_logo'))
                $data->header_logo=$this->resizeImage($request->header_logo,'uploads/settings/header_logo',true,200,200,false);

            if($request->has('home_page_image'))
                $data->home_page_image=$this->resizeImage($request->home_page_image,'uploads/settings/home_page_image',true,200,200,false);

           
            if($data->save()){
                Toastr::success('Settings Create Successfully!');
                return redirect()->route(currentUser().'.settings.index');
            }else{
                Toastr::warning('Please try Again!');
                return redirect()->back();
            }

        }
        catch (Exception $e){
            Toastr::warning('Please try Again!');
            dd($e);
            return back()->withInput();

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $settings=Setting::findOrFail(encryptor('decrypt',$id));
        return view('setting.edit',compact('settings'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $data=Setting::findOrFail(encryptor('decrypt',$id));
            $data->address_en=$request->address_en;
            $data->address_bn=$request->address_bn;
            $data->contact_no=$request->contact_no;
            $data->email_address=$request->email_address;
            $data->facebook_link=$request->facebook_link;
            $data->twitter_link=$request->twitter_link;
            $data->youtube_link=$request->youtube_link;
            $data->linkdin_link=$request->linkdin_link;
            $path='uploads/settings/header_logo';
            $path2='uploads/settings/home_page_image';

            if($request->has('header_logo') && $request->header_logo){
                $this->deleteImage($data->header_logo,$path);
                $data->header_logo=$this->resizeImage($request->header_logo,$path,true,200,200,false);
            }

            if($request->has('home_page_image') && $request->home_page_image){
                $this->deleteImage($data->home_page_image,$path2);
                $data->home_page_image=$this->resizeImage($request->home_page_image,$path2,true,200,200,false);
            }

                
            if($data->save()){
                Toastr::success('Settings Updated Successfully!');
                return redirect()->route(currentUser().'.settings.index');
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
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(setting $setting)
    {
        //
    }
}
