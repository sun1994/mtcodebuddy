<?php
/**
 * Category controller
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Category as Cat;

class Category extends Controller
{   
    /**
     * Listing for category(parent) in add category page
     * @return array
     */
    function catList()
    {
        $data = DB::table('category')->get()->toArray();
        return $data;
    }
    /**
     * Go to add category form with category list
     */
    function addCategory()
    {
        $catList = $this->catList();
        return view("addcat", ["arrList" => $catList]);
    }

    /**
     * Save category and redirect to admin dashboard page
     * @return message
     */
    function saveCategory(Request $request)
    {
        $data = array("name" => $request->input("catname"),
                    "parent_id"  => $request->input("selectcat"),
                    "descryption"  => $request->input("descryption"),
                    "created_at"   => date("Y-m-d H:i:s")
                );
        $insertedData = DB::table('category')->insertGetId($data);
        return view("admindash", ["message" => "Category created", "data" => $this->showCategory()]);
    }

    /**
     * Get all category with child parent form
     * @return array
     */
    function showCategory()
    {
        $data = Cat::select('*')
            ->with(['subcat'])
            ->where('parent_id', '=', 0)
            ->get()->toArray();

        return $data;
    }

    /**
     * Category list page
     * @return array
     */
    function categoryList()
    {
        $data = $this->showCategory();
        return view("category", ["message" => "", "data" => $data]);
    }

    /**
     * Individual category
     * @return array
     */
    function viewCategory($id)
    {

        $data = DB::table('category')->where('id', '=', $id)->get()->toArray();
        return view("viewCategory", ["data" => $data]);
    }

}
