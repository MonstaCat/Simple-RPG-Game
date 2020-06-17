<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 pt-3 pb-3 bg-white form-wrapper">
            <div class="container">
                <?php if (!empty(session()->getFlashData('warning'))) : ?>
                    <div class="alert alert-dismissible alert-warning">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <p class="mb-0">
                            <?= session()->getFlashData('warning'); ?>
                        </p>
                    </div>
                <?php endif; ?>
                <?php if (!empty(session()->getFlashData('success'))) : ?>
                    <div class="alert alert-dismissible alert-success">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <p class="mb-0">
                            <?= session()->getFlashData('success'); ?>
                        </p>
                    </div>
                <?php endif; ?>
                <?= form_open('/login'); ?>
                <h3>Login</h3>
                <hr>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" id="username" value="<?= set_value('username') ?>" autocomplete="off">
                </div>
                <div class=" form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" value="">
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
                        <button type="submit" class="btn btn-md btn-primary">Login</button>
                    </div>
                    <div class="col-12 col-sm-8 text-right">
                        <a href="/register">Don't have an account yet?</a>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>