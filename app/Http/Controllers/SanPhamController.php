<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use Auth;
class SanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function ajaxAddCart(Request $request)
    {
        if($request->ajax()){

            $sp_id = $request->sp;
            // $kh_id =Auth::id();
          
            $sanpham = DB::table('sanpham')->where('sp_id',$sp_id)->first();
            // Cart::destroy();
            $data['id']=$sp_id;
            $data['name']=$sanpham->sp_ten;
            $data['qty']=1;
            $data['price']=$sanpham->sp_gia;
            $data['weight']=100;

            if(Cart::add($data)){
                $success=1;
                return response()->json($success , 200);
            } return response()->json($success , 404);;


        }
    }


    public function store(Request $request)
    {
        //
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
}
