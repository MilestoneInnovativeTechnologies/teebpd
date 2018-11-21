<?php

Route::group([
    'namespace' => 'Milestone\\Teebpd\\Controller'
],function(){
    Route::view('/', 'teebpd::products_index')->name('home');
    Route::get('product/{id}', 'ProductController@detail')->name('product.detail');
    Route::get('wishlist', 'WishListController@page')->name('wishlist');
    Route::get('wishlist/{id}', 'WishListController@detail')->name('wishlist.detail');
    Route::get('wishlist/delete/{id}', 'WishListController@delete')->name('wishlist.delete');
    Route::post('visitor_store', 'VisitorController@store')->name('store.visitor');
    Route::post('visitor_clear', 'VisitorController@clear')->name('clear.visitor');
    Route::post('wishlist', 'WishListController@store');
    Route::post('wishlist_addproduct', 'WishListController@product')->name('wishlist.add.product');
    Route::post('wishlist_note', 'WishListController@note')->name('add.note');
    Route::post('wishlist_share', 'WishListController@share')->name('share');
    Route::get('wishlist_share_alter', 'WishListController@alter')->name('share.alter');
    Route::post('wishlist_product_alter', 'WishListController@edit')->name('product.alter');
    Route::post('wishlistproduct_note', 'WishListProductController@note')->name('wlp.note');
});
