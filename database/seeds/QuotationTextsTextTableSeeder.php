<?php

use Illuminate\Database\Seeder;

class QuotationTextsTextTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Projacked\Models\QuotationText::create([
            'title' => 'Introductie',
            'body' => 'Lorem ipsum'
        ]);
        \Projacked\Models\QuotationText::create([
            'title' => 'Projectplan',
            'body' => 'Lorem ipsum'
        ]);
        \Projacked\Models\QuotationText::create([
            'title' => 'Werkwijze',
            'body' => 'Lorem ipsum'
        ]);
        \Projacked\Models\QuotationText::create([
            'title' => 'Voorwaarden',
            'body' => 'Lorem ipsum'
        ]);
    }
}
