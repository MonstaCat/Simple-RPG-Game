<?= $this->extend('/layout/template') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <?php if (!empty(session()->getFlashData('success'))) : ?>
                <div class="alert alert-dismissible alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <p class="mb-0">
                        <?= session()->getFlashData('success'); ?>
                    </p>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="row mb-1">
        <div class="col-12 col-md-6">
            <h3>Item List</h3>
        </div>
        <div class="col-12 col-md-6 pull-left">
            <button class="btn btn-outline-primary float-right" onclick="window.location.href='/admin/add_item'">Add</button>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-sm table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Item Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Base Price</th>
                        <th scope="col">Sell Price</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($item as $row) : ?>
                        <tr>
                            <th scope="row"><?= $row['idItem'] ?></th>
                            <td><?= $row['nameItem'] ?></td>
                            <td><?= $row['category'] ?></td>
                            <td><?= $row['basePrice'] ?></td>
                            <td><?= $row['sellPrice'] ?></td>
                            <td>
                                <button onclick="window.location.href='/admin/edit_item/<?= $row['idItem'] ?>'" class="btn btn-sm btn-warning">Edit</button>
                                <button onclick="window.location.href='/admin/delete_item/<?= $row['idItem'] ?>'" class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>