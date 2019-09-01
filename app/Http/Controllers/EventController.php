<?php

namespace App\Http\Controllers;

use App\Category;
use App\Contracts\EventRepositoryInterface;
use App\ImageEvent;
use App\Product;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public $eventRepository;

    public function __construct(EventRepositoryInterface $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    public function index()
    {
        $events = $this->eventRepository->allEvent();
        return view('events.home', compact('events'));
    }

    public function create()
    {
        return view('events.add', compact('events'));
    }

    public function store(Request $request)
    {
        $arr['name'] = $request->get('name');
        $arr['image'] = $request->get('image');
        $arr['promotion_price'] = $request->get('promotion_price');
        $arr['end_promotion'] = $request->get('end_promotion');
        $event = $this->eventRepository->create($arr);
        $mess = "";
        if ($event->save()) {
            $mess = "Success add new";
        }

        return view('events.add', compact('event'))->with('mess', $mess);
    }

    public function edit($id)
    {
        $event = $this->eventRepository->findEvent($id);
        return view('events.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $arr['name'] = $request->get('name');
        $arr['image'] = $request->get('image');
        $arr['promotion_price'] = $request->get('promotion_price');
        $arr['end_promotion'] = $request->get('end_promotion');
        $event = $this->eventRepository->update($id, $arr);
        $mess = "";
        if ($event->save()) {
            $mess = "Success edit";
        }
        return view('events.edit', compact('event'))->with('mess', $mess);
    }

    public function delete(Request $request)
    {
        $event = $request->get('event_id');
            $this->eventRepository->delete($event);
        return redirect()->route('indexEvent')->with('mes_del', 'Delete success');
    }

    public function detail($id)
    {
        $event = $this->eventRepository->findEvent($id);
        $products = $this->eventRepository->productEvent($id);
        //$products =  Product::where('id_event' ,'=', $id)->paginate(8);
        $events = $this->eventRepository->allEventID($id);
        $category1 = $this->eventRepository->categoryEvent();
        $parent1 = $this->eventRepository->parentEvent();
        $detailcategory = $this->eventRepository->findCategory($id);
        return view('events.detail', compact('event', 'products', 'detailcategory', 'events', 'products', 'events', 'category1', 'parent1'));
    }
}