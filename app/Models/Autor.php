<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    use HasFactory;

    protected $table = 'autor';

    /**
     * Alterando primaryKey padrão, era id
     */
    protected $primaryKey = 'id_autor';

    /**
     * Campos que podem ser utilizados
     */
    protected $fillable = [
        'nome'
    ];

}
