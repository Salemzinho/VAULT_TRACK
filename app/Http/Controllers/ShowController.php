<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use App\Models\Show;

class ShowController extends Controller
{
    public function index()
    {
        $shows = Show::all();

        $parameters = [
            'shows' => $shows,
        ];

        return view('shows.index', $parameters);
    }

    public function create()
    {
        return view('shows.create');
    }

    public function view($id)
    {
        $show = Show::findOrFail($id);

        $parameters = [
            'show' => $show,
        ];

        return view('shows.view', $parameters);
    }

    public function store(Request $request)
    {
        $flyer_vertical_path = null;
        if ($request->hasFile('flyer_vertical')) {
            $file = $request->file('flyer_vertical');
            $name = 'flyer-vertical-' . time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/shows', $name);
            $flyer_vertical_path = '/storage/shows/' . $name;
        }

        $flyer_horizontal_path = null;
        if ($request->hasFile('flyer_horizontal')) {
            $file = $request->file('flyer_horizontal');
            $name = 'flyer-horizontal-' . time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/shows', $name);
            $flyer_horizontal_path = '/storage/shows/' . $name;
        }

        $foto_artista_path = null;
        if ($request->hasFile('foto_artista')) {
            $file = $request->file('foto_artista');
            $name = 'foto-artista-' . time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/shows', $name);
            $foto_artista_path = '/storage/shows/' . $name;
        }

        $fotos_paths = [];
        if ($request->hasFile('fotos')) {
            foreach ($request->file('fotos') as $file) {
                $name = 'foto-' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/shows', $name);
                $fotos_paths[] = '/storage/shows/' . $name;
            }
        }

        $show = new Show();
        $show->nome_do_estabelecimento = $request->input('nome_do_estabelecimento');
        $show->local = $request->input('local');
        $show->artista = $request->input('artista');
        $show->dia_do_show = $request->input('dia_do_show');
        $show->setlist = $request->input('setlist');
        $show->link_video = $request->input('link_video');
        $show->flyer_vertical = $flyer_vertical_path;
        $show->flyer_horizontal = $flyer_horizontal_path;
        $show->foto_artista = $foto_artista_path;
        $show->fotos = json_encode($fotos_paths);
        $show->save();

        return redirect()->route('shows.index')->with('success', 'Show adicionado com sucesso!');
    }

    public function edit($id)
    {
        $show = Show::findOrFail($id);

        return view('shows.edit', [
            'show' => $show,
        ]);
    }

    public function update(Request $request, $id)
    {
        $show = Show::findOrFail($id);

        if ($request->hasFile('flyer_vertical')) {
            $file = $request->file('flyer_vertical');
            $name = 'flyer-vertical-' . time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/shows', $name);
            $show->flyer_vertical = '/storage/shows/' . $name;
        }

        if ($request->hasFile('flyer_horizontal')) {
            $file = $request->file('flyer_horizontal');
            $name = 'flyer-horizontal-' . time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/shows', $name);
            $show->flyer_horizontal = '/storage/shows/' . $name;
        }

        if ($request->hasFile('foto_artista')) {
            $file = $request->file('foto_artista');
            $name = 'foto-artista-' . time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/shows', $name);
            $show->foto_artista = '/storage/shows/' . $name;
        }

        if ($request->hasFile('fotos')) {
            $fotos_paths = [];
            foreach ($request->file('fotos') as $file) {
                $name = 'foto-' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/shows', $name);
                $fotos_paths[] = '/storage/shows/' . $name;
            }
            $show->fotos = json_encode($fotos_paths);
        }

        $show->nome_do_estabelecimento = $request->input('nome_do_estabelecimento');
        $show->local = $request->input('local');
        $show->artista = $request->input('artista');
        $show->dia_do_show = $request->input('dia_do_show');
        $show->setlist = $request->input('setlist');
        $show->link_video = $request->input('link_video');
        $show->save();

        return redirect()->back()->with('success', 'Show atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $show = Show::findOrFail($id);

        if ($show->flyer_vertical) {
            Storage::delete('shows/' . $show->flyer_vertical);
        }

        if ($show->flyer_horizontal) {
            Storage::delete('shows/' . $show->flyer_horizontal);
        }

        if ($show->fotos) {
            Storage::delete('shows/' . $show->fotos);
        }

        if ($show->foto_artista) {
            Storage::delete('shows/' . $show->foto_artista);
        }

        $show->delete();

        return redirect()->route('shows.index')->with('success', 'Show excluído com sucesso!');
    }
}
