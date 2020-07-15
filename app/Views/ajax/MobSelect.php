<div class="form-group">
    <select class="form-control" name="mob">
        <?php foreach ($mob as $row) : ?>
            <option value="<?= $row['idMob'] ?>"><?= $row['nameMob'] ?></option>
        <?php endforeach; ?>
    </select>
</div>