<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
        'Politics',
        'Economy',
        'Technology',
        'Health',
        'Environment',
        'Education',
        'Sports',
        'Culture',
        'World',
        'Entertainment',
    ];

    foreach ($tags as $tagName) {
        Tag::create([
            'name' => $tagName,
            'slug' => Str::slug($tagName),
        ]);
    }

    }
}
