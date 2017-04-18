<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;

class SessionsController extends Controller
{
    public function create()
    {
      return view('sessions.login');
    }
    public function store(Request $request)
    {
      $this->validate($request,[
        'email'=>'required|email|max:255',
        'password'=>'required'
      ]);
      $credentials=[
        'email'=>$request->email,
        'password'=>$request->password,
      ];
      if(Auth::attempt($credentials)){
        session()->flash('success','登陆成功');
        return redirect()->route('index','[Auth::user()]');
      }else{
        session()->flash('danger','登录失败');
        return redirect()->back();
      }
    }
    public function destroy()
    {
      Auth::logout();
      session()->flash('success','您已成功退出');
      return redirect()->route('index');
    }
}
