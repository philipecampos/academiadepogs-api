<?php

namespace App\Http\Controllers;

use App\Models\Facade\MenuDB;

class MenuController extends Controller
{
    public function index()
    {
        return MenuDB::menuPrincipal();
    }
}
