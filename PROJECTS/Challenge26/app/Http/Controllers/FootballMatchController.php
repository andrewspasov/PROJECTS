<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFootballMatchRequest;
use App\Models\FootballMatch;
use App\Models\Team;
use Illuminate\Http\Request;

class FootballMatchController extends Controller
{
    public function index()
    {
        $matches = FootballMatch::all();
        return view('show_matches', compact('matches'));
    }

    public function create()
    {
        $teams = Team::all();
        return view('create_match', compact('teams'));
    }

    public function store(StoreFootballMatchRequest $request)
    {
        $footballMatch = FootballMatch::create([
            'team_1_id' => $request->team1_id,
            'team_2_id' => $request->team2_id,
            'match_time' => $request->match_date,
        ]);

        if ($request->has('players')) {
            $footballMatch->players()->attach($request->players);
        }

        return redirect()->route('matches.index')->with('success', 'Match created successfully.');
    }

    public function edit(FootballMatch $match)
    {
        $teams = Team::all();
        return view('edit_match', compact('match', 'teams'));
    }

    public function update(StoreFootballMatchRequest $request, FootballMatch $match)
    {
        $match->update($request->validated());

        return redirect()->route('matches.index')->with('success', 'Match updated successfully.');
    }

    public function destroy(FootballMatch $match)
    {
        $match->delete();

        return redirect()->route('matches.index')->with('success', 'Match deleted successfully.');
    }
}
