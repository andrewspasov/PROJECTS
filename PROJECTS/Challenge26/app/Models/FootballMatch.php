<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FootballMatch extends Model
{
    use HasFactory;

    protected $table = 'matches';


    protected $fillable = [
        'team_1_id',
        'team_2_id',
        'match_time',
        'score_team1',
        'score_team2',
    ];



    public function team1()
    {
        return $this->belongsTo(Team::class, 'team_1_id');
    }

    public function team2()
    {
        return $this->belongsTo(Team::class, 'team_2_id');
    }
    public function players()
    {
        return $this->belongsToMany(Player::class, 'match_player', 'match_id', 'player_id');
    }
}
