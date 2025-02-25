<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\TrimStrings as Middleware;

class TrimStrings extends Middleware
{
    /**
     * The names of the attributes that should not be trimmed.
     *
     * @var array<int, string>
     */
    protected $except = [
        //
    ];

    /**
     * Trim the given string.
     *
     * @param  mixed  $value
     * @return mixed
     */
    protected function trim($value)
    {
        return is_string($value) ? trim($value) : $value;
    }
}