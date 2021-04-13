<?php

use Illuminate\Support\Facades\Route;

Route::get('commands/{command}', function($command) {
    try {
        \Illuminate\Support\Facades\Artisan::call($command);
    } catch(\Exception $e){
        dd($e->getMessage());
    }

    echo \Illuminate\Support\Facades\Artisan::output();
});

Route::get('image_show/{filename}', 'ImageController@displayImage')->name('image.show');
Route::get('receive/billEntry', 'Admin\ReceiveController@bills')->name('bills.list');
Route::get('receive/billOverdue', 'Admin\ReceiveController@billOverdue')->name('bills.list');

Route::group(['prefix'=>'/ecommerce', 'namespace' => 'Ecommerce', 'as' => 'ecommerce.'], function() {

    Route::get('/{slug}', ['uses' => 'EcommerceController@index'])->name('index');
    Route::get('/comprar/{product}', ['uses' => 'EcommerceController@add_cart'])->name('add_cart');
    Route::get('/carrinho/{slug}', ['uses' => 'EcommerceController@cart'])->name('cart');
    Route::get('/clear-cart/{slug}', ['uses' => 'EcommerceController@clear'])->name('cart-clear');
    Route::get('/carrinho/retirar-produto/{product}/{slug}', ['uses' => 'EcommerceController@delete_product'])->name('delete_product');
    Route::get('/visualizar-compra/{slug}', ['uses' => 'EcommerceController@show_cart'])->name('show_cart');
    Route::post('/finalizar-compra/{slug}', ['uses' => 'EcommerceController@checkout'])->name('checkout');
    Route::post('confirmar-compra/{slug}', ['uses' => 'EcommerceController@confirm'])->name('confirm');
    Route::get('confirmar-compra/{slug}', ['uses' => 'EcommerceController@login_register'])->name('confirm.get');
    Route::get('completo/{client:slug}', ['uses' => 'EcommerceController@completed'])->name('completed');
});

Auth::routes(['register' => false]);

