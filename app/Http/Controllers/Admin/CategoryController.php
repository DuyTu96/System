<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->getSubCategories(0);
        $categories_children = Category::all()->where('parent_id', '<>', 0);
        // dd($categories_children);
        return view('admin.categories.index', compact('categories', 'categories_children'));
    }

    private function getSubCategories($parent_id, $ignore_id=null)
    {
        $categories = Category::where('parent_id', $parent_id)
            ->where('id', '<>', $ignore_id)
            ->get()
            ->map(function($query) use($ignore_id){
                $query->sub = $this->getSubCategories($query->id, $ignore_id);
                return $query;
            });

        return $categories;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attr = [
            'parent_id' => $request->get('parent_id'),
            'name' => $request->get('name'),
            'description' => $request->get('description'),
        ];
        Category::create($attr);

        return redirect()->route('admin.categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function getCategory(Request $request)
    {
        $id = $request->id;
        $Category = Category::findOrFail($id);
        $name = $Category->name;
        $parent_id = $Category->parent_id;
        $description = $Category->description;

        return response()->json(compact(
            'name',
            'parent_id',
            'description'
        ), 200);
    }

    public function editCategory(Request $request) {
        $category = Category::findOrFail($request->id);
        $attr = [
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'description' => $request->description,
        ];
        $category->update($attr);

        return response()->json($category, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteCategory(Request $request)
    {
        $category = Category::findOrFail($request->id);
        $category->delete();

        return response()->json('', 200);
    }
}
