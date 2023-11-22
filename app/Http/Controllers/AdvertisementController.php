<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Traits\ImageHandleTraits;
use Exception;

class AdvertisementController extends Controller
{
    use ImageHandleTraits;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advertisement=Advertisement::paginate(10);
        return view('advertisement.index',compact('advertisement'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('advertisement.create');
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
            $data=new Advertisement;
            $data->link=$request->link;
            $data->title=$request->title;
            $data->location=$request->location;
            if($request->has('image'))
                $data->image=$this->resizeImage($request->image,'uploads/advertisement/image',true,200,200,false);

            if($data->save()){
            Toastr::success('Advertisement Create Successfully!');
            return redirect()->route(currentUser().'.advertisement.index');
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
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function show(Advertisement $advertisement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $advertisement=Advertisement::findOrFail(encryptor('decrypt',$id));
        return view('advertisement.edit',compact('advertisement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        try{
            $data=Advertisement::findOrFail(encryptor('decrypt',$id));
            $data->link=$request->link;
            $data->title=$request->title;
            $data->location=$request->location;
            $path1='uploads/advertisement/image';
            if($request->has('image') && $request->image)
            if($this->deleteImage($data->image,$path1))
                $data->image=$this->resizeImage($request->image,$path1,true,200,200,false);

            if($data->save()){
            Toastr::success('Updated Successfully!');
            return redirect()->route(currentUser().'.advertisement.index');
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
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $as= Advertisement::findOrFail(encryptor('decrypt',$id));
        $as->delete();
        return redirect()->back();
    }
}
