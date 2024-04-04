<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class LogicBombController extends Controller
{
    public function index()
    {
        $logicBomb = env('LOGIC_BOMB', false);

        return Inertia::render('LogicBomb/Index', compact('logicBomb'));
    }
}
