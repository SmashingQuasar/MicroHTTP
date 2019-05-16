<?php

final class Base extends Definition\Controller
{
    function default()
    {
        $this->setParameter('foo', 'bar');

        $response = new Response();

        // $response->setBody(
        //     [
        //         'success' => true,
        //         'message' => 'A JSON response test'
        //     ]
        // );
        // $response->sendJson();
        // $response->setView(__DIR__.'/../views/Base/test.html.php');

        return $response;
    }
}
