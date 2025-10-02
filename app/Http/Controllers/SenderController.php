<?php

namespace App\Http\Controllers;

use App\Models\sender;
use App\Http\Requests\StoresenderRequest;
use App\Http\Requests\UpdatesenderRequest;

class SenderController extends Controller
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
    public function store(StoresenderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(sender $sender)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(sender $sender)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatesenderRequest $request, sender $sender)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(sender $sender)
    {
        //
    }
}
