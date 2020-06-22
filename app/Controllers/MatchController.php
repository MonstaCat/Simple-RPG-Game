<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\MobModel;
use App\Models\BattleModel;

class MatchController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'RPG | Match Simulation',
        ];

        return view('match.php', $data);
    }

    public function MatchSimulation()
    {
        $PlayerModel = new UserModel();
        $MobModel = new MobModel();
        $BattleModel = new BattleModel();

        $player = $PlayerModel->where('username', session()->get('username'))->first();
        $mob = $MobModel->where('idMob', 'MOB001')->first();
        $battle = $BattleModel->where('username', session()->get('username'))->first();

        $data['player'] = $player;
        $data['mob'] = $mob;
        $random = random_string('alnum', 16);

        $data = [
            'title' => 'RPG | Match Simulation',
            'battle' => $battle,
            'random' => $random
        ];

        $attack = $this->request->getVar('attack');

        if (isset($attack)) {
            $battle = $BattleModel->where('username', session()->get('username'))->first();
            $data = [
                'title' => 'RPG | Match Simulation',
                'battle' => $battle,
            ];

            $playerDamageFormula = $battle['playerATK'] - $battle['mobDEF'];
            $mobDamageFormula = $battle['mobATK'] - $battle['playerDEF'];

            $newData = [
                'idBattle' => 'gF5bOqTcK1EdDpZy',
                'mobHP' => $battle['mobHP'] - $playerDamageFormula,
                'playerHP' => $battle['playerHP'] - $mobDamageFormula
            ];

            $BattleModel->save($newData);
            unset($attack);
            return redirect()->to('/match');
        }

        return view('/match', $data);
    }
}
