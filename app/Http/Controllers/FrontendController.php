<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Post;
use App\Models\Category;
use App\Models\AboutSetting;
use App\Models\Comment;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home()
    {
        if(!session()->get('locale')){
            session()->put('locale', 'en');
        }
        $featured=Post::where('featured',1)->where('publish_date','<=',date('Y-m-d'))->get();
        $front_right=Post::where('front_right',1)->where('publish_date','<=',date('Y-m-d'))->first();
        $homeArticle=Post::where('front_bottom',1)->where('publish_date','<=',date('Y-m-d'))->get();
        $homeCard=Post::where('featured',1)->where('publish_date','<=',date('Y-m-d'))->get();
        return view('frontend.home',compact('featured','front_right','homeArticle','homeCard'));
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
        $comment=Comment::where('post_id',$id)->where('parent_id',0)->get();
        return view('frontend.single_post',compact('post','comment'));
    }
    public function single_page($slug)
    {
        $page=Page::where('page_slug',$slug)->first();
        return view('frontend.single_page',compact('page'));
    }
   

}
