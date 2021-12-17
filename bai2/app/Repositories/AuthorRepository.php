<?php

namespace App\Repositories;

use App\Repositories\Impl\AuthorRepositoryInterface;
use Illuminate\Support\Facades\DB;

class AuthorRepository extends BaseRepository implements AuthorRepositoryInterface
{
   protected $table = 'authors';


    public function create($data)
    {
        // TODO: Implement create() method.
        DB::table($this->table)->insert([
            'name'=>$data->name,
            'country'=>$data->country
        ]);
    }

}
