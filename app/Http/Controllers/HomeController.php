<?php

namespace App\Http\Controllers;

use App\Category;
use App\Contracts\CategoryRepositoryInterface;
use App\Contracts\HomeRepositoryInterface;
use App\Contracts\ManageRepositoryInterface;
use App\Contracts\ProductRepositoryInterface;
use App\Contracts\EventRepositoryInterface;
use App\ImageEvent;
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
    public $eventRepository;
    public $categoryRepository;
    public $manageRepository;
    public $productRepository;
    public $homeRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository
        , ManageRepositoryInterface $manageRepository,
                                ProductRepositoryInterface $productRepository
        , EventRepositoryInterface $eventRepository,
                                HomeRepositoryInterface $homeRepository)
    {
        $this->manageRepository = $manageRepository;
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->eventRepository = $eventRepository;
        $this->homeRepository = $homeRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->categoryRepository->getAll();
        $users = $this->manageRepository->getAll();
        $products = $this->productRepository->getAll();

        return view('home', compact('products', 'users', 'categories'));
    }

    public function manage()
    {
        return view('manage');
    }

    public function welcome()
    {
        $events = $this->eventRepository->getAll();
        $category1 = $this->eventRepository->categoryEvent();
        $parent1 = $this->eventRepository->parentEvent();
        $products = $this->homeRepository->getEventImageOfProduct();

        return view('welcome', compact('products', 'events', 'category1', 'parent1'));
    }

    public function categoryDetail($id)
    {
        $events = $this->eventRepository->getAll();
        $category1 = $this->eventRepository->categoryEvent();
        $parent1 = $this->eventRepository->parentEvent();
        $products = $product_image = $this->homeRepository->getEventImageOfProductDetail($id);
        $detailcategory = $this->categoryRepository->find($id);

        return view('categories.detail', compact('detailcategory', 'events', 'products'
            , 'events', 'category1', 'parent1'));
    }

    public function getSearch(Request $request)
    {
        $products = $this->productRepository->getSearch($request);
        $events = $this->eventRepository->getAll();
        $category1 = $this->eventRepository->categoryEvent();
        $parent1 = $this->eventRepository->parentEvent();

        return view('search', compact('products', 'events', 'category1', 'parent1'));
    }
}

