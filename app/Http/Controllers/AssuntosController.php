<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssuntoRequest;
use App\Models\Assunto;
use Illuminate\Database\QueryException;

class AssuntosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $assuntos = Assunto::all();

        return view('assuntos.index')->with('assuntos', $assuntos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $assunto = Assunto::all();

        return view('assuntos.create', compact('assunto'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AssuntoRequest $request)
    {

        $request->validate([
            'descricao' =>'required|string|max:40'
        ]);

        try {
            $assunto = Assunto::create($request->all());
        } catch (QueryException $e) {
            // Lidar com erros de consulta
            return back()->withErrors(['msg' => 'Erro ao cadastrar o assunto: ' . $e->getMessage()]);
        } catch (\Exception $e) {
            // Lidar com outros tipos de erro
            return back()->withErrors(['msg' => 'Erro desconhecido: ' . $e->getMessage()]);
        }

        return redirect()->route('assuntos.index')->with('success', 'Assunto cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Assunto $assunto)
    {
        return view('assuntos.show')->with('assunto', $assunto);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Assunto $assunto)
    {
        return view('assuntos.edit', ['assunto' => $assunto]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AssuntoRequest $request, Assunto $assunto)
    {

        $request->validate([
            'descricao' =>'required|string|max:40',
        ]);

        try {
            $assunto->update($request->all());
        } catch (QueryException $e) {
            // Lidar com erros de consulta
            return back()->withErrors(['msg' => 'Erro ao atualizar o assunto: ' . $e->getMessage()]);
        } catch (\Exception $e) {
            // Lidar com outros tipos de erro
            return back()->withErrors(['msg' => 'Erro desconhecido: ' . $e->getMessage()]);
        }

        return redirect()->route('assuntos.index')->with('success', 'Assunto alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Assunto $assunto)
    {
        /**
         * Verifica se o Assunto já esta cadastrado em um Livro
         * @livro_has_assunto
         */
        $findRelationLivroHasAssunto = Assunto::query()
                                                ->select('assunto.id_assunto')
                                                ->join('livro_has_assunto as lha', 'assunto.id_assunto', '=', 'lha.id_assunto')
                                                ->where('assunto.id_assunto', $assunto->id_assunto)
                                                ->get();

        if($findRelationLivroHasAssunto->isEmpty()) {
            try {
                // Deleta o registro do banco de dados
                $assunto->delete();
            } catch (QueryException $e) {
                // Lidar com erros de consulta
                return back()->withErrors(['msg' => 'Erro ao excluir o assunto: ' . $e->getMessage()]);
            } catch (\Exception $e) {
                // Lidar com outros tipos de erro
                return back()->withErrors(['msg' => 'Erro desconhecido: ' . $e->getMessage()]);
            }

            return redirect()->route('assuntos.index')->with('success', 'Assunto excluído com sucesso!');
        } else {
            return redirect()->route('assuntos.index')->with('danger', 'Atenção, Assunto vinculado a um Livro não pode ser excluido.');
        }
    }
}
