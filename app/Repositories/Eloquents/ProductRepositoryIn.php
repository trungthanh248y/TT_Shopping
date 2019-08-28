<?php

namespace App\Repositories\Eloquents;


use App\Category;
use App\Contracts\ProductRepositoryInterface;
use App\Event;
use App\Image;
use App\ImageEvent;
use App\Product;
use App\Repositories\Eloquents\ElequentRepository;

class ProductRepositoryIn extends ElequentRepository implements ProductRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getModel()
    {
        return Product::class;
    }

    public function allEvent()
    {
        return Event::all();
    }

    public function allCategory()
    {
        return Category::all();
    }

    public function storeProductImage($v, $product_id)
    {
        $images = new Image();//phải tạo ảnh ở đây vì với mỗi ảnh cần lưu vào hàng, nếu k có thì nó sẽ ghi đè lên

        $filename = $v->getClientOriginalName();
        $location = $v->move(public_path() . '/images/', $filename);

        $images->name = $filename;
        $images->id_product = $product_id;
        return $images->save();
    }

    public function deleteProductImage($id)
    {
        return Image::where('id_product', $id)->delete();
    }

    public function DisplayProductImage($id)
    {
        return Product::with
        (
            [
                'images' => function ($query) {
                    $query->select(['id_product', 'name']);
                },
            ]
        )->where('id', '=', $id)->get()->toArray();
    }

    public function DisplayProductEvenCategory($id)
    {
        return Product::with
        (
            [
                'event' => function ($query) {
                    $query->select(['id', 'name']);
                },
                'category' => function ($query) {
                    $query->select(['id', 'name']);
                }
            ]
        )->where('id', '=', $id)->get()->toArray();
    }

    public function ShowPromotion_price($id)
    {
        Product::with
        (
            [
                'event' => function ($query) {
                    $query->select(['id', 'promotion_price']);
                },
            ]
        )->where('id_event', '=', $id)->get()->toArray();
    }

    public function ShowProductComments($id)
    {
        return $this->find($id)->comments;
    }

    public function ShowProductCategory($id)
    {
        return $this->find($id)->category;
    }

    public function ShowEvent($id)
    {
        return ImageEvent::find($id);
    }

    public function getSearch($id)
    {
        return Product::where('name', 'like', '%' . $request->key . '%')->get();
    }
}
