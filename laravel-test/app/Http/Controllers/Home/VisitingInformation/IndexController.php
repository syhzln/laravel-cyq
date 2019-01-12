<?php

namespace App\Http\Controllers\Home\VisitingInformation;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //
    public function comeToVisit()
    {
        return view('home.VisitingInformation.comeToVisit');
    }
    public function accessed()
    {
        return view('home.VisitingInformation.accessed');
    }
}
