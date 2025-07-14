<?php

namespace App\Http\Controllers;

use App\Models\VisitaGastronomica;
use Illuminate\Http\Request;

class VisitaGastronomicaController extends Controller
{
    public function index()
    {
        $visitasgastronomicas = VisitaGastronomica::all();

        $parameters = [
            'visitasgastronomicas' => $visitasgastronomicas,
        ];

        return view('visitasgastronomicas.index', $parameters);
    }

    public function create()
    {
        $parameters = [];

        return view('visitasgastronomicas.create', $parameters);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome_do_estabelecimento' => 'required|string|max:255',
            'local' => 'nullable|string|max:255',
            'dia_da_visita' => 'nullable|date',
            'nota_do_ambiente' => 'nullable|integer|min:0|max:10',
            'nota_do_servico' => 'nullable|integer|min:0|max:10',
            'nota_da_comida' => 'nullable|integer|min:0|max:10',
            'review' => 'nullable|string',
            'review_link_maps' => 'nullable|url',
        ]);

        VisitaGastronomica::create([
            'nome_do_estabelecimento' => $request->nome_do_estabelecimento,
            'local' => $request->local,
            'dia_da_visita' => $request->dia_da_visita,
            'nota_do_ambiente' => $request->nota_do_ambiente,
            'nota_do_servico' => $request->nota_do_servico,
            'nota_da_comida' => $request->nota_da_comida,
            'review' => $request->review,
            'review_link_maps' => $request->review_link_maps,
        ]);

        return redirect()->route('visitasgastronomicas.index')->with('success', 'Visita cadastrada com sucesso!');
    }

    public function view($id)
    {
        $visita = VisitaGastronomica::findOrFail($id);

        $parameters = [
            'visita' => $visita,
        ];

        return view('visitasgastronomicas.view', $parameters);
    }

    public function edit($id)
    {
        $visita = VisitaGastronomica::findOrFail($id);

        $parameters = [
            'visita' => $visita,
        ];

        return view('visitasgastronomicas.edit', $parameters);
    }

    public function update(Request $request, $id)
    {
        $visita = VisitaGastronomica::findOrFail($id);

        $request->validate([
            'nome_do_estabelecimento' => 'required|string|max:255',
            'local' => 'nullable|string|max:255',
            'dia_da_visita' => 'nullable|date',
            'nota_do_ambiente' => 'nullable|integer|min:0|max:10',
            'nota_do_servico' => 'nullable|integer|min:0|max:10',
            'nota_da_comida' => 'nullable|integer|min:0|max:10',
            'review' => 'nullable|string',
            'review_link_maps' => 'nullable|url',
        ]);

        $visita->nome_do_estabelecimento = $request->nome_do_estabelecimento;
        $visita->local = $request->local;
        $visita->dia_da_visita = $request->dia_da_visita;
        $visita->nota_do_ambiente = $request->nota_do_ambiente;
        $visita->nota_do_servico = $request->nota_do_servico;
        $visita->nota_da_comida = $request->nota_da_comida;
        $visita->review = $request->review;
        $visita->review_link_maps = $request->review_link_maps;
        $visita->save();

        return redirect()->back()->with('success', 'Visita atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $visita = VisitaGastronomica::findOrFail($id);

        $visita->delete();

        return redirect()->route('visitasgastronomicas.index')->with('success', 'Visita excluída com sucesso!');
    }
}
