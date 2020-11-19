<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Cart::add('293as', 'Product 2', 1, 9.99, 550);
        // dd(Cart::content());
        // Cart::destroy();
        // <input type="hidden" class="kh_id{{$item->sp_id}}" value=" {{Auth::id()}} ">
        $sanpham =DB::table('sanpham')->get();
        return view('banvang.sanpham.index',compact('sanpham'));
    }
}
