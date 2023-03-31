<?php

class ArgumentFilter implements IFilter
{

    /**
     * @throws Exception
     */
    function integer($value)
    {
        $filtered = filter_var($value, FILTER_VALIDATE_INT);

        if (!$filtered || $filtered != $value)
            throw new Exception();

        return $filtered;
    }

}