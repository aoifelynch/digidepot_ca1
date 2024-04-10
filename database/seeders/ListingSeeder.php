<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Listing;

class ListingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $listing1 = new Listing;
        $listing1->title = "Aurora PC";
        $listing1->condition = "New & Unused";
        $listing1->price = 3500.00;
        $listing1->category_id = 2;
        $listing1->description = "New PC, Barely Used, Full Spec";
        $listing1->user_id = 1;
        $listing1->listing_image = "phoneCategory.jpg";
        $listing1->save();

        $listing2 = new Listing;
        $listing2->title = "Alienware Cage";
        $listing2->condition = "Used, Like New";
        $listing2->price = 200.00;
        $listing2->category_id = 2;
        $listing2->description = "Alienware PC Cage";
        $listing2->user_id = 1;
        $listing2->listing_image = "aurora.jpg";
        $listing2->save();

        $listing3 = new Listing;
        $listing3->title = "iPhone 14";
        $listing3->condition = "Parts Only";
        $listing3->price = 100.00;
        $listing3->category_id = 5;
        $listing3->description = "iPhone 14 Purple. Parts Only, doesn't turn on";
        $listing3->user_id = 1;
        $listing3->listing_image = "iphone.jpg";
        $listing3->save();

        $listing4 = new Listing;
        $listing4->title = "iPad Pro";
        $listing4->condition = "New & Unused";
        $listing4->price = 700.00;
        $listing4->category_id = 3;
        $listing4->description = "Mint Condition iPad Pro, 256gb. Comes with Apple Pencil";
        $listing4->user_id = 1;
        $listing4->listing_image = "ipad.jpg";
        $listing4->save();
    }
}
