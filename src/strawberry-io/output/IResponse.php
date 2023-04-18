<?php

interface IResponse
{
    function json($data, int $statusCode = 202);

    function jsond($data, int $statusCode = 202);

    function error(int $statusCode);
}