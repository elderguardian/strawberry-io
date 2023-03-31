<?php

class Response implements IResponse
{

    private array $statusCodeMeanings = [
        200 => "OK",
        400 => "Bad Request",
        403 => "Forbidden",
        422 => "Unprocessable Entity",
        429 => "Resource Exhausted",
        500 => "Internal Server Error",
        503 => "Service Unavailable",
        504 => "Gateway Timeout",
    ];


    function json($data, int $statusCode = 202) : void
    {
        header('Content-Type: application/json; charset=utf-8');
        http_response_code($statusCode);
        echo json_encode($data);
    }


    function jsond($data, int $statusCode = 202) : void
    {
        self::json($data, $statusCode);
        die();
    }

    public function error(int $statusCode) : void
    {
        http_response_code($statusCode);

        $message = $this->statusCodeMeanings[$statusCode] ?? `Unknown Error $statusCode!`;

        self::jsond([
            'message' => $message,
        ], $statusCode);
    }
}