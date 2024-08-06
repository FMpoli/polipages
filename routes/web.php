<?php

use Illuminate\Support\Facades\Route;
use Detit\Polipages\Http\Controllers\ContactFormController;

Route::post('/pageSendMail', [ContactFormController::class, 'index'])->name('page.sendmail'); //Invia mail
