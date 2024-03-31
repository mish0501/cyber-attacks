<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class SQLInjectionController extends Controller
{
    public function index(Request $request)
    {
        $protection = filter_var($request->input('protection', true), FILTER_VALIDATE_BOOLEAN);
        $queries = [
            "true" => "DB::select(\"SELECT id, name, email, password FROM users WHERE id = ?\", [\$search])",
            "false" => "DB::select(\"SELECT id, name, email, password FROM users WHERE id = \$search\")"
        ];

        $search = $request->input('search');
        $results = [];

        if ($search) {
            if ($protection) {
                $results = DB::select("SELECT id, name, email, password FROM users WHERE id = ?", [$search]);
            } else {
                $results = DB::select("SELECT id, name, email, password FROM users WHERE id = $search");
            }
        }

        return Inertia::render('SQLInjection/Index', compact('search', 'protection', 'results', 'queries'));
    }
}
