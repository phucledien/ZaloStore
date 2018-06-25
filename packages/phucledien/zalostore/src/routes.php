<?php 

Route::get('calculator', function() {
    echo 'Hello from the calculator package!';
});

Route::get('add/{a}/{b}', 'Phucledien\Zalostore\CalculatorController@add');
Route::get('subtract/{a}/{b}', 'Phucledien\Zalostore\CalculatorController@subtract');

