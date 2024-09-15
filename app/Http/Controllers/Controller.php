<?php

namespace App\Http\Controllers;
use OpenApi\Attributes as OA;
/**
 * @OA\Info(
 *     title="OPEN SHOP API",
 *     version="1.0"
 * )
 */

abstract class Controller
{
    public function getToken()
    {

        $headers = getallheaders();
        return (isset($headers['Token'])) ? $headers['Token'] : $headers['token'];
    }
}
