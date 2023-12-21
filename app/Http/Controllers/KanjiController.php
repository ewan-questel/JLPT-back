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

    public function show($id)
    {
        $kanji = Kanji::find($id);

        if (!$kanji) {
            return response()->json(['error' => 'Kanji not found'], 404);
        }

        return response()->json($kanji);
    }
}