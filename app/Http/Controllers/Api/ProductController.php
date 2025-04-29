<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Repositories\ProductRepository;
use App\Traits\JsonResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use JsonResponseTrait;
    protected $productRepository;

    public function __construct(ProductRepository $param)
    {
        $this->productRepository = $param;

    }


    public function show($id)
    {
        try{
            $data = $this->productRepository->show($id);
            return $this->jsonSuccess($data);

        } catch (ModelNotFoundException $e) {
            return $this->jsonFailed('error','product not found',404);
        }

    }
}
