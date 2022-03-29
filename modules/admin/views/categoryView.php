<?php 
    $categorys = get_all_categorys();
?>

<div class="admin__category">
    <h1 class="admin__category-title admin__title">danh mục sản phẩm</h1>
    <div class="admin__category-add">
        <a class="btn btn-primary admin__add" href="?mod=admin&act=addcategory" role="button">Thêm danh mục</a>
    </div>
    <div class="admin__category-head admin__head">
        <ul>
            <li>Stt</li>
            <li>Danh mục sản phẩm</li>
            <li>Quản lý</li>
        </ul>
    </div>
    <div class="admin__category-body">
        <ul>
            <?php $index = 1 ?>
            <?php foreach($categorys as $category): ?>
            <div class="admin__category-body__list">
                <li><?= $index++; ?></li>
                <li><?= $category['name_category'] ?></li>
                <li>
                    <a href="?mod=admin&act=updateCategory&idCategory=<?=$category['id_category']?>">
                        <i class="admin__update fas fa-pen-square"></i>
                    </a>

                    <a onclick="return del('<?= $category['name_category']?>')"
                    href="?mod=admin&act=deleteCategory&idCategory=<?=$category['id_category']?>"">
                        <i class="admin__del fas fa-trash-alt"></i>
                    </a>
                </li>
            </div>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
