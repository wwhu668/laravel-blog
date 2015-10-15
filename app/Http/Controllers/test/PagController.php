<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagController extends Controller
{
    public function about() {
      $people = [];
    return view('pag.about', compact('people'));
    }

    public function contact() {
        return view('pag.contact');
    }
}
