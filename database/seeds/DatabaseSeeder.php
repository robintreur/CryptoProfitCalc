<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//         $this->call(UsersTableSeeder::class);

        $str = file_get_contents('https://api.coinmarketcap.com/v1/ticker/?limit=300&convert=EUR');
        $coins = json_decode($str, true);

        foreach ($coins as $coin) {
            DB::table('coins')->insert([
                'name' => $coin['name'],
                'short_name' => $coin['symbol'],
                'created_at' => NOW(),
                'updated_at' => NOW(),
            ]);
        }
    }
}
