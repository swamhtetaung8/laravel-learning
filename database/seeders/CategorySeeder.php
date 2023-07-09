<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['Food', 'Sports', 'Local News', 'International News', 'ICT', 'Celebraties', 'Breaking News'];
        $arr = [];
        foreach ($categories as $category) {
            $arr[] = [
                'title' => $category,
                'slug' => Str::slug($category),
                'user_id' => 11,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        Category::insert($arr);
    }
}
