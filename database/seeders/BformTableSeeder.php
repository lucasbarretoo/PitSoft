<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BformTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::insert('insert into bform (nmbform, nmbform_mostrar, idbpack, created_at, updated_at) values (?, ?, ?, ?, ?)', 
                ['pessoas', 'Pessoas',DB::select(DB::raw('select idbpack from bpack where nmbpack = \'cadastros\''))[0]->idbpack, date("Y-m-d H:i:s"), date("Y-m-d H:i:s")]);

        DB::insert('insert into bform (nmbform, nmbform_mostrar, idbpack, created_at, updated_at) values (?, ?, ?, ?, ?)', 
                ['rlt_pessoas', 'Relatório de Pessoas',DB::select(DB::raw('select idbpack from bpack where nmbpack = \'cadastros\''))[0]->idbpack, date("Y-m-d H:i:s"), date("Y-m-d H:i:s")]);

        DB::insert('insert into bform (nmbform, nmbform_mostrar, idbpack, created_at, updated_at) values (?, ?, ?, ?, ?)', 
                ['produtos', 'Produtos',DB::select(DB::raw('select idbpack from bpack where nmbpack = \'cadastros\''))[0]->idbpack,date("Y-m-d H:i:s"), date("Y-m-d H:i:s")]);

        DB::insert('insert into bform (nmbform, nmbform_mostrar, idbpack, created_at, updated_at) values (?, ?, ?, ?, ?)', 
                ['rlt_produtos', 'Relatório de Produtos',DB::select(DB::raw('select idbpack from bpack where nmbpack = \'cadastros\''))[0]->idbpack,date("Y-m-d H:i:s"), date("Y-m-d H:i:s")]);

        DB::insert('insert into bform (nmbform, nmbform_mostrar, idbpack, created_at, updated_at) values (?, ?, ?, ?, ?)', 
                ['bpack', 'Bpack',DB::select(DB::raw('select idbpack from bpack where nmbpack = \'sistema\''))[0]->idbpack,date("Y-m-d H:i:s"), date("Y-m-d H:i:s")]);

        DB::insert('insert into bform (nmbform, nmbform_mostrar, idbpack, created_at, updated_at) values (?, ?, ?, ?, ?)', 
                ['bform', 'Bform',DB::select(DB::raw('select idbpack from bpack where nmbpack = \'sistema\''))[0]->idbpack,date("Y-m-d H:i:s"), date("Y-m-d H:i:s")]);

                
    }
}
