<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PanelController extends Controller
{
    public function paneluser()
    {
        $getuser=Post::where('user_id',auth()->id())->get();
        $add=auth()->user()->postsuser;
        return view('paneluser.paneluser',['getuser'=>$getuser,'add'=>$add]);
    }

    public function logoutpanel()
    {
       auth()->logout();
       return redirect('logincheck');
    }

    public function putpaneluser()
    {
        return view('updatepanel.updatepanel');
    }

    public function putpaneluserput($id,Request $request)
    {
        $userupdate=User::find($id);

        $userupdate->email=$request->email;
        $userupdate->password=$request->password;
        $userupdate->update();
        return redirect('paneluser');
    }

    public function travrlpost()
    {
        return view('travrlpost.travrlpost');
    }

    public function travellingpost(Request $request)
    {
        $file=$request->file('image');
        $name=time().$file->getClientOriginalName();


        $file->move('image',$name);
        $request->user()->posts()->create([
            'name'=>$request->name,
            'city'=>$request->city,
            'date'=>$request->date,
            'image'=>$name,
        ]);
        return back();
    }



    public function search(Request $request, )
    {

     $sr=Post::where('city',$request->city)->get();

        return view('welcome',['sr'=>$sr]);
    }

    public function text($id)
    {
        $r=Post::where('id',$id)->get();
        return view('text.text',['r'=>$r]);
    }

    public function postsadd(Post $pos, Request $request)
    {


        $pos->members()->sync($request->user()->id);
        return back();
    }
}
