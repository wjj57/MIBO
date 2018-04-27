<?php

// 定义路由

$class = workflowOfSingerView\releaseModule\ReleaseController::class;

Route::get('/singer/release/album', $class . "@releaseAlbum");

