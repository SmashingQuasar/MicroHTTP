<?php

final class Base extends Definition\Controller
{
    function default()
    {
        $this->setParameter('foo', 'bar');
    }
}
