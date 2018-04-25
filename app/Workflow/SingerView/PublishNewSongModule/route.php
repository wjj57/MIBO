<?php

use Illuminate\Support\Facades\Route;


Route::get('/courseOnline/test',\App\Workflow\WhichModule\CourseOnline\CourseOnlineController::class.'@test');


