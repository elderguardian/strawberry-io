<?php

interface IRequest
{
    function fetchRequestType();
    function fetchData();
    function fetch(string $paramName, $filter = null);
    function fetchOrFail(string $paramName, $filter = null);
}