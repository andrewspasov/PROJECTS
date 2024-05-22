<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeamRequest;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::all();
        return view('show_teams', compact('teams'));
    }

    public function create()
    {
        return view('create_team');
    }

    public function store(StoreTeamRequest $request)
    {
        Team::create($request->validated());
        return redirect()->route('teams.index')->with('success', 'Team successfully added.');
    }

    public function edit(Team $team)
    {
        return view('edit_team', compact('team'));
    }

    public function update(StoreTeamRequest $request, Team $team)
    {
        $team->update($request->validated());
        return redirect()->route('teams.index')->with('success', 'Team successfully updated.');
    }
    
    public function destroy(Team $team)
    {
        $team->delete();
        return redirect()->route('teams.index')->with('success', 'Team successfully deleted.');
    }
}
