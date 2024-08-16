<?php
//namespace App\Lib\MyApp\Landing\Controller;
use Illuminate\Support\Facades\Route;
Route::resource('/task', 'Zeemo\Gptai\Controllers\GptaiController');
Route::resource('/mapfield', 'Zeemo\Gptai\Controllers\GptaiMapController');
Route::get('/chatsetting', 'Zeemo\Gptai\Controllers\GptaiMapSettingContorller@setting')->name('setting');
Route::post('/chatsetting', 'Zeemo\Gptai\Controllers\GptaiMapSettingContorller@update')->name('update');
Route::get('/restapiuser', 'Zeemo\Gptai\Controllers\GptaiMapSettingContorller@restapiuser')->name('apisetting');
Route::post('/registerapiuser', 'Zeemo\Gptai\Controllers\GptaiMapSettingContorller@postapiuser')->name('postapiuser');
Route::get('/registerapidelete/{delid}', 'Zeemo\Gptai\Controllers\GptaiMapSettingContorller@delete')->name('registerapidelete.delete');
Route::post('/traineddata', 'Zeemo\Gptai\Controllers\GptaiMapSettingContorller@createdata')->name('createdata');



//Route::get('/mapfield', 'Zeemo\Gptai\Controllers\GptaiMapController@mapfield');
//Route::post('/mapfield', 'Zeemo\Gptai\Controllers\GptaiMapController@store')->name('GptaiMapController.store');
//Route::get('/mapfield', 'Zeemo\Gptai\Controllers\GptaiMapController@mapfield')->name('mapfield');