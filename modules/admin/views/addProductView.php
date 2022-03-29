<?php
$category = get_all_categorys();
$brand = get_all_brand();

if (isset($_POST['addProduct'])) {
    $error = [];
    if (empty($_POST['name'])) {
        $error['name'] = "nhập tên sản phẩm";
    } else {
        $name = preg($_POST['name']);
    }

    if (empty($_POST['price'])) {
        $error['price'] = "nhập giá tiền";
    } else {
        if (!number_check($_POST['price'])) {
            $error['price'] = "nhập đúng giá tiền";
        } else {
            $price = $_POST['price'];
        }
    }

    if (empty($_POST['des'])) {
        $error['des'] = "mô tả sản phẩm";
    } else {
        $description = $_POST['des'];
    }

    if (isset($_FILES['image'])) {
        $upload_dir = "public/uploads/";
        $upload_file = $upload_dir . basename($_FILES['image']['name']);
        $part = $upload_file;
        $upload = $_FILES['image']['tmp_name'];
        $file_size = $_FILES['image']['size'];

        $type_allow = array('png', 'jpg', 'gif', 'jpeg');
        $type = strtolower(pathinfo($part, PATHINFO_EXTENSION));

        if (in_array($type, $type_allow)) {
            move_uploaded_file($upload, $upload_file);
        } else {
            $error['image'] = "chọn file hình ảnh để thêm";
        }
    }

    if(empty($_POST['categoryid'])){
        $error['categoryid'] = "chọn danh mục";
    }else{
        $categoryid = $_POST['categoryid'];
    }

    if(empty($_POST['brandid'])){
        $error['brandid'] = "chọn thương hiệu";
    }else{
        $brandid = $_POST['brandid'];
    }

    if(!$error){
        $infor_product = [
            'id_product' => '',
            'name_product' => $name,
            'description_product' => $description,
            'price' => $price,
            'image' => $upload_file,
            'id_category' => $categoryid,
            'id_brand' => $brandid
        ];
        add_product($infor_product);
        load_view('product');
        return;
    }
}

?>
<form action="" method="POST" enctype="multipart/form-data">
    <label for="inputPassword5" class="form-label admin__title">Thêm sản phẩm</label>
    <div class="form-group">
        <label for="" class="form-label" style="font-size:1.6rem;">Tên sản phẩm</label>
        <input type="text" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock" name="name" value="">
        <p id="passwordHelpBlock" class="form-text">
            <?= !empty($error['name']) ? $error['name'] : "" ?>
        </p>
    </div>

    <div class="form-group">
        <label for="" class="form-label" style="font-size:1.6rem;">Gía tiền</label>
        <input type="text" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock" name="price" value="">
        <p id="passwordHelpBlock" class="form-text">
            <?= !empty($error['price']) ? $error['price'] : "" ?>
        </p>
    </div>

    <div class="form-group">
        <label for="" class="form-label" style="font-size:1.6rem;">Mô tả sản phẩm</label>
        <textarea type="text" name="des" id="editor1" class="form-control"></textarea>
        <p id="passwordHelpBlock" class="form-text">
            <?= !empty($error['des']) ? $error['des'] : "" ?>
        </p>
    </div>

    <div class="form-group">
        <label for="" class="form-label" style="font-size:1.6rem;">hình ảnh</label>
        <input type="file" id="inputPassword5" class="form-control" aria-describedby="passwordHelpBlock" name="image" value=">
        <p id="passwordHelpBlock" class="form-text">
            <?= !empty($error['image']) ? $error['image'] : "" ?>
        </p>
    </div>

    <div class="form-group">
        <label for="" class="form-label" style="font-size:1.6rem;">Thuộc danh mục</label>
        <select id="inputPassword5" class="form-control" name="categoryid">
            <option value="" hidden>
                --chọn danh mục--
            </option>
            <?php foreach ($category as $item) : ?>
                <option value="<?= $item['id_category'] ?>"><?= $item['name_category'] ?></option>
            <?php endforeach; ?>
        </select>
        <p id="passwordHelpBlock" class="form-text">
            <?= !empty($error['categoryid']) ? $error['categoryid'] : "" ?>
        </p>
    </div>

    <div class="form-group">
        <label for="" class="form-label" style="font-size:1.6rem;">Thương hiệu</label>
        <select id="inputPassword5" class="form-control" name="brandid">
            <option value="" hidden>
                --chọn thương hiệu--
            </option>
            <?php foreach ($brand as $item) : ?>
                <option value="<?= $item['brand_id'] ?>"><?= $item['brand_name'] ?></option>
            <?php endforeach; ?>
        </select>
        <p id="passwordHelpBlock" class="form-text">
            <?= !empty($error['brandid']) ? $error['brandid'] : "" ?>
        </p>
    </div>



    <input type="submit" class="btn btn__add-category" value="thêm sản phẩm" name="addProduct">
</form>