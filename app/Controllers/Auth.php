<?php

namespace App\Controllers;

use App\Models\UserModel;

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
                    'validateUser' => 'Email or Password don\'t match'
                ]
            ];

            if (!$this->validate($rules, $errors)) {
                $data['validation'] = $this->validator;
            } else {
                $model = new UserModel();
                $user = $model->where('username', $this->request->getVar('username'))->first();

                $this->setUserSession($user);

                if (session()->get('role') == 'player') {
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
                $model = new UserModel();

                $newData = [
                    'username' => $this->request->getVar('username'),
                    'email' => $this->request->getVar('email'),
                    'password' => $this->request->getVar('password'),
                ];
                $model->save($newData);

                session()->setFlashdata('success', 'Registration Success!');
                return redirect()->to('/login');
            }
        }

        return view('register.php', $data);
    }

    public function UserLogout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
