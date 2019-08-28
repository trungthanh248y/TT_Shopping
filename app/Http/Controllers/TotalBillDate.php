<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class totalBillDate extends Controller
{
    public function totalBillDate()
    {
        $time = Carbon::now()->toDateString();
        $quantity = DB::select('SELECT total FROM bills WHERE created_at like ?', [$time . '%']);
        $total = 0;
        foreach ($quantity as $q) {
            $total += $q->total;
        }
        return $total;
    }
}
