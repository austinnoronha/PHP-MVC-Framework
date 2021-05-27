<?php

/**
 * Router File
 * 
 * @package crudapp
 * @file Router File
 * @type class
 */

/**
 * @namespace classes all classes will be under App Classes namespace
 */

namespace classes;

class Router
{
    private $request;
    private $supportedHttpMethods = array(
        "GET",
        "POST",
        "PUT",
        "DELETE"
    );

    function __construct(Request $request)
    {
        $this->request = $request;
    }

    function __call($name, $args)
    {
        list($route, $method) = $args;

        if (!in_array(strtoupper($name), $this->supportedHttpMethods)) {
            $this->invalidMethodHandler();
        }

        $this->{strtolower($name)}[$this->formatRoute($route)] = $method;
    }

    /**
     * Removes trailing forward slashes from the right of the route.
     * @param route (string)
     */
    private function formatRoute($route)
    {
        $result = rtrim($route, '/');
        if ($result === '') {
            return '/';
        }
        return $result;
    }

    private function invalidMethodHandler()
    {
        header("{$this->request->serverProtocol} 405 Method Not Allowed");
    }

    private function defaultRequestHandler()
    {
        //header("{$this->request->serverProtocol} 404 Not Found");
        $this->page404();
        die();
    }

    /**
     * Resolves a route
     */
    function resolve()
    {
        $methodDictionary = $this->{strtolower($this->request->requestMethod)};
        $formatedRoute = $this->formatRoute($this->request->requestUri);
        $method = $methodDictionary[$formatedRoute] ?? null;

        if (is_null($method)) {
            $this->defaultRequestHandler();
            return;
        }

        echo call_user_func_array($method, array($this->request));
    }

    public function page404()
    {
        echo (
            '<h1>Sorry, its seems you have landed on a page that does not exist.</h1>'.
            '<p>Please re-check the link or visit our <a href="../">homepage</a></p>' 
        );
    }

    function __destruct()
    {
        $this->resolve();
    }
}
