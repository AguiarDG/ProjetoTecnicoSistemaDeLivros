<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Model for Livro table
 */
class Livro extends Model
{
    use HasFactory;

    protected $table = 'livro';

    /**
     * Alterando primaryKey padrão, era id
     */
    protected $primaryKey = 'id_livro';

    /**
     * Campos que podem ser utilizados
     */
    protected $fillable = [
        'titulo',
        'editora',
        'edicao',
        'ano_publicacao',
        'valor'
    ];

    /**
     * Relations com a tabela livro
     *
     * Declaração da relation com a tabela livro_has_autor
    */
    public function autores()
    {
        return $this->belongsToMany(Autor::class, 'livro_has_autor', 'id_livro', 'id_autor');
    }

    /**
     * Declaração da relation com a tabela livro_has_assunto
     */
    public function assunto()
    {
        return $this->belongsToMany(Assunto::class, 'livro_has_assunto', 'id_livro', 'id_assunto');
    }

    /**
     * Metodo é chamado quando o Model é inicializado e nele é possivel definir eventos que serão disparados em terminados momentos
     * ex: creating, created, updating, updated, deleting, deleted
     */
    protected static function boot()
    {
        parent::boot();

        Livro::deleting(function ($livro) {
            $livro->autores()->detach();
            $livro->assunto()->detach();
        });
    }

}
