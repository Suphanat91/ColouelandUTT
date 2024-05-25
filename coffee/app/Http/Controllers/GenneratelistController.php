<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Orderlist;
use App\Models\Generate;
use App\Models\Generatelist;
use App\Models\User;

class GenneratelistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    //     $orderItems = Orderlist::where('order_idorder')->where('status', 2)->get();

    // // ส่งข้อมูลไปยัง view และแสดงผล
    // return view('orderlist', compact('orderItems'));
    // $orderItems = Orderlist::where('status', 2)->get();
    // $orderItems = Orderlist::whereIn('status2', ['2', '5'])->get(); // ตรวจสอบว่าค่าใน ENUM เป็น string หรือไม่
    $orderItems = Orderlist::whereHas('order', function ($query) {
        $query->where('status4', '1');;
    })
    ->where('status2', '2')
    ->get();

// return view('your_view', compact('records'));

    // $orderItems = OrderList::where('status2', '2')
    //                 ->whereNotNull('slip')
    //                 ->get();
        // dd($orderItems);
// ส่งข้อมูลไปยัง view และแสดงผล
return view('generatelist', ['orderItems' => $orderItems]);

    

        // dd($orderItems);
    // ส่งข้อมูลไปยัง view และแสดงผล
    // return view('orderlist', compact('orderItems'));


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
        $generatelist = Generatelist::all();

        // ส่งข้อมูลไปยัง view และแสดงผล
        return view('allgeneratelist', compact('generatelist'));

// return view('generate', ['generateItems' => $generateItems]);

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
    public function addform($id)
    {
         $generatelist = Generatelist::all();
          $data1 =   Generate::with('folwer', 'user')->get();
        $data = Orderlist::find($id);
        $users = User::where('status', 'user')->get(); // Fetch users with status 'user'


        return view('generatelist1',compact('data','generatelist','data1','users'));
    }


    public function generatelist(Request $request,$id)
    {
        $ob = new Generatelist();
        $ob->user_id = $request ['user_id'];
        $ob->orderlist_idorderlist = $id;
        $ob->count_plant = $request ['count_plant'];
        $ob->status3 = $request ['status3'];
        $ob->save();
        // return back()->with('success', 'อัปเดตสถานะเรียบร้อยแล้ว');
        return redirect('/generatelists');
    }

    public function updateStatus(Request $request)
    {
    $orderId = $request->input('order_idorder');
    $status = $request->input('status2');

    if ($orderId && $status) {
        OrderList::where('idorderlist', $orderId)
                 ->update(['status2' => $status]); // อัปเดตสถานะตามค่าที่รับมา
        return back()->with('success', 'อัปเดตสถานะเรียบร้อยแล้ว');
    }

    return back()->with('error', 'ต้องการ Order ID และสถานะ');
    }
    public function allgeneratelist()
    {
        $generatelist = Generatelist::all();

        // ส่งข้อมูลไปยัง view และแสดงผล
        return view('allgeneratelist', compact('generatelist'));
        // return('uuu');
// return view('generate', ['generateItems' => $generateItems]);

    }

}
