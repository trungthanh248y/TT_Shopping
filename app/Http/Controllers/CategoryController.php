<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\CategoryRepositoryInterface;
use App\Category;

class CategoryController extends Controller
{
    //
    public $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $categories = $this->categoryRepository->getAll();

        return view('categories.home', compact('categories'));
    }

    public function create()
    {
        $categories = $this->categoryRepository->CategoryParentAll();
        return view('categories.add', compact('categories'));
    }

    public function store(Request $request)
    {
        $categories = $this->categoryRepository->CategoryParentAll();

        $arr['name'] = $request->get('name');
        $arr['id_parent'] = $request->get('id_parent');
        $mess = "";
        if ($this->categoryRepository->create($arr)) {
            $mess = "Success add new";
        }

        return view('categories.add', compact('category', 'categories'))->with('mess', $mess);
    }

    public function edit($id)
    {
        $categories = $this->categoryRepository->CategoryParentAll();
        $category = $this->categoryRepository->find($id);

        return view('categories.edit', compact('category', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $categories = $this->categoryRepository->CategoryParentAll();
        $category = $this->categoryRepository->find($id);
        $arr['name'] = $request->get('name');
        $arr['id_parent'] = $request->get('id_parent');
        $mess = "";
        if ($this->categoryRepository->update($id, $arr)) {
            $mess = "Success edit";
        }

        return view('categories.edit', compact('category', 'categories'))->with('mess', $mess);
    }

    public function delete(Request $request)
    {
        $this->categoryRepository->delete($request->id);

        return redirect()->route('indexCategory')->with('mes_del', 'Delete success');
    }

    public function getSearch(Request $request)
    {
        $categories = $this->categoryRepository->getSearch($request);

        return view('categories.search', compact('categories'));
    }
}
