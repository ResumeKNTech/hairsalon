<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Checklogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            if (Auth::user()->status === 1) {
                $user = $request->user();
                if ($user->level === 1) {
                    // Kiểm tra địa chỉ URL của request hiện tại
                    $routeName = $request->route()->getName();
                    if (
                        !in_array($routeName, [
                            'admin.booking.index',
                            'admin.booking.create',
                            'admin.booking.store',
                            'admin.booking.edit',
                            'admin.booking.getProduct',
                            'admin.booking.getTime',
                            'admin.booking.getBarber',
                            'admin.booking.getDate',
                            'admin.booking.getPrice',
                            'admin.booking.getValue',
                            'admin.booking.getPhone_Email',
                            'admin.date_off.index',
                            'admin.date_off.create',
                            'admin.day_off_barber.edit',
                            'admin.date_off.store',
                            'admin.date_off.getPhone_Email_Barber',
                            'admin.barber.getPhone_Email_Barber',

                        ])
                    ) {
                        return redirect()->back()->with('error', 'Bạn không có quyền này ! Vui lòng không nhấn ');
                    }
                }
                return $next($request);
            } else {
                return redirect()->route('login')->with('error', 'Vui lòng xin cấp quyền từ admin để truy cập');
            }
        }
    }

}
