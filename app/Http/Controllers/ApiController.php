<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Entity;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function get()
    {
        $categories = Entity::all();
        return response()->json($categories);
    }

    public function getByCategory($category)
    {
        try {
            $categoryId = DB::table('categories')->where('category', $category)->value('id');
            $categoryName = DB::table('categories')->where('category', $category)->value('category');
            $records = DB::table('entities')->whereIn('category_id', [$categoryId])->get();
            return response()->json($records, 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }
}
