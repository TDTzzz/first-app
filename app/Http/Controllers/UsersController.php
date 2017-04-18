<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use App\Comment;
use Illuminate\Validation\Validator;
use Image;
use Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function register()
     {
       return view('users.register');
     }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request,[
        'name'=>'required|max:50',
        'email'=>'required|email',
        'password'=>'required|min:6',
        'password_confirmation'=>'required|min:6'
      ]);
      User::create(array_merge($request->all(),['avatar'=>'/images/avatar.jpg']));
      return redirect('/');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function avatar()
    {
      return view('users.avatar');
    }
    public function changeAvatar(Request $request)
    {

      $file=$request->file('avatar');
        $input = array('image' => $file);
        $rules = array(
            'image' => 'image'
        );
        $validator = \Validator::make($input, $rules);
        if ( $validator->fails() ) {
            return \Response::json([
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()
            ]);

        }
      $destinationPath='uploads/';

      $filename=\Auth::user()->id.'_'.time().$file->getClientOriginalName();

      $file->move($destinationPath,$filename);
      Image::make($destinationPath.$filename)->fit(400)->save();
//      $user=User::find(Auth::user()->id);
//      $user->avatar='/'.$destinationPath.$filename;
//      $user->save();

      return \Response::json([
         'success'=>true,
          'avatar'=>'/'.$destinationPath.$filename
      ]);
    }
    public function cropAvatar(Request $request){
        $photo=mb_substr($request->get('photo'),1);
        $width=(int)$request->get('w');
        $height=(int)$request->get('h');
        $xAlign=(int)$request->get('x');
        $yAlign=(int)$request->get('y');

        Image::make($photo)->crop($width,$height,$xAlign,$yAlign)->save();

        $user=Auth::user();
        $user->avatar=$request->get('photo');
        $user->save();

        return redirect('/users/avatar');
    }
}
