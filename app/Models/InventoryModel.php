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
        $query = $db->query("SELECT inventory.idInventory, inventory.username, item.nameItem, item.category, inventory.qty, inventory.isEquipped 
                            FROM item 
                            JOIN inventory ON item.idItem=inventory.idItem 
                            WHERE inventory.username = '$user'");

        return $row = $query->getResultArray();
    }

    public function EquipmentInfo()
    {
        $user = session()->get('username');
        $db = \Config\Database::connect();
        $query = $db->query("SELECT inventory.idInventory, inventory.username, item.nameItem, item.category, inventory.qty, inventory.isEquipped
                            FROM item 
                            JOIN inventory ON item.idItem=inventory.idItem 
                            WHERE inventory.username = '$user'");

        return $row = $query->getResultArray();
    }

    public function SumAtkDef()
    {
        $user = session()->get('username');
        $db = \Config\Database::connect();
        $query = $db->query("SELECT SUM(item.def) as defense, SUM(item.atk) as attack
                            FROM inventory
                            LEFT JOIN item ON item.idItem=inventory.idItem
                            WHERE inventory.isEquipped='True' AND inventory.username='$user'");

        return $row = $query->getResultArray();
    }
}
