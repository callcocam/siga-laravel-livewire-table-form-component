<?php
Route::group(['middleware' => 'web'], function () {
    Route::post('/lw-forms/file-upload', function () {
        return call_user_func([request()->input('component'), 'fileUpload']);
    })->name('lw-forms.file-upload');
});