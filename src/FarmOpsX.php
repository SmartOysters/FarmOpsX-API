<?php

/*
 * This file is part of the FarmOpsX API PHP Package
 *
 * (c) James Rickard <james.rickard@smartoysters.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SmartOysters\FarmOpsX;

use SmartOysters\FarmOpsX\Helpers\StringHelpers;
use SmartOysters\FarmOpsX\Http\FarmOpsXClient;
use SmartOysters\FarmOpsX\Http\Request;
use SmartOysters\FarmOpsX\Resources\Channels;
use SmartOysters\FarmOpsX\Resources\Shapes;
use SmartOysters\FarmOpsX\Resources\Reports;
use SmartOysters\FarmOpsX\Resources\Tasks;


/**
 * @method Channels channels()
 * @method Reports reports()
 * @method Shapes shapes()
 * @method Tasks tasks()
 */
class FarmOpsX
{
    use StringHelpers;

    /**
     * The base URI.
     *
     * @var string
     */
    protected $baseURI;

    /**
     * The API token.
     *
     * @var string
     */
    protected $token;

    /**
     * Guzzle Client configuration options
     *
     * @var array|mixed
     */
    protected $options;

    /**
     * SaferMe constructor
     */
    public function __construct($token = '', $uri = 'http://farmopsx-api-dev.eba-afjcu73g.ap-southeast-2.elasticbeanstalk.com/api/', $options = [])
    {
        $this->token = $token;
        $this->baseURI = $uri;
        $this->options = $options;
    }

    /**
     * Get the resource instance.
     *
     * @param $resource
     * @return mixed
     */
    public function make($resource)
    {
        $class = $this->resolveClassPath($resource);

        return new $class($this->getRequest());
    }

    /**
     * Get the resource path.
     *
     * @param $resource
     * @return string
     */
    protected function resolveClassPath($resource)
    {
        return 'SmartOysters\\FarmOpsX\\Resources\\' . $this->capsCase($resource);
    }

    /**
     * Get the request instance.
     *
     * @return Request
     */
    public function getRequest()
    {
        return new Request($this->getClient());
    }

    /**
     * Get the HTTP client instance.
     */
    protected function getClient()
    {
        return new FarmOpsXClient($this->getBaseURI(), $this->token, $this->options);
    }

    /**
     * Get the base URI.
     *
     * @return string
     */
    public function getBaseURI()
    {
        return $this->baseURI;
    }

    /**
     * Set the base URI.
     *
     * @param string $baseURI
     */
    public function setBaseURI($baseURI)
    {
        $this->baseURI = $baseURI;
    }

    /**
     * Set the token.
     *
     * @param string $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }

    /**
     * Any reading will return a resource.
     *
     * @param $name
     * @return mixed
     */
    public function __get($name)
    {
        return $this->make($name);
    }

    /**
     * Methods will also return a resource.
     *
     * @param $name
     * @param $arguments
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        if (! in_array($name, get_class_methods(get_class()))) {
            return $this->{$name};
        }
    }
}
