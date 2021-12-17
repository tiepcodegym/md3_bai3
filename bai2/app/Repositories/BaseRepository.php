<?php

namespace App\Repositories;

use App\Repositories\Impl\BaseRepositoryInterface;
use Exception;
use Illuminate\Support\Facades\DB;

class BaseRepository implements BaseRepositoryInterface
{
    protected $table;

    public function getAll()
    {
        $data = DB::table($this->table)->get();
        return $data;
    }

    public function getById($id)
    {
        $data = DB::table($this->table)->where('id', '=', $id)->get()->first();
        return $data;

    }

    public function delete($id)
    {
        try{
            DB::table($this->table)->where('id', $id)->delete();
        }catch (Exception $e){
            echo $e->getMessage();
        }
        // TODO: Implement delete() method.

    }
}
