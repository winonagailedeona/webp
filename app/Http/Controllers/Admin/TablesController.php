<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TablesController extends Controller
{
    public function tables()
    {
        return view('components.content.table');
    }
}
