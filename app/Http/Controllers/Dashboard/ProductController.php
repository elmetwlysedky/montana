<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Repositories\ProductRepository;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $product;

    public function __construct(ProductRepository $param)
    {
        $this->product=$param;
    }

    public function index()
    {
        return view('Dashboard.Product.index',[
            'products' => $this->product->all()
        ]);
    }

    public function create()
    {
        return view('Dashboard.Product.create',[
            'categories' => Category::pluck('name','id')
        ]);
    }


    public function store(ProductRequest $request)
    {

        $validate = $request->validated();
        if($request->image !=null) {
            $path = $request->file('image')->store('ProductImages');
            $validate['image'] = $path;
        }
        $this->product->store($validate);
        session()->flash('success',__('main.added_success'));
        return redirect()->route('product.index');
    }

    public function edit($id)
    {
        return view('Dashboard.Product.edit',[
            'product' => $this->product->show($id),
            'categories' => Category::pluck('name','id')
        ]);
    }

    public function update(ProductRequest $request,$id)
    {
        $validate = $request->validated();

        if($request->image !=null) {
            $path = $request->file('image')->store('ProductImages');
            $validate['image'] = $path;
        }

        $this->product->update($validate,$id);
        session()->flash('success',__('main.edited_success'));
        return redirect()->route('product.index');
    }

    public function destroy($id)
    {
        $this->product->delete($id);
        session()->flash('success',__('main.deleted_success'));
        return redirect()->route('product.index');

    }
}
