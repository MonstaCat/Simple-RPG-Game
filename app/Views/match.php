<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col-10 col-md-4">
            <label for="progress">HP</label>
            <div class="progress">
                <div class="progress-bar bg-danger" role="progressbar" style="width: <?= $battle['playerHP'] ?>\0025" aria-valuenow="<?= $battle['playerHP'] ?>" aria-valuemin="0" data-percentage="100" aria-valuemax="<?= $battle['playerMaxHP'] ?>"><?= $battle['playerHP'] ?></div>
            </div>
            <p><?= $battle['username'] ?></p>
            <p>ATK: <?= $battle['playerATK'] ?></p>
            <p>DEF: <?= $battle['playerDEF'] ?></p>
        </div>
        <div class="col-4">

        </div>
        <div class="col-10 col-md-4 text-right">
            <label for="progress">HP</label>
            <div class="progress">
                <div class="progress-bar bg-danger" role="progressbar" style="width: <?= $battle['mobHP'] ?>\0025" aria-valuenow="<?= $battle['mobHP'] ?>" aria-valuemin="0" data-percentage="100" aria-valuemax="<?= $battle['mobMaxHP'] ?>"><?= $battle['mobHP'] ?></div>
            </div>
            <p><?= $battle['nameMob'] ?></p>
            <p>ATK: <?= $battle['mobATK'] ?></p>
            <p>DEF: <?= $battle['mobDEF'] ?></p>
        </div>
    </div>
    <div class="row">
        <div class="col-12 text-center">
            <?= form_open('/match') ?>
            <button class="btn btn-success" type="submit" name="attack">ATTACK</button>
            <?= form_close() ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>