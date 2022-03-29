<?php 
    if(isset($_POST['addCategory'])){
        $txtcategory = preg($_POST['txtcategory']);
        if($txtcategory == ""){
            $error['txtcategory'] = "vui lòng nhập tên danh mục muốn thêm";
        }else{
            $infor_category = [
                'name_category' => $txtcategory
            ];
            add_categorys($infor_category);
            load_view('category');
            return;
        }
    }

?>

<form action="" method="POST" enctype="multipart/form-data">
    <label for="inputPassword5" class="form-label admin__title">Thêm danh mục</label>
    <input type="text" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock" name="txtcategory">
    <p id="passwordHelpBlock" class="form-text">
        <?= !empty($error['txtcategory']) ? $error['txtcategory'] : "" ?>
    </p>
    <input type="submit" class="btn btn__add-category" value="thêm danh mục" name="addCategory">
</form>