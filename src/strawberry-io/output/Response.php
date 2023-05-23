<?php

class Response implements IResponse
{

    function json($data, int $statusCode = 202): void
    {
        header('Content-Type: application/json; charset=utf-8');
        http_response_code($statusCode);
        echo json_encode($data);
    }


    function jsond($data, int $statusCode = 202): void
    {
        self::json($data, $statusCode);
        die();
    }

}