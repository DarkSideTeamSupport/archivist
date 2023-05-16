<?php

namespace App\Http\Controllers\Position;

use App\Http\Controllers\Controller;
use App\Models\UserPosition;
use App\Models\Specialization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function __invoke()
    {
        $positions = UserPosition::orderBy('title')->get();
        return view('positions.index', compact('positions'));
    }
}
