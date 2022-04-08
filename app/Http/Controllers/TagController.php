<?php

namespace App\Http\Controllers;

use App\Http\Requests\Tag\UpdateRequest;
use App\Http\Requests\Tag\StoreRequest;
use App\Http\Resources\TagCollection;
use App\Http\Resources\TagResource;
use App\Models\Tag;

class TagController extends Controller
{

    protected Tag $tag;

    public function __construct(Tag $tag)
    {
        $this->tag = $tag;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \App\Http\Resources\TagCollection
     */
    public function index(): TagCollection
    {
        return new TagCollection($this->tag->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRequest $request
     * @return \App\Http\Resources\TagResource
     */
    public function store(StoreRequest $request): TagResource
    {
        $tag = $this->tag->create($request->validated());
        return new TagResource($tag);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \App\Http\Resources\TagResource
     */
    public function show(Tag $tag): TagResource
    {
        return new TagResource($tag);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Tag\UpdateRequest $request
     * @param \App\Models\Tag $tag
     * @return \App\Http\Resources\TagResource
     */
    public function update(UpdateRequest $request, Tag $tag): TagResource
    {
        $tag->update($request->validated());
        return new TagResource($tag);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag): void
    {
        $tag->delete();
    }
}
