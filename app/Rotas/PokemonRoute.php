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

class PokemonRoute implements ICustomRoute
{

    public static function run()
    {
        Route::group(['prefix'=>'admin','middleware' => ['auth:api'],'namespace'=>'Api\Admin'],function (){
            Route::group(['middleware' => ['acl'],'is' => 'administrador', 'protect_alias'  => 'user'],function (){

            });
        });
        Route::group(['prefix'=>'front','middleware' => ['auth:api','acl'],'is' => 'anunciante|administrador,or','namespace'=>'Api\Front'],function (){
            Route::post('pokemon/add', [
                'as' => 'pokemon.index',
                'uses' => 'PokemonController@store'
            ]);
            Route::resource('pokemon', 'PokemonController',[
                'except' => ['store', 'create', 'edit']
            ]);
        });
    }
}