<?php

class Response
{

    /**
     * @var array $headers
     */

    private $headers = [];

    /**
     * @var string $view
     */

    private $view;

    /**
     * @var string $body
     */

    private $body = '';

    /**
     * @var int $statusCode
     */

    private $statusCode = 200;

    public function __construct()
    {
        $this->view = null;
    }

    /**
     * @param array $headers
     */

    public function setHeaders(array $headers): void
    {
        $this->headers = $headers;
    }

    /**
     * @param string $name
     * @param string $value
     */

    public function setHeader(string $name, string $value): void
    {
        $this->headers[$name] = $value;
    }

    /**
     * @param string $view
     */

    public function setView(string $view)
    {
        if (file_exists($view) === false)
        {
            throw new \Error('File path set as view does not exist.');
        }

        $this->view = $view;
    }
    
    public function getView(): string
    {
        return $this->view;
    }

    /**
     * @param string|array $body
     */

    public function setBody($body)
    {
        if (is_array($body))
        {
            $this->body = json_encode($body);
        }
        else
        {
            $this->body = $body;
        }
    }

    /**
     * @param int $statusCode
     */

    public function setStatusCode(int $statusCode)
    {
        $this->statusCode = $statusCode;
    }

    public function sendJson()
    {
        $this->headers['Content-Type'] = 'application/json';

        foreach ($this->headers as $name => $value)
        {
            header("{$name}: {$value}");
        }

        http_response_code($this->statusCode);

        echo $this->body;
        exit;
    }

}
