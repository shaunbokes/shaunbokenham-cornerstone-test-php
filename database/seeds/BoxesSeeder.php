<?php

use Illuminate\Database\Seeder;

use App\Box;

/**
 * Class BoxesSeeder
 */
class BoxesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Box::create([
            'sku' => 'RZCRM',
            'description' => 'Shave Cream and Razor Box',
            'price' => 22,
            'quantity' => 10004
        ]);

        Box::create([
            'sku' => 'RZGEL',
            'description' => 'Shave Gel and Razor Box',
            'price' => 25,
            'quantity' => 9998
        ]);

        Box::create([
            'sku' => 'RXBLM',
            'description' => 'Shave Balm and Razor Box',
            'price' => 23,
            'quantity' => 10000
        ]);
    }
}
