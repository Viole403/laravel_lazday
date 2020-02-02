<?php

namespace App\Http\Controllers;


// use Illuminate\Support\Facades\View;

class TestController extends Controller
{
    public function index()
    {
        # code...
        return View('admin.test.index');
    }
}
