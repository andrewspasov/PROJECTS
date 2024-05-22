<?php


// use Illuminate\Console\Command;
// use App\Models\FootballMatch;
// use Carbon\Carbon;

// class UpdateMatchResults extends Command
// {
//     protected $signature = 'matches:update-results';
//     protected $description = 'Update results of matches played in the last 24 hours';

//     public function handle()
//     {
//         $matchesToUpdate = FootballMatch::where('match_time', '<', Carbon::now('CEST'))
//             ->whereNull('score_team_1')
//             ->whereNull('score_team_2')
//             ->get();

//         foreach ($matchesToUpdate as $match) {
//             $match->update([
//                 'score_team_1' => rand(0, 5),
//                 'score_team_2' => rand(0, 5),
//             ]);
//         }

//         $this->info('Match results updated successfully!');
//     }
// }

namespace App\Console\Commands;

use App\Models\FootballMatch;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;


class UpdateMatchResults extends Command
{
    protected $signature = 'matches:update-results';
    protected $description = 'Update results of matches played in the last 24 hours';

    public function handle()
    {
        Log::info("Running UpdateMatchResults command.");

        $now = Carbon::now();
        Log::info("Current time: " . $now);

        $matchesToUpdate = FootballMatch::where('match_time', '<=', $now)
            ->whereNull('score_team_1')
            ->whereNull('score_team_2')
            ->get();

        Log::info("Matches to update: " . $matchesToUpdate->count());

        foreach ($matchesToUpdate as $match) {
            $match->score_team_1 = rand(0, 7);
            $match->score_team_2 = rand(0, 7);
            $match->save();

            Log::info("Updated match with ID {$match->id} scores to: {$match->score_team_1} - {$match->score_team_2}");
        }

        $this->info('Match results updated successfully!');
    }
}
