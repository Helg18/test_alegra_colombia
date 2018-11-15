<?php

namespace App\Http\Controllers;

class RequisitionController extends Controller
{
    public function index()
    {
        return view('requisitions.list');
    }
}
