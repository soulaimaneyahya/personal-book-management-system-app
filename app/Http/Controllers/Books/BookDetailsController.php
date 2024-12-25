<?php

namespace App\Http\Controllers\Books;

use App\Models\BookDetails;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBookDetailsRequest;
use App\Http\Requests\UpdateBookDetailsRequest;

class BookDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookDetailsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(BookDetails $bookDetails)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BookDetails $bookDetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookDetailsRequest $request, BookDetails $bookDetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BookDetails $bookDetails)
    {
        //
    }
}
