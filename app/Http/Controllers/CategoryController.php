<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Category;
class CategoryController extends Controller
{
    //
    public function index()
    {
        $categories = Category::all();
        return view('categories.home', compact('categories'));
    }
    public function create()
    {
        $categories = Category::all()->where('id_parent', '=', 0);
        return view('categories.add', compact('categories'));
    }
    public function store(Request $request)
    {
        $categories = Category::all()->where('id_parent', '=', 0);
        $category = new Category();
        $category->name = $request->get('name');
        $category->id_parent = $request->get('id_parent');
        $mess = "";
        if ($category->save()) {
            $mess = "Success add new";
        }
        return view('categories.add', compact('category', 'categories'))->with('mess', $mess);
    }
    public function edit($id)
    {
        $categories = Category::all()->where('id_parent', '=', 0);
        $category = Category::find($id);
        return view('categories.edit', compact('category', 'categories'));
    }
    public function update(Request $request, $id)
    {
        $categories = Category::all()->where('id_parent', '=', 0);
        $category = Category::find($id);
        $category->name = $request->get('name');
        $category->id_parent = $request->get('id_parent');
        $mess = "";
        if ($category->save()) {
            $mess = "Success edit";
        }
        return view('categories.edit', compact('category', 'categories'))->with('mess', $mess);
    }
    public function delete(Request $request)
    {
        $category = Category::find($request->get('category_id'));
        $category->delete();
        return redirect()->route('indexCategory')->with('mes_del', 'Delete success');
    }
    public function getSearch(Request $request)
    {
        $categories = Category::where('name', 'like', '%' . $request->key . '%')->get();
        return view('categories.search', compact('categories'));
    }
}
