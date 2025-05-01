<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use App\Models\ProducaoAudiovisual;

class ProducoesAudiovisuaisController extends Controller
{
    public function index()
    {
        $producoes = ProducaoAudiovisual::all();

        $parameters = [
            'producoes' => $producoes,
        ];

        return view('producoes.index', $parameters);
    }

    public function create()
    {
        return view('producoes.create');
    }

    public function view($id)
    {
        $producao = ProducaoAudiovisual::findOrFail($id);

        $parameters = [
            'producao' => $producao,
        ];

        return view('producoes.view', $parameters);
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'data_de_lancamento' => 'required|integer|min:1900|max:' . date('Y'),
            'assistido_em' => 'nullable|date',
            'diretor' => 'nullable|string|max:255',
            'temporada' => 'nullable|integer|min:1',
            'quantidade_de_episodios' => 'nullable|integer|min:1',
            #'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'review' => 'nullable|string',
            'review_link_imdb' => 'nullable|url',
            'review_link_letterbox' => 'nullable|url',
            'nota_pessoal' => 'nullable|integer|min:1|max:10',
        ]);

        $banner_path = null;
        if($request->hasFile('banner')) {
            $banner = $request->file('banner');
            $extension = $banner->getClientOriginalExtension();
            $banner_name = strtolower(str_replace(' ', '-', $request->input('titulo'))) . '-' . $request->input('data_de_lancamento') . '.' . $extension;
            $banner->storeAs('public/producoes_audiovisuais', $banner_name);
            $producao->banner = '/storage/producoes_audiovisuais/' . $banner_name;
        }

        $producao = new ProducaoAudiovisual();
        $producao->titulo = $request->input('titulo');
        $producao->data_de_lancamento = $request->input('data_de_lancamento');
        $producao->assistido_em = $request->input('assistido_em');
        $producao->iniciado_em = $request->input('iniciado_em');
        $producao->finalizado_em = $request->input('finalizado_em');
        $producao->diretor = $request->input('diretor');
        $producao->temporada = $request->input('temporada');
        $producao->quantidade_de_episodios = $request->input('quantidade_de_episodios');
        $producao->review = $request->input('review');
        $producao->review_link_imdb = $request->input('review_link_imdb');
        $producao->review_link_letterbox = $request->input('review_link_letterbox');
        $producao->nota_pessoal = $request->input('nota_pessoal');
        $producao->save();

        return redirect()->route('producoes.index')->with('success', 'Produção Audiovisual adicionada com sucesso!');
    }

    public function edit($id)
    {
        $producao = ProducaoAudiovisual::findOrFail($id);

        $parameters = [
            'producao' => $producao,
        ];

        return view('producoes.edit', $parameters);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'data_de_lancamento' => 'required|integer|min:1900|max:' . date('Y'),
            'assistido_em' => 'nullable|date',
            'diretor' => 'nullable|string|max:255',
            'temporada' => 'nullable|integer|min:1',
            'quantidade_de_episodios' => 'nullable|integer|min:1',
            #'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'review' => 'nullable|string',
            'nota_pessoal' => 'nullable|integer|min:1|max:10',
        ]);

        $producao = ProducaoAudiovisual::findOrFail($id);

        $banner_path = null;
        if($request->hasFile('banner')) {
            $banner = $request->file('banner');
            $extension = $banner->getClientOriginalExtension();
            $banner_name = strtolower(str_replace(' ', '-', $request->input('titulo'))) . '-' . $request->input('data_de_lancamento') . '.' . $extension;
            $banner->storeAs('public/producoes_audiovisuais', $banner_name);
            $producao->banner = '/storage/producoes_audiovisuais/' . $banner_name;
        }

        $producao->titulo = $request->input('titulo');
        $producao->data_de_lancamento = $request->input('data_de_lancamento');
        $producao->assistido_em = $request->input('assistido_em');
        $producao->iniciado_em = $request->input('iniciado_em');
        $producao->finalizado_em = $request->input('finalizado_em');
        $producao->diretor = $request->input('diretor');
        $producao->temporada = $request->input('temporada');
        $producao->quantidade_de_episodios = $request->input('quantidade_de_episodios');
        $producao->review = $request->input('review');
        $producao->review_link_imdb = $request->input('review_link_imdb');
        $producao->review_link_letterbox = $request->input('review_link_letterbox');
        $producao->nota_pessoal = $request->input('nota_pessoal');
        $producao->save();

        return redirect()->back()->with('success', 'Produção Audiovisual atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $producao = ProducaoAudiovisual::findOrFail($id);

        if($producao->banner) {
            Storage::delete('producoes_audiovisuais/' . $producao->banner);
        }

        $producao->delete();

        return redirect()->route('producoes.index')->with('success', 'Produção Audiovisual excluída com sucesso!');
    }
}