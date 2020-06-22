<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 pt-3 pb-3 bg-white">
            <?= form_open('/admin/add_item'); ?>
            <h3>Add New Item</h3>
            <hr>
            <div class="row">
                <div class="col-12 col-sm-6">
                    <div class="form-group">
                        <label for="idItem">ID</label>
                        <input type="text" class="form-control" name="idItem" id="idItem" value="<?= set_value('idItem') ?>" autocomplete="off">
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="form-group">
                        <label for="nameItem">Item Name</label>
                        <input type="text" class="form-control" name="nameItem" id="nameItem" value="<?= set_value('nameItem') ?>" autocomplete="off">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" name="category" id="category">
                    <option value="Material">Material</option>
                    <option value="Hat">Hat</option>
                    <option value="Armor">Armor</option>
                    <option value="Shoes">Shoes</option>
                </select>
            </div>
            <div class="row">
                <div class="col-12 col-sm-6">
                    <div class="form-group">
                        <label for="basePrice">Base Price</label>
                        <input type="number" class="form-control" name="basePrice" id="basePrice" value="<?= set_value('basePrice') ?>">
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="form-group">
                        <label for="sellPrice">Sell Price</label>
                        <input type="number" class="form-control" name="sellPrice" id="sellPrice" value="<?= set_value('sellPrice') ?>">
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
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>