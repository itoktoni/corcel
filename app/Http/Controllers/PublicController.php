<?php

namespace App\Http\Controllers;

use App\Models\TopMenu;

class PublicController extends Controller
{
    public function index()
    {
        $menu = TopMenu::slug('header')->get();
        return view('homepage');
    }
}
