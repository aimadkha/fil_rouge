<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MainCategoryRequest;
use App\Models\MainCategory;
use Illuminate\Http\Request;
use Mockery\Exception;


class MainCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = MainCategory::selection()->get();
        return view('admin.maincategories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.maincategories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(MainCategoryRequest $request)
    {
        try {


            $filePath = "";
            if ($request->has('photo')) {
                $filePath = uploadImage('maincategories', $request->photo);
            }
            $name = $request->input('name');
            $slug = $request->input('slug');
            $mainCategory = MainCategory::create([
                'name' => $name,
                'slug' => $slug,
                'photo' => $filePath,
                'active' => '1'
            ]);
            return redirect()->route('admin.maincategories')->with(['success'=>'registred successufly']);
        } catch (\Exception $e){
            return redirect()->route('admin.maincategories')->with(['error'=>'registred failed! try again']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mainCategory = MainCategory::selection()->find($id);
        if (!$mainCategory){
            return redirect()->route('admin.maincategories')->with(['error'=>'this category not found']);
        }
        return view('admin.maincategories.edit', compact('mainCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(MainCategoryRequest $request, $mainCat_id)
    {

        $mainCategory = MainCategory::find($mainCat_id);
        if (!$mainCategory){
            return redirect()->route('admin.maincategories')->with(['error'=>'this category not found']);
        }
        MainCategory::where('id', $mainCat_id)->update([
            'name'=> $request['name'],
            'slug'=> $request['slug'],
        ]);
        if ($request->has('photo')){
            $filePath = uploadImage('maincategories', $request->photo);
            MainCategory::where('id', $mainCat_id)->update([
                'photo'=>$filePath
            ]);
        }
        return redirect()->route('admin.maincategories')->with(['success'=>'updated successfuly']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $mainCategory = MainCategory::find($id);
            if (!$mainCategory){
                return redirect()->route('admin.maincategories')->with(['error'=>'this category not found']);
            }
            $mainCategory->delete();
            return redirect()->route('admin.maincategories')->with(['success'=>'updated successfuly']);

        } catch (\Exception $exception){

        }

    }
}
