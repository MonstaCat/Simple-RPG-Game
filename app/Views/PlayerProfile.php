<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 pt-3 pb-3 bg-white">
            <?= form_open('/profile'); ?>
            <h3>Player Profile</h3>
            <hr>
            <?php if (!empty(session()->getFlashData('success'))) : ?>
                <div class="alert alert-dismissible alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <p class="mb-0">
                        <?= session()->getFlashData('success'); ?>
                    </p>
                </div>
            <?php endif; ?>
            <div class="row">
                <div class="col-12 col-sm-6">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input readonly type="text" class="form-control" name="username" id="username" value="<?= set_value('username', $user['username']) ?>" autocomplete="off">
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="form-group">
                        <label for="level">Level</label>
                        <input type="text" class="form-control" name="level" id="level" value="<?= set_value('level', $user['level']) ?>" autocomplete="off">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input readonly type="email" class="form-control" name="email" id="email" value="<?= set_value('email', $user['email']) ?>" autocomplete="off">
            </div>
            <div class="row">
                <div class="col-12 col-sm-6">
                    <div class="form-group">
                        <label for="currentExp">Current Exp</label>
                        <input type="text" class="form-control" name="currentExp" id="currentExp" value="<?= set_value('currentExp', $user['currentExp']) ?>">
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="form-group">
                        <label for="maxExp">Max Exp</label>
                        <input type="text" class="form-control" name="maxExp" id="maxExp" value="<?= set_value('maxExp', $user['maxExp']) ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-6">
                    <div class="form-group">
                        <label for="currentHP">Current HP</label>
                        <input type="text" class="form-control" name="currentHP" id="currentHP" value="<?= set_value('currentHP', $user['currentHP']) ?>">
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="form-group">
                        <label for="maxHP">Max HP</label>
                        <input type="text" class="form-control" name="maxHP" id="maxHP" value="<?= set_value('maxHP', $user['maxHP']) ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-6">
                    <div class="form-group">
                        <label for="atk">Attack</label>
                        <input type="text" class="form-control" name="atk" id="atk" value="<?= set_value('atk', $user['atk']) ?>">
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="form-group">
                        <label for="def">Defense</label>
                        <input type="text" class="form-control" name="def" id="def" value="<?= set_value('def', $user['def']) ?>">
                    </div>
                </div>
            </div>
            <div class=" row">
                <div class="col-12 col-sm-6">
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" value="">
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="form-group">
                        <label for="password_confirm">Password Confirm</label>
                        <input type="password" class="form-control" name="password_confirm" id="password_confirm" value="">
                    </div>
                </div>
            </div>
            <?php if (isset($validation)) : ?>
                <div class="alert alert-dismissible alert-danger pb-0">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <p class="mb-0">
                        <?= $validation->listErrors(); ?>
                    </p>
                </div>
            <?php endif; ?>
            <div class="row">
                <div class="col-12 col-sm-4">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>
</div>
<?= $this->endSection() ?>