<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Contracts\CommentRepositoryInterface;
use App\Contracts\ProductRepositoryInterface;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    protected $commentRepository;
    public  $productRepository;

    public function __construct(CommentRepositoryInterface $commentRepository, ProductRepositoryInterface $productRepository)
    {
        $this->commentRepository=$commentRepository;

        $this->productRepository=$productRepository;
    }

    public function index()
    {
        $comments =$this->commentRepository->getAll();

        return view('comments.home', compact('comments'));
    }
    public function delete(Request $request)
    {
        $comment_id=$request->get('comment_id');
        $this->commentRepository->delete($comment_id);

        return redirect()->route('indexComment')->with('mes_del', 'Delete success');
    }
}
