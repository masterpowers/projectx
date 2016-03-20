<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    public function handle($request, Closure $next)
    {
        $roles = $this->getRequiredRoleForRoute($request->route());
        
        if ($request->user()->hasRole($roles) || !$roles) {
            return $next($request);
        }

        return response([
            'error' => [
                'code' => '401',
                'description' => 'UNAUTHORIZED ACCESS!',
            ],
        ], 401);
    }

    private function getRequiredRoleForRoute($route)
    {
        $actions = $route->getAction();

        return isset($actions['roles']) ? $actions['roles'] : null;
    }
}

