<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       DB::table('categories')->insert([
        ['name' => 'Politics', 'name_kh' => 'នយោបាយ', 'slug' => 'politics'],
        ['name' => 'Technology', 'name_kh' => 'បច្ចេកវិទ្យា', 'slug' => 'technology'],
        ['name' => 'Health', 'name_kh' => 'សុខភាព', 'slug' => 'health'],
        ['name' => 'Sports', 'name_kh' => 'កីឡា', 'slug' => 'sports'],
        ['name' => 'Entertainment', 'name_kh' => 'កម្សាន្ត', 'slug' => 'entertainment'],
        ['name' => 'Business', 'name_kh' => 'អាជីវកម្ម', 'slug' => 'business'],
        ['name' => 'Education', 'name_kh' => 'ការអប់រំ', 'slug' => 'education'],
        ['name' => 'Environment', 'name_kh' => 'បរិស្ថាន', 'slug' => 'environment'],
        ['name' => 'Travel', 'name_kh' => 'ដំណើរកំសាន្ត', 'slug' => 'travel'],
        ['name' => 'Lifestyle', 'name_kh' => 'របៀបរស់នៅ', 'slug' => 'lifestyle'],
        ['name' => 'Science', 'name_kh' => 'វិទ្យាសាស្ត្រ', 'slug' => 'science'],
    ]);


        DB::table('categories')->insert($categories);
    }
}
