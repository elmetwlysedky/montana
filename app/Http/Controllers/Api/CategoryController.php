<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Repositories\CategoryRepository;
use App\Models\Category;
use App\Traits\JsonResponseTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use function Laravel\Prompts\error;

class CategoryController extends Controller
{

    use JsonResponseTrait;
    protected $categoryRepository;

    public function __construct(CategoryRepository $param)
    {
        $this->categoryRepository = $param;

    }

    public function all()
    {

        $data = $this->categoryRepository->all();
        if ($data){
            return $this->jsonSuccess($data);

        }else{
            return $this->jsonFailed();
        }

    }

    public function show($id)
    {
        try{
            $data = $this->categoryRepository->show($id);
            return $this->jsonSuccess($data);

        } catch (ModelNotFoundException $e) {
            return $this->jsonFailed('error','Category not found',404);
        }

    }

}
