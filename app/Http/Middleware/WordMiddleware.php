<?php

namespace App\Http\Middleware;

use App\Word;
use Closure;

class WordMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //ユーザが入力した値をチェックして補正する
        $this->validate($request, Word::$rules);
        $form = $request->all();
        unset($form['_token']);
        
        return $next($form);
    }
    
}
