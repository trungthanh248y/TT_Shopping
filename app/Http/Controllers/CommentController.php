<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::with(['product' => function ($query) {
            $query->select(['id', 'name']);
        }])->get()->toArray();
        return view('comments.home', compact('comments'));
    }

    public $products;

    public function __construct()
    {
        $this->products = Product::all();
    }

    public function create()
    {
        $products = $this->products;
        return view('comments.add', compact('products'));
    }

    public function add()
    {
        return view('products.detail');
    }

    public function store(Request $request, $id)
    {
        $comments = new Comment();
        $comments->content = $request->get('content');
        $comments->id_user = Auth::user()->id;
        $comments->id_product = $id;
        $comments->save();
        return redirect()->back();
    }

    public function delete(Request $request)
    {
        $comment = Comment::find($request->get('comment_id'));
        $comment->delete();
        return redirect()->route('indexComment')->with('mes_del', 'Delete success');
    }
}

