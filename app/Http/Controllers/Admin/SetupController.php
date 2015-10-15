<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
// use App\Http\Requests;
use App\Http\Requests\SetupRequest;
use App\Http\Controllers\Controller;

class SetupController extends Controller
{
    public function index()
    {
        $setups = json_decode(file_get_contents('setups.txt'));
        return view('admin/setup', compact('setups'));
    }

    public function store(SetupRequest $request)
    {
        file_put_contents('setups.txt', json_encode($request->all()));
        return redirect('admin/setup');
    }
}
