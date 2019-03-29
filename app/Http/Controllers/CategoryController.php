<?php

namespace App\Http\Controllers;

use App\Category;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Constructor to prevent unauthenticated access to sensitive routes.
     */
    public function __construct()
    {
        $this->middleware('auth:api')->except(['get']);
        $this->middleware('role_or_permission:admin|administer')->except(['get']);
    }

    public function get()
    {
        return Category::all();
    }

    public function update(Request $request, Category $category)
    {
        $rules = [
            'icon'          => 'sometimes|required|string',
            'active'        => 'sometimes|required|boolean',
            'crowdsource'   => 'sometimes|required|boolean',
            'description'   => 'sometimes|required|string',
        ];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return response($validator->errors(), 400);
        }
        $updatedOne = false;
        foreach ($rules as $property => $rule){
            if (Input::has($property)) {
                $category->$property = $request->input($property);
                $category->save();
                $updatedOne = true;
            }
        }
        if (!$updatedOne) {
            return response("User did not supply any parameters that can be updated.", 400);
        }
    }
}
