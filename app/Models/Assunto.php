<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assunto extends Model
{
    use HasFactory;

    protected $table = 'assunto';

    /**
     * Alterando primaryKey padrão, era id
     */
    protected $primaryKey = 'id_assunto';

    /**
     * Campos que podem ser utilizados
     */
    protected $fillable = [
        'descricao'
    ];

}
