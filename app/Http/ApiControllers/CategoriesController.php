<?php

namespace App\Http\ApiControllers;

use App\Transformers\CategoryTransformer;
use App\Models\Category;
use DB;

class CategoriesController extends Controller
{
    public function index()
    {
        $data = Category::where('id', '<>', 9)->get();
        return $this->response()->collection($data, new CategoryTransformer());
    }
}
