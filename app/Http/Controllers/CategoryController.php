<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
use App\Http\Resources\CategoryCollection;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
//use Illuminate\Http\Resources\Json\ResourceCollection;

class CategoryController extends Controller
{
    protected Category $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return CategoryCollection
     */
    public function index(): CategoryCollection
    {
        return new CategoryCollection($this->category->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Category\StoreRequest $request
     * @return CategoryResource
     */
    public function store(StoreRequest $request): CategoryResource
    {
        $category = $this->category->create($request->validated());
        return new CategoryResource($category);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Category $category
     * @return CategoryResource
     */
    public function show(Category $category): CategoryResource
    {
        return new CategoryResource($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param \App\Models\Category $category
     * @return CategoryResource
     */
    public function update(UpdateRequest $request, Category $category): CategoryResource
    {
        $category->update($request->validated());
        return new CategoryResource($category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category): void
    {
        $category->delete();
    }
}
