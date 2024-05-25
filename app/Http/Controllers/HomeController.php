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
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $usersWithMostGenerateList = User::select('users.id', 'users.name')
            ->leftJoin('generate_list', 'users.id', '=', 'generate_list.user_id')
            ->leftJoin('imagework', 'generate_list.idgenerate_list', '=', 'imagework.idgenerate_list')
            ->selectRaw('users.id, users.name, COUNT(DISTINCT imagework.idimagework) AS total_imagework')
            ->groupBy('users.id', 'users.name')
            ->orderByDesc('total_imagework')
            ->limit(5)
            ->get();

        $monthlySales = Order::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, SUM(price_t) as total_sales')
            ->where('status4', '2')
            ->groupByRaw('YEAR(created_at), MONTH(created_at)')
            ->get();

        $countorderlistmm = Orderlist::whereHas('order', function ($query) {
            $query->where('status4', '1');
        })->where('status2', '2')->count();

        $countordertatezero = Order::where('status4', '1')->count();
        $orderCount = Order::count();

        $posts = Generatelist::all();

        $daysElapsedData = [
            'daysMoreThan30' => $posts->where('days_elapsed', '>=', 30)->count(),
            'daysBetween15And30' => $posts->whereBetween('days_elapsed', [15, 30])->count(),
            'daysBetween0And15' => $posts->whereBetween('days_elapsed', [0, 15])->count(),
        ];

        // โหลดความสัมพันธ์ user เพื่อป้องกันปัญหา N+1 query
        $comments = Comment::with('user')->get();
        $chat = Chat::with('user')->get();
        $unreadMessagesCount = Chat::where('is_read', 'false')->count();

        $users = User::all();
        $userCount = $users->count();

        return view('home', compact(
            'usersWithMostGenerateList',
            'monthlySales',
            'countorderlistmm',
            'countordertatezero',
            'orderCount',
            'comments',
            'chat',
            'unreadMessagesCount',
            'daysElapsedData',
            'userCount'
        ));
    }

    public function addform($id)
    {
        $reply = Replymas::all();
        $data = Chat::find($id);
        return view('replymas', compact('data', 'reply'));
    }

    public function addreplymas(Request $request, $id)
    {
        $ob = new Replymas();
        $ob->replymas = $request['replymas'];
        $ob->chat_idchat = $id;
        $ob->save();
        return redirect("home");
    }
}
