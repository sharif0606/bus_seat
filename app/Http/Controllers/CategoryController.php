<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

use App\Http\Requests\Category\AddNewRequest;
use App\Http\Requests\Category\UpdateRequest;

use App\Http\Traits\ImageHandleTraits;
use Exception;

class CategoryController extends Controller
{
    use ImageHandleTraits;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category=Category::paginate(10);
        return view('category.index',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddNewRequest $request)
    {
        try{
            $data=new Category;
            $data->category_en=$request->category_en;
            $data->category_bn=$request->category_bn;
            $data->slug=$request->slug;
            $data->top_menu=$request->top_menu;
            $data->front_bottom=$request->front_bottom;
            if($request->has('image'))
                $data->image=$this->resizeImage($request->image,'uploads/category/image',true,200,200,false);

            if($data->save()){
            Toastr::success('Category Create Successfully!');
            return redirect()->route(currentUser().'.category.index');
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
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $category=Category::findOrFail(encryptor('decrypt',$id));
        return view('category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        try{
            $data=Category::findOrFail(encryptor('decrypt',$id));
            $data->category_en=$request->category_en;
            $data->category_bn=$request->category_bn;
            $data->slug=$request->slug;
            $data->top_menu=$request->top_menu;
            $data->front_bottom=$request->front_bottom;
            $path='uploads/category/image';

            if($request->has('image') && $request->image)
            if($this->deleteImage($data->image,$path))
                $data->image=$this->resizeImage($request->image,$path,true,200,200,false);

            if($data->save()){
            Toastr::success('Category Updated Successfully!');
            return redirect()->route(currentUser().'.category.index');
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
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $c= Category::findOrFail(encryptor('decrypt',$id));
        $c->delete();
        return redirect()->back();
    }
}
