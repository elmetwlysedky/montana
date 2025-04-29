<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\RepositoryInterface;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class ProductRepository implements RepositoryInterface
{

    public function all()
    {
        return Product::all();
    }

    public function show($id): ?Model
    {
        return Product::findOrFail($id);
    }

    public function store(array $data): ?Model
    {
        return Product::create($data);
    }

    public function update(array $data, $id): ?Model
    {
        $category =Product::findOrFail($id);
        $category->update($data);
        return $category;
    }

    public function delete($id): bool
    {
        return Product::destroy($id);
    }
}
