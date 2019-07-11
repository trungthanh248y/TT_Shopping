<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    //
    public $arr;

    public function __construct()
    {
        $this->arr = Category::all();
    }

    public function index()
    {
        $this->CategoryTre($this->arr);
    }

    public function CategoryTre($arr, $parent = 0, $indent = 0)
    {
        if (count($arr) != 0) {
            foreach ($arr as $item) {
                if ($item["id_parent"] == $parent) {
                    if ($indent != 0) {
                        echo str_repeat("&nbsp;", $indent) . "-&nbsp;";
                    }
                    echo $item['name'] . $item['id'] . '<br/>';
                    $this->CategoryTre($arr, $item['id'], $indent + 2);
                }
            }
        }
    }
}
