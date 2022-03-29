<?php

function construct()
{
    load_model('index');
}

function indexAction()
{
    load('helper','check');
    load('helper','user');
    load('helper','mail');
    load('helper','format');
    load('helper','url');
    login();
}

function addAction()
{

}

function editAction()
{
}

function login()
{   
    if(!isset($_SESSION['admin'])){
        $users = get_list_users();
        $data['users'] = $users;
        load_view('adminLogin',$data);
        return;
    }else{
        load_view('index');
        return;
    }
}


function logout(){
    load('helper','url');
    if(isset($_SESSION['admin']) && $_SESSION['admin']!=null){
        unset($_SESSION['admin']);
        redirect("?mod=admin");
        return;
    }
}





