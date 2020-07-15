<?php

namespace App\Models;

use CodeIgniter\Model;

class InventoryModel extends Model
{
    protected $table = 'inventory';
    protected $primaryKey = 'idInventory';
    protected $allowedFields = [
        'idInventory',
        'username',
        'idItem',
        'qty',
        'isEquipped'
    ];

    public function InventoryList()
    {
        $user = session()->get('username');
        $db = \Config\Database::connect();
        $query = $db->query("SELECT inventory.idInventory, item.nameItem, inventory.qty, inventory.isEquipped FROM item JOIN inventory ON item.idItem=inventory.idItem WHERE inventory.username = '$user'");

        return $row = $query->getResultArray();
    }
}
