<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container-fluid mt-3 mb-3">
    <div class="col-3 grid-item">
        <div class="card bg-light mb-2" style="max-width: 20rem;">
            <div class="card-header pb-0 pt-0">
                <div class="col-12 pl-0">
                    <p class="mb-0" id="username"><?= $user['username'] ?></p>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-2 pr-0">
                        <span class="align-text-bottom">HP</span>
                    </div>
                    <div class="col-10 align-self-center pl-0">
                        <div class="progress">
                            <div class="progress-bar bg-info" role="progressbar" style="width: <?= $user['currentHP'] ?>\0025" aria-valuenow="<?= $user['currentHP'] ?>" aria-valuemin="0" data-percentage="100" aria-valuemax="<?= $user['maxHP'] ?>"><?= $user['currentHP'] ?> / <?= $user['maxHP'] ?></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-info mt-2 mb-0">
                            <div class="row">
                                <div class="col-4 pr-0">
                                    <span class="align-text-bottom">Level <?= $user['level'] ?></span>
                                </div>
                                <div class="col-8 align-self-center pl-0">
                                    <div class="progress" id="exp-bar" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="<?= $user['currentExp'] ?> / <?= $user['maxExp'] ?>">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: <?= $user['currentExp'] ?>\0025" aria-valuenow="<?= $user['currentExp'] ?>" aria-valuemin="0" data-percentage="100" aria-valuemax="<?= $user['maxExp'] ?>"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer p-0">
                <div class="col-12">
                    <p class="text-right mb-0">Coins : <?= $user['coins'] ?></p>
                </div>
            </div>
        </div>
        <ul class="nav nav-pills nav-fill" style="max-width: 20rem;">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#info" onclick="info_clicked()">Info</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#inventory" onclick="dblclick_equipped()">Inventory</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/logout">Logout</a>
            </li>
        </ul>
        <div id="myTabContent" class="tab-content mt-1" style="max-width: 20rem;">
            <div class="tab-pane fade card bg-light active show" id="info">
                <div class="card-body">
                    <div id="AtkDefAjax_Info"></div>
                    <div id="EquipmentInfo"></div>
                </div>
            </div>
            <div class="tab-pane fade card bg-light" id="inventory">
                <div class="card-body">
                    <div id="AtkDefAjax_Inventory"></div>
                    <div id="InventoryListAjax"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-5 grid-item">
        <div class="card bg-light mb-3">
            <div class="card-body">
                <?= form_open('/match/add_battle'); ?>
                <div class="form-group">
                    <label>Select Map</label>
                    <select class="form-control" onchange="locSelect()" id="locationSelect">
                        <option value="default">- Select Map -</option>
                        <?php foreach ($location as $row) : ?>
                            <option value="<?= $row['idLocation'] ?>"><?= $row['nameLocation'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div id="mobSelect"></div>
                <button type="submit" class="btn btn-danger">Battle!</button>
                <?= form_close(); ?>
            </div>
        </div>
        <div class="card bg-light mt-3">
            <div class="card-body">
                <label>Battle Log</label>
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th scope="col">
                                Monster
                            </th>
                            <th scope="col">
                                Status
                            </th>
                            <th scope="col">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($BattleLog as $row) : ?>
                            <tr>
                                <td>
                                    <?= $row['nameMob'] ?>
                                </td>
                                <td>
                                    <?= $row['battleStatus'] ?>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-warning">Continue</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-4 grid-item">
        <div class="card bg-light">
            <div class="card-body">
                <h3>Leaderboard</h3>
                <ul class="nav nav-pills nav-fill">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#levels">Levels</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#coins">Coins</a>
                    </li>
                </ul>
                <div id="myTabContent" class="tab-content mt-1">
                    <div class="tab-pane fade card bg-light active show" id="levels">
                        <div class="card-body">
                            <table class="table table-sm">
                                <tbody>
                                    <?php foreach ($LevelLeaderboard as $row) : ?>
                                        <tr>
                                            <td>
                                                <?= $row['username'] ?>
                                            </td>
                                            <td>
                                                Level <?= $row['level'] ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade card bg-light" id="coins">
                        <div class="card-body">
                            <table class="table table-sm">
                                <tbody>
                                    <?php foreach ($CoinLeaderboard as $row) : ?>
                                        <tr>
                                            <td>
                                                <?= $row['username'] ?>
                                            </td>
                                            <td>
                                                Coins <?= $row['coins'] ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
<?= $this->endSection() ?>