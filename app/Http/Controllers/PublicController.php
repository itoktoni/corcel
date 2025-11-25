<?php

namespace App\Http\Controllers;

use App\Models\TopMenu;

class PublicController extends Controller
{
    public function index()
    {
        $menu = TopMenu::slug('header')->showSql()->get();
        dd($menu);
        return view('homepage');
    }
}
