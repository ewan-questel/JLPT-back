<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Kana;

class KanaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Read kana data from JSON file
        $jsonFilePath = database_path('json/kana.json');
        $kanaData = json_decode(file_get_contents($jsonFilePath), true);

        // Insert data into the kana table
        foreach ($kanaData['hiragana'] as $character => $pronunciation) {
            Kana::create([
                'character' => $character,
                'pronunciation' => $pronunciation,
            ]);
        }

        foreach ($kanaData['katakana'] as $character => $pronunciation) {
            Kana::create([
                'character' => $character,
                'pronunciation' => $pronunciation,
            ]);
        }
    }
}