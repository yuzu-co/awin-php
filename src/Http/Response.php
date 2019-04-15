<?php

namespace Yuzu\Awin\Http;

/**
 * Response
 *
 * @author Jonathan Martin <john@yuzu.co>
 */
class Response
{
    protected $statusCode;

    protected $body;

    /**
     * @param int    $statusCode statusCode
     * @param string $body       body
     */
    public function __construct($statusCode, $body)
    {
        $this->statusCode = $statusCode;
        $this->body       = $body;
    }

    /**
     * @return int
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @return mixed
     */
    public function getBody()
    {
        return json_decode($this->body, true);
    }
}
