<?php

namespace App\Models;

use CodeIgniter\Model;

class ItemModel extends Model
{
    protected $table = 'item';
    protected $primaryKey = 'idItem';
    protected $allowedFields = ['idItem', 'nameItem', 'category', 'sellPrice', 'basePrice'];
}
