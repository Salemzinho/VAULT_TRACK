<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use App\Models\Game;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::all();

        $parameters = [
            'games' => $games,
        ];

        return view('games.index', $parameters);
    }

    public function create()
    {
        return view('games.create');
    }

    public function view($id)
    {
        $game = Game::findOrFail($id);

        $parameters = [
            'game' => $game,
        ];

        return view('games.view', $parameters);
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'data_de_lancamento' => 'required|integer|min:1970|max:' . date('Y'),
            'data_de_finalizacao' => 'nullable|date',
            'plataforma' => 'nullable|string|max:255',
            'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'review' => 'nullable|string',
            'review_link_steam' => 'nullable|url',
        ]);

        $banner_path = null;
        if ($request->hasFile('banner')) {
            $banner = $request->file('banner');
            $extension = $banner->getClientOriginalExtension();
            $banner_name = strtolower(str_replace(' ', '-', $request->input('titulo'))) . '-' . $request->input('data_de_lancamento') . '.' . $extension;
            $banner->storeAs('public/games', $banner_name);
            $banner_path = '/storage/games/' . $banner_name;
        }

        $game = new Game();
        $game->titulo = $request->input('titulo');
        $game->data_de_lancamento = $request->input('data_de_lancamento');
        $game->data_de_finalizacao = $request->input('data_de_finalizacao');
        $game->plataforma = $request->input('plataforma');
        $game->banner = $banner_path;
        $game->review = $request->input('review');
        $game->review_link_steam = $request->input('review_link_steam');
        $game->save();

        return redirect()->route('games.index')->with('success', 'Game adicionado com sucesso!');
    }

    public function edit($id)
    {
        $game = Game::findOrFail($id);

        $parameters = [
            'game' => $game,
        ];

        return view('games.edit', $parameters);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'data_de_lancamento' => 'required|integer|min:1970|max:' . date('Y'),
            'data_de_finalizacao' => 'nullable|date',
            'plataforma' => 'nullable|string|max:255',
            'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'review' => 'nullable|string',
            'review_link_steam' => 'nullable|url',
        ]);

        $game = Game::findOrFail($id);

        if($request->hasFile('banner')) {
            $banner = $request->file('banner');
            $extension = $banner->getClientOriginalExtension();
            $banner_name = strtolower(str_replace(' ', '-', $request->input('titulo'))) . '-' . $request->input('data_de_lancamento') . '.' . $extension;
            $banner->storeAs('public/games', $banner_name);
            $game->banner = '/storage/games/' . $banner_name;
        }

        $game->titulo = $request->input('titulo');
        $game->data_de_lancamento = $request->input('data_de_lancamento');
        $game->data_de_finalizacao = $request->input('data_de_finalizacao');
        $game->plataforma = $request->input('plataforma');
        $game->review = $request->input('review');
        $game->review_link_steam = $request->input('review_link_steam');
        $game->save();

        return redirect()->back()->with('success', 'Game atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $game = Game::findOrFail($id);

        if($game->banner) {
            Storage::delete('producoes_audiovisuais/' . $game->banner);
        }

        $game->delete();

        return redirect()->route('game.index')->with('success', 'Game excluído com sucesso!');
    }
}
