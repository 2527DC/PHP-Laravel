<?php

namespace App\Http\Controllers;

use App\Rules\CustomValidation;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class UserControler extends Controller
{
    public function validateUser(Request $request)
    {
        // Define the validation rules
        $rules = [
            'username' => 'required|string',           // Username must be present
            'city'     => 'required|string|uppercase', // City must be in uppercase
            'email'    => 'required|email'             // Email must be valid
        ];

        // Perform validation and catch any validation exceptions
        try {
            $request->validate($rules);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $e->validator->errors()
            ], 422);
        }

        // If validation passes, proceed with the logic
        return response()->json([
            'message' => 'Validation passed',
            'data' => $request->all()
        ]);
    }

    public function name()
    {
        return 'I am Chethan man';
    }



    public function validateCustomRules(Request $request)
    
{

    try {
        //code...

        $request->validate([
            'username' => ['required', 'string', 'max:255', new CustomValidation()],
            'city' => ['required', 'string', new CustomValidation()],
        ]);
    } catch (ValidationException $e) {
      
        return response()->json([
            'message' => 'Validation failed',
            'errors' => $e->validator->errors()
        ], 422);
    }
    

    return response()->json(['message' => 'Validation passed'],status:1);
}
}
