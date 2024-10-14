<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\API\Entity\UserBitrix as Entity;
use Exception;

class UserBitrixProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton('userBitrix', function ($app) {
            $userBitrix = new Entity;
            $username = session('USR');
            try{
            //return $userBitrix->createAPIConnection()['result'][0]['NAME'];
            //Capturando informações
            $personalPhoto = $userBitrix->getUsers($username)['result'][0]['PERSONAL_PHOTO'];
            $name = $userBitrix->getUsers($username)['result'][0]['NAME'];
            $id = $userBitrix->getUsers($username)['result'][0]['ID'];
            return [
                //'PERSONAL_PHOTO' => $personalPhoto,
                'ID'=>$id,
                'NAME' => $name,
                'PERSONAL_PHOTO' => $personalPhoto
            ];
            }catch(Exception $e){
                return[
                    'ID'=>null,
                    'NAME' => null,
                    'PERSONAL_PHOTO' =>null       
                ];
            }
            
        });

        $this->app->singleton('userBitrixAll', function ($app) {
            $userBitrix = new Entity;
            try{
            //return $userBitrix->createAPIConnection()['result'][0]['NAME'];
            //Capturando informações
            $userBitrix = $userBitrix->allUsers();
            return array_slice($userBitrix,1);

            }catch(Exception $e){
                return null;
            }
            
        });
    }
    
    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
