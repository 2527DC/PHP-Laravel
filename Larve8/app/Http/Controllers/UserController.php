<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UserController extends Controller
{
    public function getmessage()
    {
        return "This is a message from UserController.";
    }

    // Fallback method for handling non-existing methods
    public function __call($method, $parameters)
    {
        // Return a custom error response
        return response()->json([
            'error' => "The method '{$method}' does not exist in the UserController."
        ], 404); // You can change the status code as needed
    }

  
    public  function  chckValidation(){

        
    }
}
