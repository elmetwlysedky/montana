<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\RepositoryInterface;
use App\Models\Category;
use App\Models\Order;
use Illuminate\Database\Eloquent\Model;

class OrderRepository implements RepositoryInterface
{

    public function all()
    {

    }

    public function show($id): ?Model
    {
        return order::with('products')->findOrFail($id);
    }

    public function store(array $data): ?Model
    {
        return Order::create($data);
    }

    public function update(array $data, $id): ?Model
    {
        $category =Order::findOrFail($id);
        $category->update($data);
        return $category;
    }

    public function delete($id): bool
    {
        return Category::destroy($id);
    }
}
