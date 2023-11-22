<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Traits\ImageHandleTraits;
use Exception;

class PageController extends Controller
{
    use ImageHandleTraits;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page=Page::paginate(10);
        return view('page.index',compact('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page.create');
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeImage(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;
    
            $request->file('upload')->move(public_path('media'), $fileName);
    
            $url = asset('media/' . $fileName);
            return response()->json(['fileName' => $fileName, 'uploaded'=> 1, 'url' => $url]);
        }
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
            $data=new Page;
            $data->page_title=$request->page_title;
            $data->details=$request->details;
            $data->published=$request->published;
            $data->language=$request->language;
            $data->page_slug=str_replace(' ', '_', $request->page_title);
            if($data->save()){
                Toastr::success('Page Create Successfully!');
                return redirect()->route(currentUser().'.page.index');
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
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page=Page::findOrFail(encryptor('decrypt',$id));
        return view('page.edit',compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        try{
            $data=Page::findOrFail(encryptor('decrypt',$id));
            $data->page_title=$request->page_title;
            $data->details=$request->details;
            $data->published=$request->published;
            $data->language=$request->language;
            $data->page_slug=str_replace(' ', '_', $request->page_title);

            if($data->save()){
                Toastr::success('Updated Successfully!');
                return redirect()->route(currentUser().'.page.index');
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
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $as= Page::findOrFail(encryptor('decrypt',$id));
        $as->delete();
        return redirect()->back();
    }
}
