<?php

namespace App\Models;

use Corcel\Model\Menu as Model;

class TopMenu extends Model
{
    public static function getMenuBySlug(string $slug)
    {
        $menu = self::slug($slug)->first();

        if ($menu) {
            return $menu->items;
        }

        return null;
    }

    public static function showNavigation()
    {
        $mainMenu = TopMenu::getMenuBySlug('header'); // Assuming 'main-navigation' is your menu slug in WordPress
        return $mainMenu;
    }
}