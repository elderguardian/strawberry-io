<?php

class Request implements IRequest
{

    private array $data;
    private $requestType;

    /**
     * @throws Exception
     */
    function __construct()
    {
        $this->requestType = $this->fetchRequestType();
        $this->data = $this->fetchData();
    }

    function fetchRequestType()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    /**
     * @throws Exception
     */
    function fetchData(): array
    {
        return match ($this->requestType) {
            "GET" => $_GET,
            "POST" => $_POST,
            default => throw new Exception("Unsupported request type!"),
        };
    }


    function fetchOrNull(string $paramName, $filter = null)
    {
        try {
            return $this->fetch($paramName, $filter);
        } catch (Exception $e) {
            return null;
        }
    }

    /**
     * @throws Exception
     */
    function fetch(string $paramName, $filter = null)
    {

        if (!array_key_exists($paramName, $this->data))
            throw new Exception("Requested parameter has not been set.");

        $value = $this->data[$paramName];

        if ($filter === null)
            return $value;

        return (new ArgumentFilter())->{$filter}($value);
    }

}