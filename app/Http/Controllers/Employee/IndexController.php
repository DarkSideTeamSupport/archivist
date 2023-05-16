<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Http\Filters\EmployeeFilter;
use App\Http\Requests\Employee\FilterRequest;
use App\Models\Specialization;
use App\Models\User;
use App\Models\UserPosition;
use App\Models\UserRole;
use App\Models\UserStatus;

class IndexController extends Controller
{
    public function __invoke(FilterRequest $request)
    {
        $roles = UserRole::orderBy('title')->get();
        $statuses = UserStatus::orderBy('title')->get();
        $specialties = Specialization::orderBy('title')->get();
        $positions = UserPosition::orderBy('title')->get();

        $data = $request->validated();

        $filter = app()->make(EmployeeFilter::class, ['queryParams' => array_filter($data)]);

        $employees = User::with('group')->orderBy('surname')
            ->where('role_id', '!=', 2)
            ->filter($filter)->paginate(10);


        return view('employees.index', compact('employees', 'specialties', 'roles', 'positions', 'statuses'));
    }
}
