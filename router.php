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
    render('views\html\user.html');
}

function render($html)
{
    $website = file_get_contents($html);
    echo $website;
}
