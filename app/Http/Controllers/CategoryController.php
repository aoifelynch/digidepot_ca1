<?php

namespace App\Http\Controllers;
use App\Models\Listing;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
    
        $listings = Listing::all();
        $categories = Category::all();

        return view('category.index',[
            'listings' => $listings,
            'categories' => $categories
        ]);
    }
    public function create()
    {
        $listings = Listing::all();

        return view('category.create', [
            'listings' => $listings,
        ]);
    }
    public function store(Request $request)
    {
        

        $rules = [
            'name' => 'required|string|min:2|max:150',
            'category_image' => 'required|file|image'
        ];


        $request->validate($rules);
        // dd($request)

        $category_image = $request->file('category_image');
        $extension = $category_image->getClientOriginalExtension();
        $filename = date('y-m-d-His') . '_' .  str_replace(' ', '_', $request->title) . '.' . $extension;


        $category_image->storeAs('public/images', $filename);

        $category = new Category;
        $category->name = $request->name;
        $category->category_image = $request->category_image;

        return to_route('category.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categories = Category::FindOrFail($id);
        $listing = Listing::all();

        return view('category.show', [
            'listing' => $listing,
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::FindOrFail($id);
        $listing = Listing::all();
        // dd($selectedcategories);

        return view('category.edit', [
            'listing' => $listing,
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
                // dd($request->title);
        $category = Category::findOrFail($id);
        //validation rules
        $rules = [
            'name' => 'required|string|min:2|max:150',
            'category_image' => 'required|file|image'
        ];
        ////////
        $request->validate($rules);


        if($request->hasFile('category_image')){
            $category_image = $request->file('category_image');
            $extension = $category_image->getClientOriginalExtension();
            $filename = date('y-m-d-His') . '_' .  str_replace(' ', '_', $request->title) . '.' . $extension;


            $category_image->storeAs('public/images', $filename);
            $category->category_image = $filename;

        }

        

        // dd($request);


        $category->name = $request->name;
        $category->category_image = $request->category_image;

        $category->save();

        return redirect()
                ->route('category.index')
                ->with('status', 'Updated category!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);

        $category->delete();

        return redirect()->route('category.index')->with('status', 'category deleted successfully');
    }

}
