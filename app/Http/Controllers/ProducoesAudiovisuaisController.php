<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\ProducaoAudiovisual;

use Carbon\Carbon;

class ProducoesAudiovisuaisController extends Controller
{
    public function index(Request $request)
    {
        $query = ProducaoAudiovisual::query();

        if ($request->filled('data_inicial') && $request->filled('data_final')) {
            $dataInicial = Carbon::parse($request->data_inicial);
            $dataFinal = Carbon::parse($request->data_final)->endOfDay();

            $query->where(function ($q) use ($dataInicial, $dataFinal) {
                $q->whereBetween('assistido_em', [$dataInicial, $dataFinal])
                ->orWhereBetween('iniciado_em', [$dataInicial, $dataFinal])
                ->orWhereBetween('finalizado_em', [$dataInicial, $dataFinal]);
            });
        }

        if ($request->filled('nota_min')) {
            $query->where('nota_pessoal', '>=', $request->nota_min);
        }

        if ($request->filled('nota_max')) {
            $query->where('nota_pessoal', '<=', $request->nota_max);
        }

        if ($request->filled('lancamento_de') && $request->filled('lancamento_ate')) {
            $query->whereBetween('data_de_lancamento', [$request->lancamento_de, $request->lancamento_ate]);
        }

        if ($request->filled('tem_review')) {
            $query->where(function ($q) {
                $q->whereNotNull('review_link_imdb')
                ->orWhereNotNull('review')
                ->orWhereNotNull('review_link_letterbox');
            });
        }

        $producoes = $query->paginate(100)->appends($request->all());

        $parameters = [
            'producoes' => $producoes,
            'request' => $request
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
        if ($request->hasFile('banner')) {
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
        if ($request->hasFile('banner')) {
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

        if ($producao->banner) {
            Storage::delete('producoes_audiovisuais/' . $producao->banner);
        }

        $producao->delete();

        return redirect()->route('producoes.index')->with('success', 'Produção Audiovisual excluída com sucesso!');
    }

    public function json()
    {
        $pasta_json = public_path('json/ProducoesAudiovisuais');

        if (!is_dir($pasta_json)) {
            return response()->json(['message' => 'Pasta de arquivos JSON não encontrada'], 404);
        }

        $arquivos_json = glob($pasta_json . '/*.json');

        if (empty($arquivos_json)) {
            return response()->json(['message' => 'Nenhum arquivo JSON encontrado'], 404);
        }

        foreach ($arquivos_json as $caminho_arquivo) {
            $conteudo = file_get_contents($caminho_arquivo);
            $producoes = json_decode($conteudo, true);

            if (json_last_error() !== JSON_ERROR_NONE) {
                return response()->json(['message' => "Erro ao decodificar o arquivo: " . basename($caminho_arquivo)], 500);
            }

            foreach ($producoes as $producao) {
                $titulo = $producao['titulo'] ?? null;
                $data_de_lancamento = $producao['data_de_lancamento'] ?? null;

                if (!$titulo || !$data_de_lancamento) {
                    continue;
                }

                $existe = ProducaoAudiovisual::where('titulo', $titulo)
                    ->where('data_de_lancamento', $data_de_lancamento)
                    ->exists();

                if($existe) {
                    continue;
                }

                ProducaoAudiovisual::create([
                    'titulo' => $titulo,
                    'data_de_lancamento' => $data_de_lancamento,
                    'diretor' => $producao['diretor'] ?? null,
                    'temporada' => $producao['temporada'] ?? null,
                    'quantidade_de_episodios' => $producao['quantidade_de_episodios'] ?? null,
                    'assistido_em' => $producao['assistido_em'] ?? null,
                    'iniciado_em' => $producao['iniciado_em'] ?? null,
                    'finalizado_em' => $producao['finalizado_em'] ?? null,
                    'review' => $producao['review'] ?? null,
                    'review_link_imdb' => $producao['review_link_imdb'] ?? null,
                    'nota_pessoal' => $producao['nota_pessoal'] ?? null,
                ]);
            }
        }

        return redirect()->route('producoes.index')->with('success', 'Todos os arquivos JSON foram importados com sucesso!');
    }
}