<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Group;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function __invoke()
    {
        return view('students.profile');
    }
}
