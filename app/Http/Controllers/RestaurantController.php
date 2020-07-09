<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;
use Session;
use App\User;
use Crypt;
class RestaurantController extends Controller
{
    function index(){
        return view('/home');
    }

    function list(){
        $data = Restaurant::all();
       // return $data;
        if($data->count()>0)
        return view('list',['data'=>$data]);
        else{
            return redirect('/')->with('result',"Data Not found");
        }
       // return view('list',['data',$data]);
    }

    function add(Request $req){
        $resto = new Restaurant();
        $resto->name = $req->name;
        $resto->email = $req->email;
        $resto->address = $req->address;
        $result = $resto->save();
        //$resto->session()->flash('status','Your Data Has Been Summited Successfully');
        if($result){
            $req->session()->flash('status','Your Data Has Been Summited Successfully !!');
            return redirect('list')->with('result','success');
        }else{
            $req->session()->flash('status','Your Data Not Inserted !!');
            return redirect('list')->with('result','failed');
        }
    }

    function delete($id){
        Restaurant::find($id)->delete();
        Session::flash('status','Your Data Deleted Successfully !!');
            return redirect('list')->with('result','failed');
    }
    function edit($id){
        $data = Restaurant::find($id);
        //Session::flash('status','Your Data Deleted Successfully !!');
            return view('edit',['data'=>$data]);
    }
    function update(Request $req){
         $resto = Restaurant::find($req->input('id'));
        $resto->name = $req->name;
        $resto->email = $req->email;
        $resto->address = $req->address;
        $result = $resto->update();
        Session::flash('status','Your Data Updated Successfully !!');
        return redirect('list');
    }

    function register(Request $req){
     //   echo Crypt::encrypt(';hi this is ajay');
       // return $req->all();
        $user = new User();
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = Crypt::encrypt($req->password);
        $user->address = $req->address;
        $user->contact = $req->contact;
        //$user->save();

        $result = $user->save();
        $req->session()->put('user',$req->name);
        return redirect('/');
        //$resto->session()->flash('status','Your Data Has Been Summited Successfully');
        // if($result){
        //     $req->session()->flash('status','Your Data Has Been Summited Successfully !!');
        //     return redirect('list')->with('result','success');
        // }else{
        //     $req->session()->flash('status','Your Data Not Inserted !!');
        //     return redirect('list')->with('result','failed');
        // }
    }
    function login(Request $req){
       $user = User::where('email',$req->input('email'))->get();
      // return $user;
       if(Crypt::decrypt($user[0]->password) == $req->input('password')){
           $req->session()->put('user',$user[0]->name);
           return redirect('/');
       }
      // return redirect('list');
   }
}
