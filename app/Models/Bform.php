<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bform extends Model
{
    use HasFactory;
    
    protected $table = 'bform';
    protected $primaryKey = 'idbform';

    public function bPack(){
        return $this->hasOne(Bpack::class);
    }
}
