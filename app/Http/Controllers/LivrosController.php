<?php

namespace App\Http\Controllers;

use App\Http\Requests\LivroRequest;
use App\Models\Assunto;
use App\Models\Autor;
use App\Models\Livro;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class LivrosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $livros = Livro::query()
                        ->select(
                            'livro.id_livro',
                            'livro.titulo',
                            'livro.editora',
                            'livro.edicao',
                            'livro.ano_publicacao',
                            'livro.valor',
                            'a.descricao as assunto',
                            DB::raw('GROUP_CONCAT(au.nome SEPARATOR ", ") AS autor')
                        )
                        ->leftJoin('livro_has_assunto as lha', 'lha.id_livro', '=', 'livro.id_livro')
                        ->join('assunto as a', 'a.id_assunto', '=', 'lha.id_assunto')
                        ->leftJoin('livro_has_autor as lhau', 'lhau.id_livro', '=', 'livro.id_livro')
                        ->join('autor as au', 'au.id_autor', '=', 'lhau.id_autor')
                        ->orderBy("livro.titulo")
                        ->groupBy(
                                    'livro.id_livro',
                                    'livro.titulo',
                                    'livro.editora',
                                    'livro.edicao',
                                    'livro.ano_publicacao',
                                    'livro.valor',
                                    'a.descricao',
                                )
                        ->get();

        return view('livros.index')->with(compact('livros'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Recupera os dados para popular os campos de select
        $autores = Autor::all();
        $assuntos = Assunto::all();

        return view('livros.create')->with(compact('autores', 'assuntos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LivroRequest $request)
    {

        /**
         * Valida os dados recebidos no request
         */
        $request->validate([
            'titulo' =>'required|string|max:255',
            'editora' =>'required|string|max:255',
            'edicao' =>'required|integer',
            'ano_publicacao' =>'required|integer',
            'valor' =>'required|numeric',
            'autores' =>'required|array',
            'autores.*' => 'integer',
            'assunto' =>'required|integer'
        ]);

        try {
            /**
             * Cria o Livro, passando somente os campos necessarios
             */
            $livro = Livro::create($request->only('titulo', 'editora', 'edicao', 'ano_publicacao', 'valor'));
        } catch (QueryException $e) {
            // Retorna erros de consulta
            return back()->withErrors(['msg' => 'Erro ao cadastrar o livro: ' . $e->getMessage()]);
        } catch (\Exception $e) {
            // Retorna outros tipos de erro
            return back()->withErrors(['msg' => 'Erro desconhecido: ' . $e->getMessage()]);
        }


        try {
            // Grava os dados dos relations
            $livro->assunto()->sync($request->assunto);
        } catch (QueryException $e) {
            // Retorna erros de consulta
            return back()->withErrors(['msg' => 'Erro ao cadastrar o livro: ' . $e->getMessage()]);
        } catch (\Exception $e) {
            // Retorna outros tipos de erro
            return back()->withErrors(['msg' => 'Erro desconhecido: ' . $e->getMessage()]);
        }

        try {
            // Grava os dados dos relations
            $livro->autores()->sync($request->autores);
        } catch (QueryException $e) {
            // Retorna erros de consulta
            return back()->withErrors(['msg' => 'Erro ao cadastrar o livro: ' . $e->getMessage()]);
        } catch (\Exception $e) {
            // Retorna outros tipos de erro
            return back()->withErrors(['msg' => 'Erro desconhecido: ' . $e->getMessage()]);
        }

        return redirect()->route('livros.index')->with('success', 'Livro cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Livro $livro)
    {
        $livro = Livro::query()
                        ->select(
                            'livro.id_livro',
                            'livro.titulo',
                            'livro.editora',
                            'livro.edicao',
                            'livro.ano_publicacao',
                            'livro.valor',
                            'a.descricao as assunto',
                            DB::raw('GROUP_CONCAT(au.nome SEPARATOR ", ") AS autor')
                        )
                        ->leftJoin('livro_has_assunto as lha', 'lha.id_livro', '=', 'livro.id_livro')
                        ->join('assunto as a', 'a.id_assunto', '=', 'lha.id_assunto')
                        ->leftJoin('livro_has_autor as lhau', 'lhau.id_livro', '=', 'livro.id_livro')
                        ->join('autor as au', 'au.id_autor', '=', 'lhau.id_autor')
                        ->where('livro.id_livro', $livro->id_livro)
                        ->groupBy(
                                    'livro.id_livro',
                                    'livro.titulo',
                                    'livro.editora',
                                    'livro.edicao',
                                    'livro.ano_publicacao',
                                    'livro.valor',
                                    'a.descricao',
                                )
                        ->first();

        return view('livros.show')->with(compact('livro'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Livro $livro)
    {
        $livro = Livro::query()
                        ->select(
                            'livro.id_livro',
                            'livro.titulo',
                            'livro.editora',
                            'livro.edicao',
                            'livro.ano_publicacao',
                            'livro.valor',
                            'a.id_assunto',
                            'a.descricao as assunto',
                            DB::raw('GROUP_CONCAT(au.id_autor SEPARATOR ", ") AS id_autor'),
                            DB::raw('GROUP_CONCAT(au.nome SEPARATOR ", ") AS autor')
                        )
                        ->leftJoin('livro_has_assunto as lha', 'lha.id_livro', '=', 'livro.id_livro')
                        ->join('assunto as a', 'a.id_assunto', '=', 'lha.id_assunto')
                        ->leftJoin('livro_has_autor as lhau', 'lhau.id_livro', '=', 'livro.id_livro')
                        ->join('autor as au', 'au.id_autor', '=', 'lhau.id_autor')
                        ->where('livro.id_livro', $livro->id_livro)
                        ->groupBy(
                                    'livro.id_livro',
                                    'livro.titulo',
                                    'livro.editora',
                                    'livro.edicao',
                                    'livro.ano_publicacao',
                                    'livro.valor',
                                    'a.id_assunto',
                                    'a.descricao',
                                )
                        ->first();

        /**
         * Forma o valor monetario
         */
        $livro->valor = number_format($livro->valor, 2, ',', '.');

        // Recupera os dados para popular os campos de select
        $autores = Autor::all();
        $assuntos = Assunto::all();

        return view('livros.edit')->with(compact('autores', 'assuntos', 'livro'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LivroRequest $request, Livro $livro)
    {

        $request->validate([
            'titulo' =>'required|string|max:40',
            'editora' =>'required|string|max:40',
            'edicao' =>'required|integer',
            'ano_publicacao' =>'required|integer',
            'valor' =>'required|numeric',
            'autores' =>'required|array',
            'autores.*' => 'integer',
            'assunto' =>'required|integer'
        ]);

        try {
            $livro->update($request->only('titulo', 'editora', 'edicao', 'ano_publicacao', 'valor'));
        } catch (QueryException $e) {
            // Retorna erros de consulta
            return back()->withErrors(['msg' => 'Erro ao atualizar o livro: ' . $e->getMessage()]);
        } catch (\Exception $e) {
            // Retorna outros tipos de erro
            return back()->withErrors(['msg' => 'Erro desconhecido: ' . $e->getMessage()]);
        }

        try {
            // Cadastra os dados no relation Assunto
            $livro->assunto()->sync($request->assunto);
        } catch (QueryException $e) {
            // Retorna erros de consulta
            return back()->withErrors(['msg' => 'Erro ao atualizar o livro: ' . $e->getMessage()]);
        } catch (\Exception $e) {
            // Retorna outros tipos de erro
            return back()->withErrors(['msg' => 'Erro desconhecido: ' . $e->getMessage()]);
        }

        try {
            // Cadastra os dados no relation Autores
            $livro->autores()->sync($request->autores);
        } catch (QueryException $e) {
            // Retorna erros de consulta
            return back()->withErrors(['msg' => 'Erro ao atualizar o livro: ' . $e->getMessage()]);
        } catch (\Exception $e) {
            // Retorna outros tipos de erro
            return back()->withErrors(['msg' => 'Erro desconhecido: ' . $e->getMessage()]);
        }

        return redirect()->route('livros.index')->with('success', 'Livro alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Livro $livro)
    {
        try{
            // Deleta o registro do banco de dados
            $livro->delete();
        } catch (QueryException $e) {
            // Retorna erros de consulta
            return back()->withErrors(['msg' => 'Erro ao excluir o livro: ' . $e->getMessage()]);
        } catch (\Exception $e) {
            // Retorna outros tipos de erro
            return back()->withErrors(['msg' => 'Erro desconhecido: ' . $e->getMessage()]);
        }

        return redirect()->route('livros.index')->with('success', 'Livro excluído com sucesso!');
    }
}
