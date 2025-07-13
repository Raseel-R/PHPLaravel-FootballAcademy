<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function index(Request $request)
    {
        $players    = Player::all();
        $editPlayer = $request->has('edit_id')
                        ? Player::find($request->input('edit_id'))
                        : null;

        return view('index', compact('players', 'editPlayer'));
    }

    public function store(Request $request)
    {
        // validate incoming
        $data = $request->validate([
            'name'  => 'required|string',
            'email' => 'required|email',
        ]);

        // insert
        Player::create($data);

        return redirect()
            ->route('players.index')
            ->with('success', 'Player added successfully.');
    }

    public function update(Request $request, Player $player)
    {
        $data = $request->validate([
            'name'  => 'required|string',
            'email' => 'required|email',
        ]);

        $player->update($data);

        return redirect()
            ->route('players.index')
            ->with('success', 'Player updated successfully.');
    }

    public function destroy(Player $player)
    {
        $player->delete();

        return redirect()
            ->route('players.index')
            ->with('success', 'Player deleted successfully.');
    }

    public function aboutUs()
    {
        return view('AboutUs');
    }

    public function contactUs()
    {
        return view('ContactUs');
    }
}