Route::prefix('/gestao')->name('gestao.')->namespace('Gestao')->group(function(){
    Route::get('/','GestaoController@index')->name('home');

    Route::post('/product/upload','ProductsController@uploads')->name('products.uploads');
    Route::post('/client/upload/banner','GestaoController@upload_banner')->name('client.upload_banner');

    Route::resource('catalogs', 'CatalogsController');
    Route::resource('products', 'ProductsController');
    Route::resource('categories', 'CategoriesController');
    Route::resource('orders', 'OrdersController');

    Route::namespace('Auth')->group(function(){

        //Login Routes
        Route::get('/login','ClientLoginController@showLoginForm')->name('login');
        Route::post('/login','ClientLoginController@login')->name('login-post');
        Route::post('/logout','ClientLoginController@logout')->name('logout');

        //Forgot Password Routes
        Route::get('/password/reset','ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::post('/password/email','ForgotPasswordController@sendResetLinkEmail')->name('password.email');

        //Reset Password Routes
        Route::get('/password/reset/{token}','ResetPasswordController@showResetForm')->name('password.reset');
        Route::post('/password/reset','ResetPasswordController@reset')->name('password.update');

    });
});



// ROTAS DO DASH ADMIN
Route::group(['prefix'=>'/admin',  'namespace' => 'Admin', 'middleware' => ['auth']], function() {

    Route::get('/', ['as' => 'admin.dash', 'uses' => 'AdminController@index']);

    Route::resource('/clients', 'ClientsController');
    Route::get('/clients/delete/photo/{attachment}/{client}', 'ClientsController@photos')->name('clients.photo');

    Route::resource('/advertisements', 'AdvertisementsController');

    Route::resource('/users', 'UsersController');

    Route::resource('/payments', 'PaymentsController');

    Route::resource('/categories', 'CategoriesController');

    Route::resource('/contracts', 'ContractsController');

    Route::resource('/configs', 'ConfigsController');

    Route::resource('/usefuls', 'UsefulsController');

    Route::resource('/projects', 'ProjectsController');

    Route::resource('/banners', 'BannersController');

    Route::resource('/receive', 'ReceiveController');

    Route::resource('/news', 'NewsController');

    Route::resource('/adverts', 'AdvertController');

    Route::resource('/newscategory', 'NewsCategoryController');

    Route::get('promotions/clients', 'PromotionsController@clients')->name('promotions.list');
    Route::get('promotions/list-promotions/{client}', 'PromotionsController@list_promotions')->name('promotions.list-catalogs');
    Route::get('promotions/create/{client}', 'PromotionsController@create')->name('promotions.create');
    Route::post('promotions/store/{client}', 'PromotionsController@store')->name('promotions.store');
    Route::get('promotions/edit/{promotion}/{client}', 'PromotionsController@edit')->name('promotions.edit');
    Route::post('promotions/update/{promotion}/{client}', 'PromotionsController@update')->name('promotions.update');
    Route::delete('promotions/destroy/{promotion}/{client}', 'PromotionsController@destroy')->name('promotions.destroy');


    Route::get('raffles/clients', 'RafflesController@clients')->name('raffles.list');
    Route::get('raffles/list-raffles/{client}', 'RafflesController@list_raffles')->name('raffles.list-raffles');
    Route::get('raffles/create/{client}', 'RafflesController@create')->name('raffles.create');
    Route::post('raffles/store/{client}', 'RafflesController@store')->name('raffles.store');
    Route::get('raffles/edit/{raffle}/{client}', 'RafflesController@edit')->name('raffles.edit');
    Route::post('raffles/update/{raffle}/{client}', 'RafflesController@update')->name('raffles.update');
    Route::delete('raffles/destroy/{raffle}/{client}', 'RafflesController@destroy')->name('raffles.destroy');
    Route::get('raffles/competitors/{raffle}/{client}', 'RafflesController@competitors')->name('raffles.competitors');
    Route::get('raffles/competitors/gift/{raffle}/{client}', 'RafflesController@gift')->name('raffles.competitors.gift');

    Route::get('catalogs/clients', 'CatalogsController@clients')->name('catalogs.list');
    Route::get('catalogs/list-catalogs/{client}', 'CatalogsController@list_catalogs')->name('catalogs.list-catalogs');
    Route::get('catalogs/create/{client}', 'CatalogsController@create')->name('catalogs.create');
    Route::post('catalogs/store/{client}', 'CatalogsController@store')->name('catalogs.store');
    Route::get('catalogs/edit/{catalog}/{client}', 'CatalogsController@edit')->name('catalogs.edit');
    Route::post('catalogs/update/{catalog}/{client}', 'CatalogsController@update')->name('catalogs.update');
    Route::delete('catalogs/destroy/{catalog}/{client}', 'CatalogsController@destroy')->name('catalogs.destroy');

    Route::get('ecommerce/clients', 'EcommerceController@clients')->name('ecommerce.list');
    Route::get('ecommerce/list-ecommerce/{client}', 'EcommerceController@list_catalogs')->name('ecommerce.list-catalogs');
    Route::get('ecommerce/create/{client}', 'EcommerceController@create')->name('ecommerce.create');
    Route::post('ecommerce/store/{client}', 'EcommerceController@store')->name('ecommerce.store');
    Route::get('ecommerce/edit/{ecommerce}/{client}', 'EcommerceController@edit')->name('ecommerce.edit');
    Route::post('ecommerce/update/{ecommerce}/{client}', 'EcommerceController@update')->name('ecommerce.update');
    Route::delete('ecommerce/destroy/{ecommerce}/{client}', 'EcommerceController@destroy')->name('ecommerce.destroy');

    Route::resource('/orders', 'OrdersController');
});

// ROTAS DO SITE
Route::group(['prefix'=>'/', 'namespace' => 'Home', 'as' => 'home.'], function() {

    Route::get('/', ['uses' => 'SiteController@novo'])->name('index');
    Route::get('/hoje-em-cachoeira', ['uses' => 'SiteController@novo'])->name('index');
    Route::post('/busca', ['uses' => 'SiteController@search'])->name('search');
    Route::get('noticia/{news:slug}', ['uses' => 'SiteController@news'])->name('news');
    Route::get('projeto/{slug}', ['uses' => 'SiteController@projectDetail'])->name('project.details');
    Route::get('/contato', ['uses' => 'SiteController@contact'])->name('contact');
    Route::POST('/contato', ['uses' => 'SiteController@sendContact'])->name('send.contact');
    Route::get('/quem-somos', ['uses' => 'SiteController@about'])->name('about');
    Route::get('/projetos/hoje', ['uses' => 'SiteController@projects'])->name('projects');
    Route::get('/cadastro/anuncie-conosco', ['uses' => 'SiteController@register'])->name('register');
    Route::get('/categorias/todas', ['uses' => 'SiteController@categories'])->name('categories');
    Route::get('/categorias/{slug}', ['uses' => 'SiteController@category'])->name('category');
    Route::get('politica-de-privacidade', ['uses' => 'SiteController@policies'])->name('policies');
    Route::get('termos-de-uso', ['uses' => 'SiteController@terms'])->name('terms');
    Route::get('catalogos/{slug}', ['uses' => 'SiteController@catalogs'])->name('catalogs');
    Route::get('catalogo/{catalog}', ['uses' => 'SiteController@catalog'])->name('catalog');
    Route::get('{slug}/detalhes', ['uses' => 'SiteController@details'])->name('linhk.details');
    Route::get('/{slug}', ['uses' => 'SiteController@details'])->name('details');

    Route::get('{slug}/detalhes', ['uses' => 'SiteController@details'])->name('linhk.details');

    Route::post('participate/promotion/{client}', ['uses' => 'RafflesController@participate'])->name('participate.promotion');
});



Route::get('/home', 'HomeController@index')->name('home');
