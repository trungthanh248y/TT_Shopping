<?php
namespace App\Repositories\Eloquents;

use App\Category;
use App\Contracts\EventRepositoryInterface;
use App\Event;
use App\ImageEvent;
use App\Product;
use http\Env\Request;
use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Cache\Repository;

class EventRepository extends ElequentRepository implements EventRepositoryInterface
{
    public function getModel()
    {
        return ImageEvent::class;
    }
    public function allEvent()
    {
        return ImageEvent::all();
    }
    public function findEvent($id)
    {
        return ImageEvent::find($id);
    }
    public function productEvent($id)
    {
        $products = Product::with
        (
            [
                'images' => function ($query) {
                    $query->select(['id_product', 'name']);
                },
                'event' => function ($query) {
                    $query->select(['id', 'promotion_price']);
                },
            ]
        )->where('id_event', '=', $id)->get()->toArray();
        return $products;
    }
    public function allEventID($id)
    {
        $events = ImageEvent::all()->where('id', '=', $id);
        return $events;
    }
    public function categoryEvent()
    {
        $category1 = Category::all()->where('id', '=', 1);
        return $category1;
    }
    public function parentEvent()
    {
        $parent1 = Category::all()->where('id_parent', '=', 1);
        return $parent1;
    }
    public function findCategory($id)
    {
        $detailcategory = Category::find($id);
        return $detailcategory;
    }
    public function getStore($request)
    {
        $event = new ImageEvent();
        $event->name = $request->get('name');
        $event->image = $request->get('image');
        $event->promotion_price = $request->get('promotion_price');
        $event->end_promotion = $request->get('end_promotion');
        return $event;
    }
    public function getUpdate($request,$id)
    {
        $event = ImageEvent::find($id);
        $event->name = $request->get('name');
        $event->image = $request->get('image');
        $event->promotion_price = $request->get('promotion_price');
        $event->end_promotion = $request->get('end_promotion');
        return $event;
    }
    public function getDelete($request)
    {
        $event = ImageEvent::find($request->get('event_id'));
        return $event;
    }
}
