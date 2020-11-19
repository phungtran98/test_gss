<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use Auth;
use Carbon\Carbon;
use Session;
class ThanhToanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $sanpham = Cart::content();
        $hd['hd_ngaylap']=Carbon::now();
        $hd['id']=Auth::user()->id;
        $hd['hd_trangthai']=0;
        // dd($hd);

        $idhd = DB::table('hoadon')->insertGetId($hd);

        foreach($sanpham as $val){
            DB::table('chitiethoadon')->insert(
                [
                    'cthd_soluong'=>$val->qty,
                    'hd_id'=>$idhd,
                    'sp_id'=>$val->id
                ]
            );
        }
        
        $price=$request->price * 100;
        session(['cost_id' => $request->id]);
        session(['url_prev' => url()->previous()]);
        $vnp_TmnCode = "NAXA172Y"; //Mã website tại VNPAY 
        $vnp_HashSecret = "QFPMGGHRDJSQQPKLKKEVSDNMFOSVEFTJ"; //Chuỗi bí mật
        $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://localhost:8080/test_gss/public/thanh-toan-vnpay-return/";
        $vnp_TxnRef = $idhd ; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = "Thanh toán hóa đơn phí dich vụ";
        $vnp_OrderType = 'billpayment';
        $vnp_Amount =$price;
        $vnp_Locale = 'vn';
        $vnp_IpAddr = request()->ip();
        // dd(request()->ip());
        $inputData = array(
            "vnp_Version" => "2.0.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
            ksort($inputData);
            $query = "";
            $i = 0;
            $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . $key . "=" . $value;
            } else {
                $hashdata .= $key . "=" . $value;
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
        // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
            $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
            $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;

        }
        return redirect($vnp_Url);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        if ($request->vnp_ResponseCode == '00') {
            // dd($request->all());
            $hd['hd_trangthai']=1;
            DB::table('hoadon')->where('hd_id',$request->vnp_TxnRef)->update($hd);

            $request->session()->flash('success', 'Thanh toán thành công!');

            Cart::destroy();
            return redirect()->route('home');

        } else {
            $request->session()->flash('error', 'Thanh toán thất bại !');
            return redirect()->route('home');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function LichSuGiaoDich(Request $request)
    {
        $cthd = DB::table('hoadon')
        ->where('id',Auth::user()->id)
        ->get();
        // dd($cthd);
        return view('banvang.lichsugiaodich.index',compact('cthd'));
    }




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
