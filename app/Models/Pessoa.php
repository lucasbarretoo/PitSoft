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
    protected $table = 'PESSOAS';
    protected $primaryKey = 'IDPESSOA';
    protected $fillable = ['IDPESSOA', 'NOME', 'EMAIL', 'ENDERECO', 'PAIS', 'CIDADE', 'ESTADO', 'CEP'];

    /**
     * ----------------------------------------
     * Relações entre outros modelos
     * ----------------------------------------
     */

}
