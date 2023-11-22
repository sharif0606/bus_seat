<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Traits\ImageHandleTraits;
use Exception;

class PostController extends Controller
{
    use ImageHandleTraits;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post=Post::paginate(10);
        return view('post.index',compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category= Category::all();
        return view('post.create',compact('category'));
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
            $data=new Post;
            $data->category_id=$request->category_id;
            $data->title_bn=$request->title_bn;
            $data->title_en=$request->title_en;
            $data->short_text_en=$request->short_text_en;
            $data->short_text_bn=$request->short_text_bn;
            $data->text_en=$request->text_en;
            $data->text_bn=$request->text_bn;
            $data->publish_date=$request->publish_date;
            $data->unpublish_date=$request->unpublish_date;
            $data->featured=$request->featured;
            $data->front_right=$request->front_right;
            $data->front_bottom=$request->front_bottom;
            $data->user_id=currentUserId();
            if($request->has('image'))
                $data->image=$this->resizeImage($request->image,'uploads/post/image',true,200,200,false);

            if($data->save()){
            Toastr::success('Post Create Successfully!');
            return redirect()->route(currentUser().'.post.index');
            }else{
            Toastr::warning('Please try Again!');
            return redirect()->back();
            }
        }
        catch (Exception $e){
            Toastr::warning('Please try Again!');
            //dd($e);
            return back()->withInput();

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $Post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category= Category::all();
        $post=Post::findOrFail(encryptor('decrypt',$id));
        return view('post.edit',compact('post','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $data=Post::findOrFail(encryptor('decrypt',$id));
            $data->category_id=$request->category_id;
            $data->title_bn=$request->title_bn;
            $data->title_en=$request->title_en;
            $data->short_text_en=$request->short_text_en;
            $data->short_text_bn=$request->short_text_bn;
            $data->text_en=$request->text_en;
            $data->text_bn=$request->text_bn;
            $data->publish_date=$request->publish_date;
            $data->unpublish_date=$request->unpublish_date;
            $data->featured=$request->featured;
            $data->front_right=$request->front_right;
            $data->front_bottom=$request->front_bottom;
            $path='uploads/post/image';

            if($request->has('image') && $request->image)
            if($this->deleteImage($data->image,$path))
                $data->image=$this->resizeImage($request->image,$path,true,200,200,false);

            if($data->save()){
            Toastr::success('Post Updated Successfully!');
            return redirect()->route(currentUser().'.post.index');
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
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $p= Post::findOrFail(encryptor('decrypt',$id));
        $p->delete();
        return redirect()->back();
    }
}
