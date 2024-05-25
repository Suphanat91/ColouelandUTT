<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User; // Import Model ที่ต้องการใช้งาน

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // ตรวจสอบสถานะของผู้ใช้งานว่าเป็น admin หรือไม่
        $user = User::find(auth()->id());

        if ($user && $user->status !== 'admin') {
            // ถ้าไม่ใช่ admin ให้ redirect ไปยังหน้าที่เหมาะสม
            return redirect()->route('failed');
        }

        return $next($request);
    }
}
