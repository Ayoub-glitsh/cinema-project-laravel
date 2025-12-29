<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class MinLength
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  int  $length     الطول الأدنى المطلوب
     * @param  string  $field    اسم الحقل الذي سيتم التحقق منه (مثال: 'name')
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $length, $field)
    {
        $value = $request->input($field);

        // نتحقق إذا كان الحقل موجوداً وطوله أقل من الحد المسموح
        if (!$value || strlen($value) < (int)$length) {
            return("Le champ {$field} doit contenir au moins {$length} caractères.");
        }

        return $next($request);
    }
}