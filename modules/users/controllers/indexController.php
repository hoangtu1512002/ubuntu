<?php

function construct() {
    load_model('index');
}

function indexAction() {
    load('helper','check');
    load('helper','mail');
    load('helper','url');
    load_view('index');
}

function addAction() {

}

function editAction() {
   
}


