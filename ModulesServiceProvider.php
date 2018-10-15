<?php
/**
 * Created by PhpStorm.
 * User: viacheslavp
 * Date: 15.10.18
 * Time: 13:12
 */

namespace Tsnmedia\Modules;


use Illuminate\Support\ServiceProvider;

class ModulesServiceProvider extends ServiceProvider
{

    public function boot() {
        // подключаем список модулей, которые надо подгрузить
        $this->mergeConfigFrom(__DIR__ . '/config/module.php', 'module');

        $this->publishes([
            __DIR__ . '/config' => base_path('config'),
        ]);
        $modules = config('module.modules');
        $dir = app_path() . '/Modules';
        if($modules) {
            foreach ($modules as $module) {

                //подключаем роуты для модуля

                if(file_exists($dir . '/' . $module .'/Routes/routes.php')) {
                    $this->loadRoutesFrom($dir . '/' . $module . '/Routes/routes.php');
                }

                // Загружаем View
                // view('Test::admin')

                if(is_dir($dir . '/' . $module . '/Views')) {
                    $this->loadViewsFrom($dir . '/' . $module . '/Views', $module);
                }

                //Подгружаем миграции

                if(is_dir(__DIR__ . '/' . $module . '/Migration')) {
                    $this->loadMigrationsFrom($dir . '/' . $module . '/Migration');
                }

                // Подгружаем переводы
                // trans('Test::messages.welcome')

                if(is_dir($dir . '/' . $module . '/Lang')) {
                    $this->loadTranslationsFrom($dir . '/' . $module . '/Lang', $module);
                }
            }
        }
    }

    public function register()
    {

    }
}