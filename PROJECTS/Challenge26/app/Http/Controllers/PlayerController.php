<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlayerRequest;
use App\Models\Player;
use App\Models\Team;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function index()
    {
        $players = Player::all();
        return view('show_players', compact('players'));
    }

    public function create()
    {
        $teams = Team::all();
        return view('create_player', compact('teams'));
    }

    public function store(PlayerRequest $request)
    {
        Player::create($request->validated());
        return redirect()->route('players.index')->with('success', 'Player created successfully.');
    }

    public function edit(Player $player)
    {
        $teams = Team::all();
        return view('edit_player', compact('player', 'teams'));
    }

    public function update(PlayerRequest $request, Player $player)
    {
        $player->update($request->validated());
        return redirect()->route('players.index')->with('success', 'Player updated successfully.');
    }


    public function destroy(Player $player)
    {
        $player->delete();

        return redirect()->route('players.index')->with('success', 'Player deleted successfully.');
    }


    public function fetchPlayers($teamId)
    {
        $players = Player::where('team_id', $teamId)->get();
        return response()->json($players);
    }

}
