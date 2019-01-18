<?php

function create($class, array $attributes = [])
{
    return factory($class)->create($attributes);
}


function make($class, array $attributes = [])
{
    return factory($class)->make($attributes);
}

function createState($class, array $attributes = [], string $state = null)
{
    if (is_null($state)) {
        return create($class, $attributes);
    }

    return factory($class)->state($state)->create($attributes);
}