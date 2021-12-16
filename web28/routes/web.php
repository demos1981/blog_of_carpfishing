<?php
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//menu page
Route::get('/',IndexController::class )->name('index');
Route::get('/about', 'PageController@about')->name('about');
Route::get('/news',NewsController::class)->name('news');
Route::get('/review', ReviewController::class)->name('review');
Route::get('/ivents', IventsController::class)->name('ivents');
Route::get('/lifehack', LifehackController::class)->name('lifeHack');
Route::get('/author/{key}', NewsByAuthorController::class)->name('news_by_authors');

//single page
Route::get('/news/{id}', SingleNewsController::class)->name('single_news');
Route::get('/review/{id}', SingleReviewController::class)->name('single_review');
Route::get('/ivent/{id}', SingleIventsController::class)->name('single_ivent');
Route::get('/lifehack/{id}', SingleLifehackController::class)->name('single_lifehack');
Route::get('/logistic/{id}', SingleLogisticController::class)->name('single_logistic');
Route::get('/markering/{id}', SingleMarkeringController::class)->name('single_markering');
Route::get('/spomb/{id}', SingleSpombController::class)->name('single_spomb');
Route::get('/catching/{id}', SingleCatchingController::class)->name('single_catching');
Route::get('/storage/{id}', SingleStorageController::class)->name('single_storage');
Route::get('/equipment/{id}', SingleEquipmentController::class)->name('single_equipment');
Route::get('/index/{id}', SingleIndexController::class)->name('single_index');




//left page
Route::get('/logistic',LogisticController ::class)->name('logistic');
Route::get('/storages',StorageController ::class)->name('storages');
Route::get('/spombing',SpombController ::class)->name('spombing');
Route::get('/markering',MarkeringController ::class)->name('markering');
Route::get('/catching',CatchingController ::class)->name('catching');
Route::get('/equipment',EquipmentController ::class)->name('equipment');


//Admin panel.

//add
Route::get('/Admin/add_news','AdminController@add')->name('add_news_get');
Route::post('/Admin/add_news','AdminController@save')->name('add_news_post');

//add review:
Route::get('/Admin/add_review','AdminReviewController@add')->name('add_review_get');
Route::post('/Admin/add_review','AdminReviewController@save')->name('add_review_post');

//add ivent
Route::get('/Admin/add_ivent','AdminIventController@add')->name('add_ivent_get');
Route::post('/Admin/add_ivent','AdminIventController@save')->name('add_ivent_post');

//add lifehack
Route::get('/Admin/add_lifehack','AdminLifehackController@add')->name('add_lifehack_get');
Route::post('/Admin/add_lifehack','AdminLifehackController@save')->name('add_lifehack_post');

//add logistic
Route::get('/Admin/add_logistic','AdminLogisticController@add')->name('add_logistic_get');
Route::post('/Admin/add_logistic','AdminLogisticController@save')->name('add_logistic_post');

//add markering
Route::get('/Admin/add_markering','AdminMarkeringController@add')->name('add_markering_get');
Route::post('/Admin/add_markering','AdminMarkeringController@save')->name('add_markering_post');

//add spomb
Route::get('/Admin/add_spomb','AdminSpombController@add')->name('add_spomb_get');
Route::post('/Admin/add_spomb','AdminSpombController@save')->name('add_spomb_post');

//add catching
Route::get('/Admin/add_catching','AdminCatchingController@add')->name('add_catching_get');
Route::post('/Admin/add_catching','AdminCatchingController@save')->name('add_catching_post');

//add storage
Route::get('/Admin/add_storage','AdminStorageController@add')->name('add_storage_get');
Route::post('/Admin/add_storage','AdminStorageController@save')->name('add_storage_post');

//add index
Route::get('/Admin/add_index','AdminIndexController@add')->name('add_index_get');
Route::post('/Admin/add_index','AdminIndexController@save')->name('add_index_post');



//delete
Route::get('/Admin/delete_news','AdminController@delete')->name('delete_news_get');
Route::delete('/Admin/delete_news','AdminController@delete')->name('delete_news_delete');

