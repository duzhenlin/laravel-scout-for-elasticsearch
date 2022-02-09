<?php

namespace Duzhenlin\LaravelScoutForElasticsearch;

use Elasticsearch\ClientBuilder;

trait ElasticsearchClientTrait
{
    /**
     * Get ElasticSearch Client
     *
     * @return \Elasticsearch\Client
     */
    public function getElasticsearchClient()
    {
        $hosts = [
            'host'   => config('scout.elasticsearch.host'),
            'port'   => config('scout.elasticsearch.port'),
            'scheme' => config('scout.elasticsearch.scheme'),
        ];
        $user  = config('scout.elasticsearch.user');
        $pass  = config('scout.elasticsearch.pass');

        if ($user !== null) {
            $hosts['user'] = $user;
        }

        if ($pass !== null) {
            $hosts['pass'] = $pass;
        }

        return ClientBuilder::create()
            ->setHosts([$hosts])
            ->build();
    }
}
