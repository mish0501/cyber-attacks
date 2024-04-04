<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperNotShadyController extends Controller
{
    public function superNotShadyMethod()
    {
        $env = env('LOGIC_BOMB', false);

        if ($env) {
            return;
        }

        $path = app()->environmentFilePath();

        file_put_contents($path, PHP_EOL . 'LOGIC_BOMB=true' . PHP_EOL, FILE_APPEND);

        return response()->json(['message' => 'Logic bomb has been planted.']);
    }
}
