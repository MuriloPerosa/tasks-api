<?php

namespace App\Exceptions;

use Exception;

class LoginInvalidException extends Exception
{
    /**
     * Converte a exceção em uma resposta HTTP
     */
    public function render()
    {
        return response()->json([
            'error'   => class_basename($this), // nome da classe -> padrão para o front
            'message' => 'Email and password don\'t match.',
        ], 400);
    }
}
