<?php

namespace App\Controllers;

class PlayerController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'RPG | Home'
        ];

        echo view('templates/header.php', $data);
        echo view('player.php');
        echo view('templates/footer.php');
    }
}
