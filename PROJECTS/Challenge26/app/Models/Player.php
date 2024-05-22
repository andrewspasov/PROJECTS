<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'surname',
        'date_of_birth',
        'team_id',
    ];

    protected $dates = ['date_of_birth'];


    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function matches()
    {
        return $this->belongsToMany(FootballMatch::class, 'match_player');
    }


}
