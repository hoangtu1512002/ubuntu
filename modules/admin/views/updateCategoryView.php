<?php 
$categoryId = (int)($_GET['idCategory']);
$categoryUpdate = get_category_by_id($categoryId);

if(isset($_POST['updateCategory'])){
    $txtcategory = preg($_POST['txtcategory']);
    if($txtcategory == ""){
        $error['txtcategory'] = "vui lòng nhập tên danh mục muốn thêm";
    }else{
        $infor_category = [
            'name_category' => $txtcategory
        ];    
        update_category_by_id($categoryId,$infor_category);
        load_view('category');
        return;
    }
}

?>

<form action="" method="POST" enctype="multipart/form-data">
    <label for="inputPassword5" class="form-label admin__title">Sửa danh mục</label>
    <input type="text" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock" name="txtcategory"
    value="<?=isset($categoryUpdate['name_category'])?$categoryUpdate['name_category']:""?>">
    <p id="passwordHelpBlock" class="form-text">
        <?= !empty($error['txtcategory']) ? $error['txtcategory'] : "" ?>
    </p>
    <input type="submit" class="btn btn__add-category" value="sưa danh mục" name="updateCategory">
</form>