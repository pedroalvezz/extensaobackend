<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

namespace App\Http\Controllers;

use App\Models\Profissoes as Profissao;
use Illuminate\Http\Request;

class ProfissaoController extends Controller
{
    // Lista todas as profissões
    public function index(Request $request)
    {
        $search = $request->query('search');

        $profissoes = Profissao::query()
            ->when($search, function ($query, $search) {
                if (is_numeric($search)) {
                    return $query->where('salario', '>=', $search);
                } else {
                    return $query->where('nome', 'like', "%{$search}%")
                        ->orWhere('empresa', 'like', "%{$search}%");
                }
            })
            ->get();

        return response()->json($profissoes, 200);
    }

    // Retorna uma única profissão pelo ID
    public function show($id)
    {
        $profissao = Profissao::find($id);

        if (!$profissao) {
            return response()->json(['error' => 'Profissão não encontrada'], 404);
        }

        return response()->json($profissao, 200);
    }

    // Cria uma nova profissão
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'salario' => 'required|numeric',
            'empresa' => 'required|string|max:255',
        ]);

        $profissao = Profissao::create($request->all());

        return response()->json($profissao, 201);
    }

    // Atualiza uma profissão existente
    public function update(Request $request, $id)
    {
        $profissao = Profissao::find($id);

        if (!$profissao) {
            return response()->json(['error' => 'Profissão não encontrada'], 404);
        }

        $request->validate([
            'nome' => 'string|max:255',
            'salario' => 'numeric',
            'empresa' => 'string|max:255',
        ]);

        $profissao->update($request->all());

        return response()->json($profissao, 200);
    }

    // Deleta uma profissão
    public function destroy($id)
    {
        $profissao = Profissao::find($id);

        if (!$profissao) {
            return response()->json(['error' => 'Profissão não encontrada'], 404);
        }

        $profissao->delete();

        return response()->json(['message' => 'Profissão deletada com sucesso'], 200);
    }

}
