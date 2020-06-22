<?php

namespace App\Models;

use CodeIgniter\Model;

class MobModel extends Model
{
    protected $table = 'mob';
    protected $primaryKey = 'idMob';
    protected $allowedFields = ['idItem', 'nameMob', 'currentHP', 'maxHP', 'atk', 'def'];
}
