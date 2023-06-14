<?php

function login()
{
    render('views\html\login.html');
}

function admin()
{
    render('views\html\admin.html');
}

function user()
{
    $data = array(
        'id' => $_SESSION['user']['id'],
        'username' => $_SESSION['user']['name'],
        'password' => $_SESSION['user']['pasword'],
    );
    renderData('views\html\user.html', $data);
}

function settings()
{
    $data = array(
        'id' => $_SESSION['user']['id'],
        'username' => $_SESSION['user']['name'],
        'password' => $_SESSION['user']['pasword'],
    );
    renderData('views\html\settings.html', $data);
}

function render($html)
{
    $website = file_get_contents($html);
    echo $website;
}

function renderData($html, $data) {
    $website = file_get_contents($html);

    foreach ($data as $key => $value){
        $website = str_replace('{{'. $key . '}}', $value, $website);
    }

    echo $website;
}