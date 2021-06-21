<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categories')->insert([
            'title'=>'selling and closes',
            'description'=>'selling and closes'
        ]);
        DB::table('categories')->insert([
            'title'=>'enterpreneur',
            'description'=>'selling and closes'
        ]);
        DB::table('categories')->insert([
            'title'=>'get motivated',
            'description'=>'selling and closes'
        ]);
        DB::table('categories')->insert([
            'title'=>'mortgage',
            'description'=>'selling and closes'
        ]);
        DB::table('categories')->insert([
            'title'=>'rants',
            'description'=>'selling and closes'
        ]);
        DB::table('categories')->insert([
            'title'=>'video marketing',
            'description'=>'video marketing'
        ]); DB::table('categories')->insert([
            'title'=>'news',
            'description'=>'video marketing'
        ]);DB::table('categories')->insert([
            'title'=>'advertising and marketing',
            'description'=>'video marketing'
        ]);DB::table('categories')->insert([
            'title'=>'instagram marketing',
            'description'=>'video marketing'
        ]);DB::table('categories')->insert([
            'title'=>'podcasts',
            'description'=>'video marketing'
        ]);DB::table('categories')->insert([
            'title'=>'social media',
            'description'=>'video marketing'
        ]);DB::table('categories')->insert([
            'title'=>'videos',
            'description'=>'video marketing'
        ]);DB::table('categories')->insert([
            'title'=>'lead generation',
            'description'=>'video marketing'
        ]);DB::table('categories')->insert([
            'title'=>'book reviews',
            'description'=>'video marketing'
        ]);DB::table('categories')->insert([
            'title'=>'facebook marketing',
            'description'=>'video marketing'
        ]);DB::table('categories')->insert([
            'title'=>'insurance',
            'description'=>'video marketing'
        ]);DB::table('categories')->insert([
            'title'=>'real estate',
            'description'=>'video marketing'
        ]);DB::table('categories')->insert([
            'title'=>'technology',
            'description'=>'video marketing'
        ]);DB::table('categories')->insert([
            'title'=>'b2b sales',
            'description'=>'video marketing'
        ]);DB::table('categories')->insert([
            'title'=>'car sales',
            'description'=>'video marketing'
        ]);DB::table('categories')->insert([
            'title'=>'funnels',
            'description'=>'video marketing'
        ]);DB::table('categories')->insert([
            'title'=>'mindsets',
            'description'=>'video marketing'
        ]);DB::table('categories')->insert([
            'title'=>'rewire podcast',
            'description'=>'video marketing'
        ]);DB::table('categories')->insert([
            'title'=>'thc podcast',
            'description'=>'video marketing'
        ]);
    }
}
