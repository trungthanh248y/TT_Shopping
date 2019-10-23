<?php

namespace App\Http\Resources;

use App\Category;
use App\Http\Resources\ResourceEvent;
use App\Http\Resources\ImageResource;
use App\User;
//use Illuminate\Http\Resources\Json\ResourceCollection; ResourceCollection(để thêm dữ liệu) khác với JsonResource(để map và sử lý data)
//ResourceCollection chú ý nó có thể sử dụng with và additional để tùy chỉnh
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class ResoureProducts extends JsonResource
{
    /**
     * Indicates if the resource's collection keys should be preserved.
     *
     * @var bool
     */
    public $preserveKeys = true;

    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'unit_price' => $this->unit_price,
            'events' => new ResourceEvent($this->whenLoaded('event')),//Khi dữ liệu trả về chỉ một bản ghi(vd: quan hệ 1 nhiều) thì dùng cách này
////            'id_user'=> $this->when(Auth::user()->role=='admin',function ()//Kiểm tra xem người có quyền mới được xem(ở đây là secret-value)
////            {
////                return [ày
//                    'id_event' => ResourceEvent::collection($this->whenLoaded('event')),//Khi dữ liệu trả về nhiều bản ghi hay 1 array thì sử dụng cái n
////                ];
////            }),
            'images' => ImageResource::collection($this->whenLoaded('images')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }

    //whenPivotLoaded hàm này sử dụng để lấy dữ liệu quan hệ qua bảng phu. Tránh không có dữ liệu thì thay vì trả ra null or lỗi và ta có thể tùy chỉnh dữ liệu trả ra

}
