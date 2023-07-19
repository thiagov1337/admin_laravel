<?php

namespace App\Repositories\Interfaces;

interface RepositoryInterface
{
    public function find($id);
    public function create(array $data);
    public function update($id, array $data);
    public function delete($id);
}
