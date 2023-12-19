<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Kanji;

class KanjiController extends Controller
{
    public function index()
    {
        $kanji = Kanji::all();
        return response()->json($kanji);
    }
}