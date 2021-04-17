<?php

namespace App\Exceptions;

use Exception;

class UserHasBeenTakenException extends Exception
{
        
    /**
     * Converte a exceção em uma resposta HTTP
     */
    public function render()
    {
        return response()->json([
            'error'   => class_basename($this), // nome da classe -> padrão para o front
            'message' => 'User has been taken.',
        ], 400);
    }
}
