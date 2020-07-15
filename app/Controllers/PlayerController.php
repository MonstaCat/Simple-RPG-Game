<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\LocationModel;
use App\Models\MobModel;
use App\Models\BattleModel;
use App\Models\InventoryModel;

class PlayerController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'RPG | Home'
        ];

        $UserModel = new UserModel();
        $LocationModel = new LocationModel();
        $BattleModel = new BattleModel();
        $InventoryModel = new InventoryModel();

        $data['user'] = $UserModel->where('username', session()->get('username'))->first();
        $data['LevelLeaderboard'] = $UserModel->orderBy('level', 'DESC')->findAll(5);
        $data['CoinLeaderboard'] = $UserModel->orderBy('coins', 'DESC')->findAll(5);
        $data['location'] = $LocationModel->findAll();
        $data['BattleLog'] = $BattleModel->where('username', session()->get('username'))->findAll();
        $data['inventory'] = $InventoryModel->InventoryList();

        return view('PlayerHome.php', $data);
    }

    public function PlayerProfile()
    {
        $data = [
            'title' => 'RPG | Player Profile'
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

        return view('PlayerProfile.php', $data);
    }

    public function FindMob($id)
    {
        $data = [
            'title' => 'RPG | Home'
        ];

        $MobModel = new MobModel();
        $data['mob'] = $MobModel->where('idLocation', $id)->findAll();

        return view('ajax/MobSelect.php', $data);
    }

    public function FindInventory($id)
    {
        $data = [
            'title' => 'RPG | Home'
        ];

        $InventoryModel = new InventoryModel();
        $data['inventory'] = $InventoryModel->InventoryList();

        return view('ajax/InventoryList.php', $data);
    }

    public function EquippedItem($id)
    {
        $data = [
            'title' => 'RPG | Home'
        ];

        $InventoryModel = new InventoryModel();
        $data['inventory'] = $InventoryModel->InventoryList();

        $equippedStatus = $InventoryModel->where('idInventory', $id)->first();
        if ($equippedStatus['isEquipped'] == "False") {
            $status = "True";
        } else {
            $status = "False";
        }

        $saveData = [
            'idInventory' => $id,
            'isEquipped' => $status
        ];

        $InventoryModel->save($saveData);

        return view('ajax/InventoryList.php', $data);
    }
}
