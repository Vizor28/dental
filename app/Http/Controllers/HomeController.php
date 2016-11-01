<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thooth;
use Auth;
use App\Clinic;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chaps=array();
        $chaps[1]=Thooth::where('chap_id',1)->orderby('sort','asc')->get();
        $chaps[2]=Thooth::where('chap_id',2)->orderby('sort','asc')->get();

        $theeth_change=array();
        $theeth_change=Auth::user()->register->registerable->change_theeth;



        return view('home',array('chaps'=>$chaps,'theeth_change'=>$theeth_change));
    }

    public function history(){
        $menu='history';
        return view('history',['menu'=>$menu]);
    }
    public function records(){

        $chaps=array();
        $chaps[1]=Thooth::where('chap_id',1)->orderby('sort','asc')->get();
        $chaps[2]=Thooth::where('chap_id',2)->orderby('sort','asc')->get();

        $theeth_change=array();
        $theeth_change=Auth::user()->register->registerable->change_theeth;




        $menu='records';
        return view('records',['menu'=>$menu,'chaps'=>$chaps,'theeth_change'=>$theeth_change]);
    }
    public function recommendations(){
        $menu='recommendations';
        return view('recommendations',['menu'=>$menu]);
    }
    public function medicines(){
        $menu='medicines';
        return view('medicines',['menu'=>$menu]);
    }
    public function clinics(){

        $clinics=array();
        $clinics=Clinic::all();

        $menu='clinics';
        return view('clinics',['menu'=>$menu,'clinics'=>$clinics]);
    }
    public function doctors(){
        $menu='doctors';
        return view('doctors',['menu'=>$menu]);
    }
}
