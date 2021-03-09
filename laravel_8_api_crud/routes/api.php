<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\model\user;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// to insert value route
Route::post('user_group','user_groups@insert_group');//used for user_group
Route::post('user_info','user_groups@insert_user');//used for user
// to get value route
Route::get('user_group','user_groups@read_group');//used for user_group
Route::get('user_info','user_groups@read_user');//used for user
//----- update
Route::put('user_group/{group_id}','user_groups@update_group');
Route::put('user_info/{user_id}','user_groups@update_user');
//----delete
Route::delete('user_group/{group_id}','user_groups@delete_usergroup');
Route::delete('user_info/{user_id}','user_groups@delete_user');
//---get by parameter
Route::get('user_group/{group_id}','user_groups@showbygroupid');
Route::get('user_info/{user_id}','user_groups@showbyuserid');
//------
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
