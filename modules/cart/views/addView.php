<?php 
if(empty($_GET['id'])){
    load_view('index');
}else{
    $id = (int)$_GET['id'];
    addCart($id);
    load_view('index');
}