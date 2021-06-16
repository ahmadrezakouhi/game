<?php

namespace App\Http\Controllers;

use App\Answer;
use App\QuestionAnswer;
use App\Rank;
use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{
    public function index(){
        $users = User::where('user_type','user')->paginate(5);
        return view('user.index' , compact('users'));
    }

    public function create(){
        return view('user.create');
    }


    public function store(Request $request){
        User::create([
            'name'=>$request->get('name')
            ,
            'last_name'=>$request->get('last_name')
            ,
            'user_type'=>'user'
            ,
            'email'=>$request->get('email')
            ,
            'password'=>bcrypt($request->get('password'))
            ,
            'gender'=>$request->get('gender')
            ,
            'condition'=>$request->get('condition')
            ,
            'can_play'=>$request->get('can_play') == 'on' ? 1 : 0
            ,
            'can_answer'=>$request->get('can_answer')== 'on' ? 1 : 0
            ,
            'time'=>$request->get('time')
        ]);
        return redirect()->back()->with('message','کاربر مورد نظر افزوده شده');
    }


    public function edit($id){
        $user = User::findOrFail($id);
        return view('user.edit',compact('user'));

    }

    public function update($id,Request $request){
        if($request->get('can_play')){
            Rank::where('user_id',$id)->delete();
            Answer::where('user_id',$id)->delete();
            $user = User::findOrFail($id);
            $user->letter="";
            $user->save();
        }

        if($request->get('can_answer')){
            QuestionAnswer::where('user_id',$id)->delete();

        }

        if($request->get('password')){
            User::where('id',$id)->update([
                'password'=>bcrypt($request->get('password'))
            ]);
        }

        User::where('id',$id)->update([
            'name'=>$request->get('name')
            ,
            'last_name'=>$request->get('last_name')
            ,
            'user_type'=>'user'
            ,
            'email'=>$request->get('email')
            ,
            'gender'=>$request->get('gender')
            ,
            'condition'=>$request->get('condition')
            ,
            'can_play'=>$request->get('can_play') == 'on' ? 1 : 0
            ,
            'can_answer'=>$request->get('can_answer')== 'on' ? 1 : 0
            ,
            'time'=>$request->get('time')
        ]);
        return redirect()->to('users');
    }


    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back();
    }


}
