<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Repositories\CategoryRepository;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    protected $category;

    public function __construct(CategoryRepository $param)
    {
        $this->category=$param;
    }

    public function index()
    {
        return view('Dashboard.Category.index',[
            'categories' => $this->category->all()
        ]);
    }

    public function create()
    {
        return view('Dashboard.Category.create');
    }


    public function store(CategoryRequest $request)
    {

        $validate = $request->validated();
        if($request->image !=null) {
            $path = $request->file('image')->store('CategoryImages');
            $validate['image'] = $path;
        }
        $this->category->store($validate);
        session()->flash('success',__('main.added_success'));
        return redirect()->route('category.index');
    }

    public function edit($id)
    {
        return view('Dashboard.Category.edit',[
            'category' => $this->category->show($id)
        ]);
    }

    public function update(Request $request,$id)
    {
        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'sometimes|file|image|mimes:jpg,png',
        ]);

        if($request->image !=null) {
            $path = $request->file('image')->store('CategoryImages');
            $validate['image'] = $path;
        }

        $this->category->update($validate,$id);
        session()->flash('success',__('main.edited_success'));
        return redirect()->route('category.index');
    }

    public function destroy($id)
    {
        $this->category->delete($id);
        session()->flash('success',__('main.deleted_success'));
        return redirect()->route('category.index');

    }
}
