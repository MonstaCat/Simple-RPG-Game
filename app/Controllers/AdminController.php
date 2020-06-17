<?php

namespace App\Controllers;

use App\Models\UserModel;

class AdminController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'RPG | Admin Home'
        ];

        $model = new UserModel();

        $data['user'] = $model->where('username', session()->get('username'))->first();

        return view('AdminHome.php', $data);
    }

    public function AdminProfile()
    {
        $data = [
            'title' => 'RPG | Admin Profile'
        ];

        $model = new UserModel();

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'level' => 'is_natural_no_zero',
                'currentExp' => 'decimal',
                'maxExp' => 'is_natural_no_zero',
                'currentHP' => 'decimal',
                'maxHP' => 'is_natural_no_zero',
                'atk' => 'decimal',
                'def' => 'decimal',
            ];

            if ($this->request->getPost('password') != '') {
                $rules['password'] = 'required|min_length[8]|max_length[255]';
                $rules['password_confirm'] = 'matches[password]';
            }

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $newData = [
                    'username' => session()->get('username'),
                    'level' => $this->request->getVar('level'),
                    'currentExp' => $this->request->getVar('currentExp'),
                    'maxExp' => $this->request->getVar('maxExp'),
                    'currentHP' => $this->request->getVar('currentHP'),
                    'maxHP' => $this->request->getVar('maxHP'),
                    'atk' => $this->request->getVar('atk'),
                    'def' => $this->request->getVar('def'),
                ];

                if ($this->request->getPost('password') != '') {
                    $newData['password'] = $this->request->getVar('password');
                }

                $model->save($newData);

                session()->setFlashdata('success', 'Update Success!');
                return redirect()->to('/profile');
            }
        }

        $data['user'] = $model->where('username', session()->get('username'))->first();

        return view('AdminProfile.php', $data);
    }
}
