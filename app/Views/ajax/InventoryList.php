<ul class="inven-list p-0 m-0" id="iList">
    <?php foreach ($inventory as $row) : ?>
        <li class="mb-1 inventory-list" ondblclick="dblclick_equipped()" id="InventoryList" data-value="<?= $row['idInventory'] ?>">
            <?= ($row['isEquipped'] == "True") ? "E" : null ?> <?= $row['nameItem'] ?><span class="mb-1 text-right small"> <?= $row['qty'] ?>x</span>
        </li>
    <?php endforeach; ?>
</ul>