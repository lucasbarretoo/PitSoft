<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bpack extends Model
{
    use HasFactory;

    protected $table = 'bpack';
    protected $primaryKey = 'idbpack';

    public function Bform(){
        return $this->hasMany(Bpack::class);
    }
}
