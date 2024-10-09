<?php

namespace App\Http\Controllers;

use App\Rules\Uppercase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


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


    public  function  chckValidation(Request $request)
    {

        $input = $request->all();

        // $validate = Validator::make($input, ['username' => 'required']);

        $validate = Validator::make($input, [
            'username' => ['required', new Uppercase()], // Validate that 'username' is required and uppercase
        ]);

        if ($validate->fails()) {

            return response()->json(['error' => $validate->errors()],422);
        } 

        return response()->json(['message' => 'Username is valid!']);
    }


    // public function chckValidation(Request $request)
    // {
    //     // Get all input data
    //     $input = $request->all();

    //     // Create a validator instance
    //     $validator = Validator::make($input, [
    //         'username' => 'required|string|max:255', // Define your validation rules here
    //     ]);

    //     // Check if validation fails
    //     if ($validator->fails()) {
    //         return response()->json([
    //             'errors' => $validator->errors(), // Return the error messages
    //         ], 422); // 422 Unprocessable Entity
    //     }

    //     // If validation passes, continue with your logic
    //     // For example, you can save the data or return a success response
    //     return response()->json(['message' => 'Username is valid!']);
    // }
}
