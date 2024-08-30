<?php

namespace App\Http\Controllers;

use App\Http\Requests\AutorRequest;
use App\Models\Autor;
use Illuminate\Database\QueryException;

class AutoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $autores = Autor::all();

        return view('autores.index')->with('autores', $autores);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $autor = Autor::all();

        return view('autores.create', compact('autor'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AutorRequest $request)
    {

        $request->validate([
            'nome' =>'required|string|max:40'
        ]);

        try {
            $autor = Autor::create($request->all());
        } catch (QueryException $e) {
            // Retorna erros de consulta
            return back()->withErrors(['msg' => 'Erro ao cadastrar o autor: ' . $e->getMessage()]);
        } catch (\Exception $e) {
            // Retorna outros tipos de erro
            return back()->withErrors(['msg' => 'Erro desconhecido: ' . $e->getMessage()]);
        }

        return redirect()->route('autores.index')->with('success', 'Autor cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Autor $autor)
    {
        return view('autores.show')->with('autor', $autor);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Autor $autor)
    {
        return view('autores.edit', ['autor' => $autor]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AutorRequest $request, Autor $autor)
    {

        $request->validate([
            'nome' =>'required|string|max:40',
        ]);

        try {
            $autor->update($request->all());
        } catch (QueryException $e) {
            // Retorna erros de consulta
            return back()->withErrors(['msg' => 'Erro ao atualizar o autor: ' . $e->getMessage()]);
        } catch (\Exception $e) {
            // Retorna outros tipos de erro
            return back()->withErrors(['msg' => 'Erro desconhecido: ' . $e->getMessage()]);
        }

        return redirect()->route('autores.index')->with('success', 'Autor alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Autor $autor)
    {
        /**
         * Verifica se o Autor já esta cadastrado em um Livro
         * @livro_has_autor
         */
        $findRelationLivroHasAutor = Autor::query()
                                            ->select('autor.id_autor')
                                            ->join('livro_has_autor as lha', 'autor.id_autor', '=', 'lha.id_autor')
                                            ->where('autor.id_autor', $autor->id_autor)
                                            ->get();

        if($findRelationLivroHasAutor->isEmpty()) {
            try {
                // Deleta o registro do banco de dados
                $autor->delete();
            } catch (QueryException $e) {
                // Retorna erros de consulta
                return back()->withErrors(['msg' => 'Erro ao excluir o autor: ' . $e->getMessage()]);
            } catch (\Exception $e) {
                // Retorna outros tipos de erro
                return back()->withErrors(['msg' => 'Erro desconhecido: ' . $e->getMessage()]);
            }

            return redirect()->route('autores.index')->with('success', 'Autor excluído com sucesso!');
        } else {
            return redirect()->route('autores.index')->with('danger', 'Atenção, Autor vinculado a um Livro não pode ser excluido.');
        }
    }
}
