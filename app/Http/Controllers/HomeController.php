<?php

namespace App\Http\Controllers;

use App\Category;
use App\Event;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $products = Product::all();

        return view('home', compact('products', 'users'));
    }

    public function manage()
    {

        return view('manage');
    }

    public function welcome()
    {
        $events = Event::all();
        $categories = Category::all();
        $products = Product::paginate(12);

        return view('welcome', compact('products', 'events', 'categories'));
    }

    public function getSearch(Request $request)
    {
        $products = Product::where('name', 'like', '%' . $request->key . '%')->get();
        $events = Event::all();
        $categories = Category::all();

        return view('search', compact('products', 'events', 'categories'));
    }
}
