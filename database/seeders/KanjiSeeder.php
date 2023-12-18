<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kanji;

class KanjiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Load data from kanji.json
        $jsonPath = database_path('json/kanji.json');
        $jsonData = file_get_contents($jsonPath);
        $data = json_decode($jsonData, true);

        // Insert data into the kanji table
        foreach ($data as $character => $kanjiData) {
            // Check if jlpt_new is not null before inserting
            if (!is_null($kanjiData['jlpt_new'])) {
                Kanji::create([
                    'character' => $character,
                    'strokes' => $kanjiData['strokes'],
                    'grade' => $kanjiData['grade'],
                    'frequency' => $kanjiData['freq'],
                    'jlpt_level' => $kanjiData['jlpt_new'],
                    'meanings' => implode(', ', $kanjiData['meanings']),
                    'readings_on' => implode(', ', $kanjiData['readings_on']),
                    'readings_kun' => implode(', ', $kanjiData['readings_kun']),
                    'radicals' => implode(', ', $kanjiData['wk_radicals'] ?? []),
                    // Add other attributes as needed
                ]);
            }
        }
    }
}