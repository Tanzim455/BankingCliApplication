<?php

declare(strict_types=1);

namespace App;

class Menu
{
    const LOGIN = "1.Login\n";
    const REGISTER = "2.Register\n";
    const EXIT = "3. Exit\n";


    public static function allMenu(): void
    {
        echo "Menu:\n";
        echo MENU::LOGIN;
        echo MENU::REGISTER;
        echo Menu::EXIT;
    }
}
