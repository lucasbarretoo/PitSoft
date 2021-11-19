<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bpack extends Model
{
    use HasFactory;

    protected $table = 'bpack';
    protected $primaryKey = 'idbpack';

    public function bForm(){
        return $this->hasMany(Bpack::class);
    }
}
