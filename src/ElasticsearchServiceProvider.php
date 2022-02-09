<?php

namespace Duzhenlin\LaravelScoutForElasticsearch;


use Duzhenlin\LaravelScoutForElasticsearch\Engine\ElasticsearchEngine;
use Illuminate\Support\ServiceProvider;
use Laravel\Scout\EngineManager;

class ElasticsearchServiceProvider extends ServiceProvider
{



    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        app(EngineManager::class)->extend('elasticsearch', function ($app) {
            return new ElasticsearchEngine();
        });
    }

    /**
     * 在容器中注册绑定。
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/Config/laravel-scout-elasticsearch.php', 'scout'
        );
    }
}
