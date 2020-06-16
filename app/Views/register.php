<div class="container">
    <div class="row">
        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 pt-3 pb-3 bg-white">
            <?= form_open('/register'); ?>
            <h3>Register</h3>
            <hr>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" id="username" value="<?= set_value('username') ?>" autocomplete="off">
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" name="email" id="email" value="<?= set_value('email') ?>" autocomplete="off">
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
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
                <div class="col-12 col-sm-8 text-right">
                    <a href="/login">Already have an account?</a>
                </div>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>
</div>