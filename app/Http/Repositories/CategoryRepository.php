<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\RepositoryInterface;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class CategoryRepository implements RepositoryInterface
{

    public function all()
    {
        return Category::all();
    }

    public function show($id): ?Model
    {
return Category::with('products')->findOrFail($id);



    }

    public function store(array $data): ?Model
    {
        return Category::create($data);
    }

    public function update(array $data, $id): ?Model
    {
        $category =Category::findOrFail($id);
        $category->update($data);
        return $category;
    }

    public function delete($id): bool
    {
        return Category::destroy($id);
    }
}
