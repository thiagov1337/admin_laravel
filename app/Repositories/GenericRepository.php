<?php

use App\Repositories\Interfaces\RepositoryInterface;
use Illuminate\Support\Facades\DB;

abstract class GenericRepository implements RepositoryInterface
{
    protected $table;

    public function __construct($table)
    {
        $this->table = $table;
    }

    public function find($id)
    {
        return DB::table($this->table)->find($id);
    }

    public function create(array $data)
    {
        // return DB::table($this->table)->insert($data);
    }

    public function update($id, array $data)
    {
        // return DB::table($this->table)->where('id', $id)->update($data);
    }

    public function delete($id)
    {
        // return DB::table($this->table)->where('id', $id)->delete();
    }
}

