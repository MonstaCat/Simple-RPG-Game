<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <p>Hello player, <?= $user['username'] ?></p>
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <label for="progress">EXP:</label>
            <div class="progress">
                <div class="progress-bar bg-success" role="progressbar" style="width: <?= $user['currentExp'] ?>\0025" aria-valuenow="<?= $user['currentExp'] ?>" aria-valuemin="0" data-percentage="100" aria-valuemax="<?= $user['maxExp'] ?>"><?= $user['currentExp'] ?> / <?= $user['maxExp'] ?></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-3 mt-3">
            <label for="progress">HP:</label>
            <div class="progress">
                <div class="progress-bar bg-danger" role="progressbar" style="width: <?= $user['currentHP'] ?>\0025" aria-valuenow="<?= $user['currentHP'] ?>" aria-valuemin="0" data-percentage="100" aria-valuemax="<?= $user['maxHP'] ?>"><?= $user['currentHP'] ?> / <?= $user['maxHP'] ?></div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>