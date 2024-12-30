<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Disable foreign key checks to prevent issues during truncation
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Truncate the categories table to start fresh
        DB::table('categories')->truncate();

        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Define parent categories with their respective slugs
        $parentCategories = [
            ['name' => 'AUTOMOBILES', 'slug' => 'automobiles'],
            ['name' => 'BOATS', 'slug' => 'boats'],
            ['name' => 'BUSINESS AND INDUSTRIAL', 'slug' => 'business_and_industrial'],
            ['name' => 'COLLECTIBLES', 'slug' => 'collectibles'],
            ['name' => 'EPHEMERA', 'slug' => 'ephemera'],
            ['name' => 'FIREARMS', 'slug' => 'firearms'],
            ['name' => 'JEWELLERY and WATCHES', 'slug' => 'jewelry_and_watches'],
            ['name' => 'GOODS & SERVICES', 'slug' => 'goods_and_services'],
            ['name' => 'MILITARIA', 'slug' => 'militaria'],
            ['name' => 'NUMISMATICS', 'slug' => 'numismatics'],
            ['name' => 'PHILATELICS', 'slug' => 'philately'],
            ['name' => 'REAL ESTATE', 'slug' => 'real_estate'],
            ['name' => 'UNIQUE/ ODD/ INVALUABLES', 'slug' => 'unique_odds_invaluables'],
            ['name' => 'SPORTING COLLECTIBLES', 'slug' => 'sporting_collectibles'],
        ];

        // Insert parent categories and store their IDs
        $parentIds = [];
        foreach ($parentCategories as $parent) {
            $parentIds[$parent['slug']] = DB::table('categories')->insertGetId([
                'name' => $parent['name'],
                'slug' => $parent['slug'],
                'parent_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Define child categories with their respective slugs and parent slugs
        $childCategories = [
            // AUTOMOBILES
            ['name' => 'Cars', 'slug' => 'automobiles_cars', 'parent_slug' => 'automobiles'],
            ['name' => 'Trucks', 'slug' => 'automobiles_trucks', 'parent_slug' => 'automobiles'],
            ['name' => 'RVs', 'slug' => 'automobiles_rvs', 'parent_slug' => 'automobiles'],
            ['name' => 'ATVs and MCs', 'slug' => 'automobiles_atvs_mcs', 'parent_slug' => 'automobiles'],

            // BOATS
            ['name' => 'Sailboats', 'slug' => 'boats_sailboats', 'parent_slug' => 'boats'],
            ['name' => 'Speedboats', 'slug' => 'boats_speedboats', 'parent_slug' => 'boats'],
            ['name' => 'Yachts Other Watercrafts', 'slug' => 'boats_yachts_other_watercrafts', 'parent_slug' => 'boats'],

            // BUSINESS AND INDUSTRIAL
            ['name' => 'Machinery', 'slug' => 'business_and_industrial_machinery', 'parent_slug' => 'business_and_industrial'],
            ['name' => 'Manufacturing', 'slug' => 'business_and_industrial_manufacturing', 'parent_slug' => 'business_and_industrial'],
            ['name' => 'R&D', 'slug' => 'business_and_industrial_r_d', 'parent_slug' => 'business_and_industrial'],
            ['name' => 'Medical', 'slug' => 'business_and_industrial_medical', 'parent_slug' => 'business_and_industrial'],

            // COLLECTIBLES
            ['name' => 'Art', 'slug' => 'collectibles_art', 'parent_slug' => 'collectibles'],
            ['name' => 'Baseball Cards', 'slug' => 'collectibles_baseball_cards', 'parent_slug' => 'collectibles'],
            ['name' => 'Coins', 'slug' => 'collectibles_coins', 'parent_slug' => 'collectibles'],

            // EPHEMERA
            ['name' => 'Historical Documents', 'slug' => 'ephemera_historical_documents', 'parent_slug' => 'ephemera'],
            ['name' => 'Autographs', 'slug' => 'ephemera_autographs', 'parent_slug' => 'ephemera'],
            ['name' => 'Maps', 'slug' => 'ephemera_maps', 'parent_slug' => 'ephemera'],

            // FIREARMS
            ['name' => 'Antique / Relic', 'slug' => 'firearms_antique_relic', 'parent_slug' => 'firearms'],
            ['name' => 'Sporting', 'slug' => 'firearms_sporting', 'parent_slug' => 'firearms'],

            // NUMISMATICS
            ['name' => 'Rare Coins', 'slug' => 'numismatics_rare_coins', 'parent_slug' => 'numismatics'],
            ['name' => 'Bullion', 'slug' => 'numismatics_bullion', 'parent_slug' => 'numismatics'],
            ['name' => 'Paper Currency', 'slug' => 'numismatics_paper_currency', 'parent_slug' => 'numismatics'],

            // PHILATELICS
            ['name' => 'Rare Stamps', 'slug' => 'philately_rare_stamps', 'parent_slug' => 'philately'],

            // REAL ESTATE
            ['name' => 'Land', 'slug' => 'real_estate_land', 'parent_slug' => 'real_estate'],
            ['name' => 'SFH', 'slug' => 'real_estate_sfh', 'parent_slug' => 'real_estate'],
            ['name' => 'Condos', 'slug' => 'real_estate_condos', 'parent_slug' => 'real_estate'],
            ['name' => 'Vacation Homes', 'slug' => 'real_estate_vacation_homes', 'parent_slug' => 'real_estate'],
            ['name' => 'Commercial', 'slug' => 'real_estate_commercial', 'parent_slug' => 'real_estate'],

            // UNIQUE/ ODD/ INVALUABLES
            ['name' => 'Anything Under the Sun. Priceless', 'slug' => 'unique_odds_invaluables_anything_under_the_sun', 'parent_slug' => 'unique_odds_invaluables'],
        ];

        // Insert child categories
        foreach ($childCategories as $child) {
            // Ensure the parent exists
            if (isset($parentIds[$child['parent_slug']])) {
                DB::table('categories')->insert([
                    'name' => $child['name'],
                    'slug' => $child['slug'],
                    'parent_id' => $parentIds[$child['parent_slug']],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                // Optionally, handle the case where the parent slug does not exist
                $this->command->error("Parent category '{$child['parent_slug']}' not found for '{$child['name']}'");
            }
        }

        // Optionally, you can add standalone categories without children here if needed
        // Since all standalone categories are already inserted as parents with no children,
        // there's nothing more to do for them.

        $this->command->info('Categories seeded successfully!');
    }
}
