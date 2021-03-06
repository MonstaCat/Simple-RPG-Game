<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\ItemModel;

class AdminController extends BaseController
{
    public function index()
    {
        $model = new ItemModel();
        $item = $model->findAll();

        $data = [
            'title' => 'RPG | Admin Home',
            'item' => $item
        ];

        $model = new UserModel();

        $data['user'] = $model->where('username', session()->get('username'))->first();

        return view('AdminHome.php', $data);
    }

    public function AddItem()
    {
        $data = [
            'title' => 'RPG | Add Item'
        ];

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'nameItem' => 'required|max_length[50]|is_unique[item.nameItem]',
                'category' => 'required',
                'atk' => 'required|decimal',
                'def' => 'required|decimal',
                'basePrice' => 'required|decimal',
                'sellPrice' => 'required|decimal',
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $model = new ItemModel();
                $rand = "ITEM-" . random_string('alnum', 10);

                $newData = [
                    'idItem' => $rand,
                    'nameItem' => $this->request->getVar('nameItem'),
                    'category' => $this->request->getVar('category'),
                    'atk' => $this->request->getVar('atk'),
                    'def' => $this->request->getVar('def'),
                    'basePrice' => $this->request->getVar('basePrice'),
                    'sellPrice' => $this->request->getVar('sellPrice'),
                ];
                $model->insert($newData);

                session()->setFlashdata('success', 'Adding New Item Success!');
                return redirect()->to('/admin');
            }
        }

        return view('AddItem.php', $data);
    }

    public function EditItem($id)
    {
        $model = new ItemModel();
        $item = $model->where('idItem', $id)->first();

        // Get all categories
        $category = $model->findColumn('category');

        $data = [
            'title' => 'RPG | Edit Item',
            'item' => $item,
            'category' => $category,
            'idItem' => $item['idItem']
        ];


        if ($this->request->getMethod() == 'post') {
            $rules = [
                'nameItem' => 'required|max_length[50]',
                'category' => 'required',
                'basePrice' => 'required|decimal',
                'sellPrice' => 'required|decimal',
            ];

            if (!$this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                $model = new ItemModel();

                $newData = [
                    'idItem' => $this->request->getVar('idItem'),
                    'nameItem' => $this->request->getVar('nameItem'),
                    'category' => $this->request->getVar('category'),
                    'basePrice' => $this->request->getVar('basePrice'),
                    'sellPrice' => $this->request->getVar('sellPrice'),
                ];
                $model->save($newData);

                session()->setFlashdata('success', 'Editing New Item Success!');
                return redirect()->to('/admin');
            }
        }

        return view('EditItem.php', $data);
    }

    public function DeleteItem($id)
    {
        $model = new ItemModel();

        $model->where('idItem', $id)->delete();

        session()->setFlashdata('success', 'Delete Item Success!');
        return redirect()->to('/admin');
    }
}
