<?php
namespace App\Http\Controllers;
use App\Category;
use App\ImageEvent;
use App\Product;
use Illuminate\Http\Request;
class EventController extends Controller
{
    public function index()
    {
        $events = ImageEvent::all();
        return view('events.home', compact('events'));
    }
    public function create()
    {
        return view('events.add', compact('events'));
    }
    public function store(Request $request)
    {
        $event = new ImageEvent();
        $event->name = $request->get('name');
        $event->image = $request->get('image');
        $event->promotion_price = $request->get('promotion_price');
        $event->end_promotion = $request->get('end_promotion');
        $mess = "";
        if ($event->save()) {
            $mess = "Success add new";
        }
        return view('events.add', compact('event'))->with('mess', $mess);
    }
    public function edit($id)
    {
        $event = ImageEvent::find($id);
        return view('events.edit', compact('event'));
    }
    public function update(Request $request, $id)
    {
        $event = ImageEvent::find($id);
        $event->name = $request->get('name');
        $event->image = $request->get('image');
        $event->promotion_price = $request->get('promotion_price');
        $event->end_promotion = $request->get('end_promotion');
        $mess = "";
        if ($event->save()) {
            $mess = "Success edit";
        }
        return view('events.edit', compact('event'))->with('mess', $mess);
    }
    public function delete(Request $request)
    {
        $event = ImageEvent::find($request->get('event_id'));
        $event->delete();
        return redirect()->route('indexEvent')->with('mes_del', 'Delete success');
    }
    public function detail($id)
    {
        $event = ImageEvent::find($id);
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
        //$products =  Product::where('id_event' ,'=', $id)->paginate(8);
        $events = ImageEvent::all()->where('id', '=', $id);
        $category1 = Category::all()->where('id', '=', 1);
        $parent1 = Category::all()->where('id_parent', '=', 1);
        $detailcategory = Category::find($id);
        return view('events.detail', compact('event', 'products', 'detailcategory', 'events', 'products', 'events', 'category1', 'parent1'));
    }
}