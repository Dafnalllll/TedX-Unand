<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Visitor;

class TrackVisitor
{
    public function handle($request, Closure $next)
    {
        $sessionId = $request->session()->getId();
        Visitor::updateOrCreate(
            ['session_id' => $sessionId],
            ['last_activity' => now()]
        );
        return $next($request);
    }
}
