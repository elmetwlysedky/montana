<?php

namespace App\Http\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface RepositoryInterface
{
    public function all();
    public function show($id) : ? Model;
    public function store(array $data) : ?Model;
    public function update(array $data ,$id): ?Model;
    public function delete($id) : bool;
}
