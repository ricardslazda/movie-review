<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoadMoreController extends Controller
{
    public function __invoke(Request $request)
    {
        if($request->expectsJson()) {
            if ($request->id > 0) {
                $data = DB::table('movies')
                    ->where('id', '<', $request->last_id)
                    ->orderBy('id', 'DESC')
                    ->limit(8)
                    ->get();
                return response()->json([
                    'movies' => $data
                ]);
            }
        }
    }
}
