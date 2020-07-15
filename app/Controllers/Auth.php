<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\InventoryModel;

class Auth extends BaseController
{

    public function index()
    {
        $data = [
            'title' => 'RPG | Log In'
        ];

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'username' => 'required',
                'password' => 'required|validateUser[username,password]',
            ];

            $errors = [
                'password' => [
                    'validateUser' => 'Username or Password don\'t match'
                ]
            ];

            if (!$this->validate($rules, $errors)) {
                $data['validation'] = $this->validator;
            } else {
                $model = new UserModel();
                $user = $model->where('username', $this->request->getVar('username'))->first();

                $this->setUserSession($user);

                if (session()->get('role') == 'Player') {
                    return redirect()->to('/home');
                } else {
                    return redirect()->to('/admin');
                }
            }
        }

        return view('login.php', $data);
    }

    private function setUserSession($user)
    {
        $data = [
            'username' => $user['username'],
            'email' => $user['email'],
            'role' => $user['role'],
            'level' => $user['level'],
            'currentExp' => $user['currentExp'],
            'maxExp' => $user['maxExp'],
            'currentHP' => $user['currentHP'],
            'maxHP' => $user['maxHP'],
            'atk' => $user['atk'],
            'def' => $user['def'],
            'isLoggedIn' => true
        ];

        session()->set($data);
        return true;
    }

    public function UserRegister()
    {
        $data = [
            'title' => 'RPG | Register'
        ];

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'username' => 'required|min_length[3]|max_length[15]|is_unique[user.username]|alpha_numeric',
                'email' => 'required|min_length[3]|max_length[50]|is_unique[user.email]|valid_email',
                'password' => 'required|min_length[8]|max_length[255]',
                'password_confirm' => 'matches[password]',
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $UserModel = new UserModel();

                $newData = [
                    'username' => $this->request->getVar('username'),
                    'email' => $this->request->getVar('email'),
                    'password' => $this->request->getVar('password'),
                ];
                $UserModel->insert($newData);

                $this->AddDefaultInventory();

                session()->setFlashdata('success', 'Registration Success!');
                return redirect()->to('/login');
            }
        }

        return view('register.php', $data);
    }

    public function AddDefaultInventory()
    {
        $InventoryModel = new InventoryModel();

        // Tattered Novice Ninja Suit
        $rand = "INVEN-" . random_string('alnum', 10);
        $newData = [
            'idInventory' => $rand,
            'username' => $this->request->getVar('username'),
            'idItem' => 'ITEM-CYAsZ46QtP',
            'qty' => '1'
        ];
        $InventoryModel->insert($newData);

        // Novice Slippers
        $rand = "INVEN-" . random_string('alnum', 10);
        $newData = [
            'idInventory' => $rand,
            'username' => $this->request->getVar('username'),
            'idItem' => 'ITEM-Okq32lJfPR',
            'qty' => '1'
        ];
        $InventoryModel->insert($newData);

        // Novice False Eggshell
        $rand = "INVEN-" . random_string('alnum', 10);
        $newData = [
            'idInventory' => $rand,
            'username' => $this->request->getVar('username'),
            'idItem' => 'ITEM-oNkWXscy1p',
            'qty' => '1'
        ];
        $InventoryModel->insert($newData);

        // Novice Main-Gauche
        $rand = "INVEN-" . random_string('alnum', 10);
        $newData = [
            'idInventory' => $rand,
            'username' => $this->request->getVar('username'),
            'idItem' => 'ITEM-uwFgLz05dQ',
            'qty' => '1'
        ];
        $InventoryModel->insert($newData);

        // Novice Guard
        $rand = "INVEN-" . random_string('alnum', 10);
        $newData = [
            'idInventory' => $rand,
            'username' => $this->request->getVar('username'),
            'idItem' => 'ITEM-Wb4Yz72ahn',
            'qty' => '1'
        ];
        $InventoryModel->insert($newData);

        // Somber Novice-Hood
        $rand = "INVEN-" . random_string('alnum', 10);
        $newData = [
            'idInventory' => $rand,
            'username' => $this->request->getVar('username'),
            'idItem' => 'ITEM-yOBZfD38g1',
            'qty' => '1'
        ];
        $InventoryModel->insert($newData);

        return true;
    }

    public function UserLogout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