//delete review
Route::get('/Admin/delete_review','AdminReviewController@delete')->name('delete_review_get');
Route::delete('/Admin/delete_review','AdminReviewController@delete')->name('delete_review_delete');

//delete ivent
Route::get('/Admin/delete_ivent','AdminIventController@delete')->name('delete_ivent_get');
Route::delete('/Admin/delete_ivent','AdminIventController@delete')->name('delete_ivent_delete');

//delete lifehack
Route::get('/Admin/delete_lifehack','AdminLifehackController@delete')->name('delete_lifehack_get');
Route::delete('/Admin/delete_lifehack','AdminLifehackController@delete')->name('delete_lifehack_delete');

//delete logistic
Route::get('/Admin/delete_logistic','AdminLogisticController@delete')->name('delete_logistic_get');
Route::delete('/Admin/delete_logistic','AdminLogisticController@delete')->name('delete_logistic_delete');

//delete markering
Route::get('/Admin/delete_markering','AdminMarkeringController@delete')->name('delete_markering_get');
Route::delete('/Admin/delete_markering','AdminMarkeringController@delete')->name('delete_markering_delete');

//delete spomb
Route::get('/Admin/delete_spomb','AdminSpombController@delete')->name('delete_spomb_get');
Route::delete('/Admin/delete_spomb','AdminSpombController@delete')->name('delete_spomb_delete');

//delete catching
Route::get('/Admin/delete_catching','AdminCatchingController@delete')->name('delete_catching_get');
Route::delete('/Admin/delete_catching','AdminCatchingController@delete')->name('delete_catching_delete');

//delete index
Route::get('/Admin/delete_index','AdminIndexController@delete')->name('delete_index_get');
Route::delete('/Admin/delete_index','AdminindexController@delete')->name('delete_index_delete');

//edit
Route::get('/Admin/edit_news/{id}','AdminController@edit')->name('edit_news_get');
Route::post('/Admin/edit_news/{id}','AdminController@edit_save')->name('edit_news_post');


//edit review
Route::get('/Admin/edit_review/{id}','AdminReviewController@edit')->name('edit_review_get');
Route::post('/Admin/edit_review/{id}','AdminReviewController@edit_save')->name('edit_review_post');

//edit ivent
Route::get('/Admin/edit_ivent/{id}','AdminIventController@edit')->name('edit_ivent_get');
Route::post('/Admin/edit_ivent/{id}','AdminIventController@edit_save')->name('edit_ivent_post');

//edit lifehack
Route::get('/Admin/edit_lifehack/{id}','AdminLifehackController@edit')->name('edit_lifehack_get');
Route::post('/Admin/edit_lifehack/{id}','AdminLifehackController@edit_save')->name('edit_lifehack_post');

//edit logistic
Route::get('/Admin/edit_logistic/{id}','AdminLogisticController@edit')->name('edit_logistic_get');
Route::post('/Admin/edit_logistic/{id}','AdminLogisticController@edit_save')->name('edit_logistic_post');

//edit markering
Route::get('/Admin/edit_markering/{id}','AdminMarkeringController@edit')->name('edit_markering_get');
Route::post('/Admin/edit_markering/{id}','AdminMarkeringController@edit_save')->name('edit_markering_post');

//edt spomb
Route::get('/Admin/edit_spomb/{id}','AdminSpombController@edit')->name('edit_spomb_get');
Route::post('/Admin/edit_spomb/{id}','AdminSpombController@edit_save')->name('edit_spomb_post');

//edit catching
Route::get('/Admin/edit_catching/{id}','AdminCatchingController@edit')->name('edit_catching_get');
Route::post('/Admin/edit_catching/{id}','AdminCatchingController@edit_save')->name('edit_catching_post');

//edit storage
Route::get('/Admin/edit_storage/{id}','AdminStorageController@edit')->name('edit_storage_get');
Route::post('/Admin/edit_storage/{id}','AdminStorageController@edit_save')->name('edit_storage_post');

//edit index
Route::get('/Admin/edit_index/{id}','AdminindexController@edit')->name('edit_index_get');
Route::post('/Admin/edit_index/{id}','AdminIndexController@edit_save')->name('edit_index_post');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
