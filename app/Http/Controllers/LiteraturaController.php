<?php

namespace App\Http\Controllers;

use App\Models\Literatura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LiteraturaController extends Controller
{
    public function index()
    {
        $literaturas = Literatura::all();

        $parameters = [
            'literaturas' => $literaturas,
        ];

        return view('literatura.index', $parameters);
    }

    public function create()
    {
        $parameters = [];

        return view('literatura.create', $parameters);
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'nullable|string|max:255',
            'data_de_lancamento' => 'nullable|date',
            'data_de_leitura_inicial' => 'nullable|date',
            'data_de_leitura_final' => 'nullable|date',
            'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'review' => 'nullable|string',
            'review_link' => 'nullable|url',
        ]);

        $banner_path = null;
        if ($request->hasFile('banner')) {
            $file = $request->file('banner');
            $name = 'banner-' . time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/literatura', $name);
            $banner_path = '/storage/literatura/' . $name;
        }

        Literatura::create([
            'titulo' => $request->titulo,
            'autor' => $request->autor,
            'data_de_lancamento' => $request->data_de_lancamento,
            'data_de_leitura_inicial' => $request->data_de_leitura_inicial,
            'data_de_leitura_final' => $request->data_de_leitura_final,
            'banner' => $banner_path,
            'review' => $request->review,
            'review_link' => $request->review_link,
        ]);

        return redirect()->route('literatura.index')->with('success', 'Livro cadastrado com sucesso!');
    }

    public function view($id)
    {
        $literatura = Literatura::findOrFail($id);

        $parameters = [
            'literatura' => $literatura,
        ];

        return view('literatura.view', $parameters);
    }

    public function edit($id)
    {
        $literatura = Literatura::findOrFail($id);

        $parameters = [
            'literatura' => $literatura,
        ];

        return view('literatura.edit', $parameters);
    }

    public function update(Request $request, $id)
    {
        $literatura = Literatura::findOrFail($id);

        $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'nullable|string|max:255',
            'data_de_lancamento' => 'nullable|date',
            'data_de_leitura_inicial' => 'nullable|date',
            'data_de_leitura_final' => 'nullable|date',
            'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'review' => 'nullable|string',
            'review_link' => 'nullable|url',
        ]);

        if ($request->hasFile('banner')) {
            $file = $request->file('banner');
            $name = 'banner-' . time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/literatura', $name);
            $literatura->banner = '/storage/literatura/' . $name;
        }

        $literatura->titulo = $request->titulo;
        $literatura->autor = $request->autor;
        $literatura->data_de_lancamento = $request->data_de_lancamento;
        $literatura->data_de_leitura_inicial = $request->data_de_leitura_inicial;
        $literatura->data_de_leitura_final = $request->data_de_leitura_final;
        $literatura->review = $request->review;
        $literatura->review_link = $request->review_link;
        $literatura->save();

        return redirect()->back()->with('success', 'Livro atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $literatura = Literatura::findOrFail($id);

        if ($literatura->banner) {
            Storage::delete('public/literatura/' . basename($literatura->banner));
        }

        $parameters = [
            'success' => 'Livro excluído com sucesso!',
        ];

        $literatura->delete();

        return redirect()->route('literatura.index')->with($parameters);
    }
}
