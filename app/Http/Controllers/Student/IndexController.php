<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Filters\StudentFilter;
use App\Http\Requests\Student\FilterRequest;
use App\Models\Group;
use App\Models\User;

class IndexController extends Controller
{
    public function __invoke(FilterRequest $request)
    {

        $data = $request->validated();

        $filter = app()->make(StudentFilter::class, ['queryParams' => array_filter($data)]);

        $students = User::with('group', 'position', 'role')->orderBy('surname')
            ->where('group_id', '!=', null)
            ->filter($filter)->paginate(10);

        $groups = Group::orderBy('title')->get();


        return view('students.index', compact('students', 'groups'));
    }
}
