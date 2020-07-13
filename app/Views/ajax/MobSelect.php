<div class="form-group">
    <select class="form-control">
        <?php foreach ($mob as $row) : ?>
            <option value="<?= $row['idMob'] ?>"><?= $row['nameMob'] ?></option>
        <?php endforeach; ?>
    </select>
</div>