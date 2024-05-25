<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use App\Models\Chat;
use App\Models\User;
use App\Models\Replymas;
use App\Models\Generatelist;
use App\Models\Orderlist;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

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
        // $monthlySales = Order::selectRaw('MONTH(created_at) as month, SUM(price_t) as total_sales')
        // ->where('status4', 2)
        // ->groupByRaw('MONTH(created_at)')
        // ->get();
        // dd($monthlySales);

        // $userWithMostGenerateList = User::select('users.id', 'users.name', DB::raw('COUNT(generate_lists.id) AS total_generate_list'))
        //     ->leftJoin('generate_lists', 'users.id', '=', 'generate_lists.user_id')
        //     ->groupBy('users.id', 'users.name')
        //     ->orderByDesc('total_generate_list')
        //     ->limit(1)
        //     ->first();
        //     
        $usersWithMostGenerateList = User::select('users.id', 'users.name')
            ->leftJoin('generate_list', 'users.id', '=', 'generate_list.user_id')
            ->leftJoin('imagework', 'generate_list.idgenerate_list', '=', 'imagework.idgenerate_list')
            ->selectRaw('users.id, users.name, COUNT(DISTINCT imagework.idimagework) AS total_imagework')
            ->groupBy('users.id', 'users.name')
            ->orderByDesc('total_imagework')
            ->limit(5)
            ->get();
            // dd($usersWithMostImageWorks);
    
        $monthlySales = Order::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, SUM(price_t) as total_sales')
        ->where('status4', '2')
        ->groupByRaw('YEAR(created_at), MONTH(created_at)')
        ->get();
    
        // dd($monthlySales);
        $countorderlistmm = Orderlist::whereHas('order', function ($query) {
            $query->where('status4', '1');
        })
        ->where('status2', '2')
        ->count();
    
        $countordertatezero = Order::whereIn('status4', ['1'])->count();

        $orderCount = Order::count();

        $posts = Generatelist::all(); // หรือใช้เงื่อนไขอื่น ๆ เพื่อดึงข้อมูล posts จากฐานข้อมูล

        $daysElapsedData = [
            'daysMoreThan30' => $posts->where('days_elapsed', '>=', 30)->count(), // ตั้งแต่ 30 วันขึ้นไป
            'daysBetween15And30' => $posts->whereBetween('days_elapsed', [15, 30])->count(), // 15 ถึง 30 วัน
            'daysBetween0And15' => $posts->whereBetween('days_elapsed', [0, 15])->count(), // 0 ถึง 15 วัน
        ];
        // return response()->json($daysElapsedData);
        
    // dd($daysElapsedData);

    // return view('home', compact('daysElapsedData'));
        $comments = Comment::all(); // หรือจะดึงข้อมูลในรูปแบบอื่น ๆ ก็ได้
        $chat = Chat::all(); // หรือจะดึงข้อมูลในรูปแบบอื่น ๆ ก็ได้
        $unreadMessagesCount = Chat::where('is_read', 'false')->count();

        // Using compact
        // return view('home', compact('unreadMessagesCount'));  
        // $items = Item::all();
        $countorderlist = OrderList::where('status2', '1')->count();
        $countorderlist1 = OrderList::where('status2', '3')->count();
        $countorderlist2 = OrderList::where('status2', '5')->count();


        // นับจำนวนแถวข้อมูลที่ดึงมา
        $count = Comment::count();
        // $count = Chat::count();
        
        $users = User::all();

        
        $userCount = $users->count();

// ส่งข้อมูลไปยัง view และแสดงผล
// return view('yourViewName', ['users' => $users, 'userCount' => $userCount]);


        // ส่งข้อมูลไปยัง View
        // return view('your.view', compact('items', 'count'));
        return view('home',  compact('usersWithMostGenerateList','monthlySales','countorderlistmm','countordertatezero','orderCount','comments','chat', 'count','userCount','countorderlist','countorderlist1','countorderlist2','unreadMessagesCount','daysElapsedData'));
       
        // $comments = Comment::all(); // หรือจะดึงข้อมูลในรูปแบบอื่น ๆ ก็ได้
        // return view('layouts.coffeetable', ['comments' => $comments]);
    }
    public function addform($id)
    {
        $reply = Replymas::all();
        $data = Chat::find($id);
        return view('replymas',compact('data','reply'));
        // return 'iii';
    }


    public function addreplymas(Request $request,$id)
    {
        
        $ob = new Replymas();
        $ob->replymas = $request ['replymas'];
        // $ob->user = $request ['user'];
        $ob->chat_idchat = $id;
        // $ob->massage = $mas;
        // dd($ob)
        $ob->save();
        return redirect("home");
    }



    // public function markAsRead($messageId)
    // {
    //     $message = Chat::findOrFail($messageId);
    //     $message->is_read = true;
    //     $message->save();

    //     // After marking as read, you can redirect back to the messages page or wherever is appropriate
    //     return redirect()->back()->with('status', 'Message marked as read');
    // }

    
}
