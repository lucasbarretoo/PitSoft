<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Telefone;

class Pessoa extends Model{
    use HasFactory;

    /**
     * -----------------------------------------
     * Estrutura do modelo para o banco de dados
     * -----------------------------------------
     */
    protected $table = 'pessoas';
    protected $primaryKey = 'idpessoa';
    protected $fillable = ['idpessoa', 'nmpessoa', 'email', 'endereco', 'pais', 'cidade', 'estado', 'cep'];

    /**
     * ----------------------------------------
     * Relações entre outros modelos
     * ----------------------------------------
     */

}
