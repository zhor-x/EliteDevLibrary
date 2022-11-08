<?php

namespace App\Exceptions;

use Exception;

class CustomException extends Exception
{
    public function render($request)
    {
        return response()->json(
            ["error" => true, "message" => $this->getMessage(), "status_code" => 400],
            400
        );
    }
}
