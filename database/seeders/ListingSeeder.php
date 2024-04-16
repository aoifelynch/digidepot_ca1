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
        $listing3->category_id = 1;
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

        $listing5 = new Listing;
        $listing5->title = "Samsung Galaxy S24 Ultra";
        $listing5->condition = "Used, Like New";
        $listing5->price = 1200.00;
        $listing5->category_id = 1;
        $listing5->description = "Mint Condition Phone. 500gb";
        $listing5->user_id = 2;
        $listing5->listing_image = "samsung.jpg";
        $listing5->save();

        $listing6 = new Listing;
        $listing6->title = "Intel Core i5-10400F Desktop Processor";
        $listing6->condition = "Major Wear";
        $listing6->price = 114.00;
        $listing6->category_id = 2;
        $listing6->description = "CPU";
        $listing6->user_id = 2;
        $listing6->listing_image = "cpu.webp";
        $listing6->save();

        $listing7 = new Listing;
        $listing7->title = "Microsoft Surface Go 3";
        $listing7->condition = "Small Wear";
        $listing7->price = 114.00;
        $listing7->category_id = 4;
        $listing7->description = "Laptop one year old";
        $listing7->user_id = 2;
        $listing7->listing_image = "surface.webp";
        $listing7->save();

        $listing8 = new Listing;
        $listing8->title = "Macbook Pro";
        $listing8->condition = "Parts Only";
        $listing8->price = 800.00;
        $listing8->category_id = 4;
        $listing8->description = "Laptop one year old";
        $listing8->user_id = 2;
        $listing8->listing_image = "macbook.jpg";
        $listing8->save();

        $listing9 = new Listing;
        $listing9->title = "Havit Mechanical Keyboard";
        $listing9->condition = "Used, Like New";
        $listing9->price = 120.00;
        $listing9->category_id = 5;
        $listing9->description = "Wired compact keyboard";
        $listing9->user_id = 2;
        $listing9->listing_image = "keyboard.webp";
        $listing9->save();
    }
}
