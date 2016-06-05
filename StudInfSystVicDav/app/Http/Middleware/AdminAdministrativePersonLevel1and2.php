<?php

namespace App\Http\Middleware;
use Illuminate\Contracts\Auth\Guard;
use Closure;

class AdminAdministrativePersonLevel1and2
{
    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }
   
    public function handle($request, Closure $next)
    {
        if ($this->auth->user()->type == 'admin' || $this->auth->user()->type == 'administrativePersonLevel1' || $this->auth->user()->type == 'administrativePersonLevel2') 
        {
            return $next($request);
           
        }
        else
        {
             // $this->auth->logout();
            
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('notAutorized');
            }
        }

    
    }
}
