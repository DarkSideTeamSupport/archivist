<?php

namespace App\Http\Controllers\Student;


use App\Http\Controllers\Controller;
use App\Services\Student\Service;

class BaseController extends Controller
{
    public $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }
}
