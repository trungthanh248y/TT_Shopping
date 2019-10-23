<?php

namespace App\Http\Controllers;

use App\Contracts\ProductRepositoryInterface;
use App\Event;
use App\ImageEvent;
use App\Image;
use DemeterChain\C;
use Illuminate\Http\Request;
use App\Repositories\Eloquents\ProductRepositoryIn;
use App\Product;
use App\Category;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\ResoureProducts;

class ProductController extends Controller
{
    public $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $products = $this->productRepository->getAll();

//        $products->load('event'); sử dụng thay cho with dưới return kết quả trả về là như nhau
//        return view('products.home', compact('products'));
        return ResoureProducts::collection(Product::with(['event', 'images'])->get());
    }

    public function create()
    {
        $categories = $this->productRepository->allCategory();
        $events = $this->productRepository->allEvent();

        return view('products.add', compact('categories', 'events'));

    }

    public function store(Request $request)
    {
        $categories = $this->productRepository->allCategory();
        $events = $this->productRepository->allEvent();

        $mess = "";
        $image = $request->file;
        if (count($image) != 0) {

            $data = $request->except(['file', 'btnsubmit']);

//            $product = $this->productRepository->create($data);
//
//            // create -> 1 record
//            // insert
//
//            $product->images()->insert($imageData);

            $id = $this->productRepository->create($data)->id;

            $check = $this->productRepository->storeProductImage($image, $id);

            if ($check) {
                $mess = "{{ __('Success add new') }}";
            }
        }

        return view('products.add', compact('categories', 'events'))->with('mess', $mess);
    }

    public function edit($id)
    {
        $categories = $this->productRepository->allCategory();
        $events = $this->productRepository->allEvent();
        $product = $this->productRepository->find($id);

        return view('products.edit', compact('categories', 'product', 'events'));
    }

    public function update(Request $request, $id)
    {
        $categories = $this->productRepository->allCategory();
        $events = $this->productRepository->allEvent();
        $product = $this->productRepository->find($id);

        $mess = "";

        $image = $request->file;
        if (count($image) != 0) {
            $arr['name'] = $request->get('name');
            $arr['description'] = $request->get('description');
            $arr['unit_price'] = $request->get('unit_price');
            $arr['id_category'] = $request->get('id_category');
            $arr['id_event'] = $request->get('id_event');
            $product_id = $this->productRepository->update($id, $arr)->id;
            if ($product_id) {
                $this->productRepository->deleteProductImage($id);
                foreach ($image as $k => $v) {
                    $this->productRepository->storeProductImage($v, $product_id);
                    $mess = "{{ __('Success edit') }}";
                }

                return view('products.edit', compact('categories'
                    , 'product', 'events'))->with('mess', $mess);
            }
        }
    }

    public function delete(Request $request)
    {
        $productId = $request->get('product_id');
        if ($this->productRepository->delete($productId)) {
            $this->productRepository->deleteProductImage($productId);
        }

        return redirect()->route('indexProduct')->with('mes_del', "{{ __('Delete success') }}");
    }

    public function DetailProduct($id)
    {
        $productImage = $this->productRepository->DisplayProductImage($id);
        $products = $this->productRepository->find($id);
        $categories = $this->productRepository->getAll();
        $productsCategory = $this->productRepository->DisplayProductEvenCategory($id);
        $productsSale = $this->productRepository->ShowPromotion_price($id);
        $comments = $this->productRepository->ShowProductComments($id);
        $categoriesDetail = $this->productRepository->ShowProductCategory($id);
        $events = $this->productRepository->ShowEvent($id);
        $category1 = $this->productRepository->categoryMenu();
        $parent1 = $this->productRepository->parentMenu();

        return view('products.detail', compact('categories', 'products'
            , 'category1', 'parent1', 'productsSale', 'events'
            , 'categoriesDetail', 'productImage', 'productsCategory', 'comments'));
    }

    public function getSearch(Request $request)
    {
        $products = $this->productRepository->getSearch($request);
        //có thể sử dụng $products[0]['bill_detail'] để lấy quan hệ giữa 2 bảng nhờ joins trong model
        return view('products.search', compact('products'));
    }
}
