<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use App\Models\Company;
use App\Models\Settings\Branch;
use App\Http\Traits\ResponseTrait;
use App\Http\Requests\AdminUser\AddNewRequest;
use App\Http\Requests\AdminUser\UpdateRequest;
use Illuminate\Support\Facades\Hash;
use Exception;
use App\Http\Traits\ImageHandleTraits;

class AdminUserController extends Controller
{
    use ResponseTrait;
    use ImageHandleTraits;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::whereIn('role_id',[1,2])->paginate();
        return view('settings.adminusers.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('settings.adminusers.create');
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
            $user= new User;
            $user->name_en=$request->userName;
            $user->name_bn=$request->name_bn;
            $user->contact_no=$request->contactNumber;
            $user->image=$this->resizeImage($request->image,'uploads/userimg',true,1920,803,true);
            $user->email=$request->userEmail;
            $user->password=Hash::make($request->password);
            $user->role_id=1;
            if($user->save())
                return redirect()->route(currentUser().'.admin.index')->with($this->resMessageHtml(true,null,'Successfully created'));
            else
                return redirect()->back()->withInput()->with($this->resMessageHtml(false,'error','Please try again'));
        }catch(Exception $e){
            //dd($e);
            return redirect()->back()->withInput()->with($this->resMessageHtml(false,'error','Please try again'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::findOrFail(encryptor('decrypt',$id));
        return view('settings.adminusers.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        try{
            $user=User::findOrFail(encryptor('decrypt',$id));
            $user->name_en=$request->userName;
            $user->name_bn=$request->name_bn;
            $user->contact_no=$request->contactNumber;
            $user->email=$request->userEmail;
            $user->language=$request->language;
            if($request->has('password') && $request->password)
                $user->password=Hash::make($request->password);

                $path='uploads/userimg';
                if($request->has('image') && $request->image)
                if($this->deleteImage($user->image,$path))
                $user->image=$this->resizeImage($request->image,$path,true,1920,803,true);
         
            if($user->save())
                return redirect()->route(currentUser().'.admin.index')->with($this->resMessageHtml(true,null,'Successfully updated'));
            else
                return redirect()->back()->withInput()->with($this->resMessageHtml(false,'error','Please try again'));
        }catch(Exception $e){
            dd($e);
            return redirect()->back()->withInput()->with($this->resMessageHtml(false,'error','Please try again'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $user=User::findOrFail(encryptor('decrypt',$id));
            if($user->delete())
                return redirect()->back()->with($this->resMessageHtml(true,null,'Successfully deleted'));
            else
                return redirect()->back()->withInput()->with($this->resMessageHtml(false,'error','Please try again'));
        }catch(Exception $e){
            //dd($e);
            return redirect()->back()->withInput()->with($this->resMessageHtml(false,'error','Please try again'));
        }
        
    }
}
