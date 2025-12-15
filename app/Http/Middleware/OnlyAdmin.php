<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class OnlyAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        // belum login → lempar ke login custom
        if (! Auth::check()) {
            return redirect()->route('login');
        }

        // sudah login tapi bukan admin
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Kamu bukan admin');
        }

        return $next($request);
    }
}
