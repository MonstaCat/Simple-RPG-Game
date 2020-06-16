<div class="container">
    <div class="row">
        <div class="col-12">
            <p>Hello player, <?= session()->get('username') ?></p>
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <label for="progress">EXP:</label>
            <div class="progress">
                <div class="progress-bar bg-success" role="progressbar" style="width: <?= session()->get('currentExp') ?>%" aria-valuenow="<?= session()->get('currentExp') ?>" aria-valuemin="0" aria-valuemax="<?= session()->get('maxExp') ?>"><?= session()->get('currentExp') ?> / <?= session()->get('maxExp') ?></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-3 mt-3">
            <label for="progress">HP:</label>
            <div class="progress">
                <div class="progress-bar bg-danger" role="progressbar" style="width: <?= session()->get('currentHP') ?>%" aria-valuenow="<?= session()->get('currentHP') ?>" aria-valuemin="0" data-percentage="100" aria-valuemax="<?= session()->get('maxHP') ?>"><?= session()->get('currentHP') ?> / <?= session()->get('maxHP') ?></div>
            </div>
        </div>
    </div>
</div>