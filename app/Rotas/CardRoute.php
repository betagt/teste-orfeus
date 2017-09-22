<?php
/**
 * Created by PhpStorm.
 * User: dsoft
 * Date: 06/02/2017
 * Time: 16:29
 */

namespace Portal\Rotas;


use Portal\Interfaces\ICustomRoute;
use \Route;

class CardRoute implements ICustomRoute
{

    public static function run()
    {
        Route::group(['prefix' => 'admin', 'middleware' => ['auth:api'], 'namespace' => 'Api\Admin'], function () {
            Route::group(['middleware' => ['acl'], 'is' => 'administrador', 'protect_alias' => 'user'], function () {

            });
        });
        Route::group(['prefix' => 'front', 'middleware' => ['auth:api', 'acl'], 'is' => 'anunciante|administrador,or', 'namespace' => 'Api\Front'], function () {
            Route::post('card/user-card-add/{id}', [
                'as' => 'card.index',
                'uses' => 'CardController@addCards'
            ]);
            Route::resource('card', 'CardController', [
                'except' => ['create', 'edit']
            ]);
        });
    }
}