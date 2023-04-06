<?php

namespace Database\Seeders;

use App\Models\PageViewLog;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageViewLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $startDate = Carbon::now()->subMonths(6);
        $pages = ['about', 'home'];

        for ($i = 0; $i < 180; $i++) {
            $date = $startDate->copy()->addDays($i);
            $viewsCount = rand(1, 5);
            $user = ($i%3==0) ? null : User::all()->random()->id;

            for ($j = 0; $j < $viewsCount; $j++) {
                $viewsPage = rand(0, 1);
                DB::table('page_view_logs')->insert([
                    'url' => $pages[$viewsPage],
                    'user_id' => $user,
                    'created_at' => $date,
                    'updated_at' => $date
                ]);
            }
        }
    }
}
