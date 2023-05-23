<?php

interface IRequest
{
    function fetchRequestType();

    function fetchData();

    function fetch(string $paramName, $filter = null);

    function fetchOrNull(string $paramName, $filter = null);
}