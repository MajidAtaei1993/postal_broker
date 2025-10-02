<?php

namespace App\Http\Controllers;

use App\Models\Receiver;
use App\Http\Requests\StorereceiverRequest;
use App\Http\Requests\UpdatereceiverRequest;
use App\Http\Resources\ReceiverResource;

class ReceiverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $receivers = Receiver::orderBy('created_at', 'desc')->paginate(10);
            return response()->json([
                'data' => ReceiverResource::collection($receivers),
                'meta' => [
                    'current_page' => $receivers->currentPage(),
                    'first_page_url' => $receivers->url(1),
                    'from' => $receivers->firstItem(),
                    'last_page' => $receivers->lastPage(),
                    'last_page_url' => $receivers->url($receivers->lastPage()),
                    'links' => $receivers->toArray()['links'],
                    'next_page_url' => $receivers->nextPageUrl(),
                    'prev_page_url' => $receivers->previousPageUrl(),
                    'path' => $receivers->path(),
                    'per_page' => $receivers->perPage(),
                    'to' => $receivers->lastItem(),
                    'total' => $receivers->total()
                ]
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ]);
        }
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
    public function store(StorereceiverRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(receiver $receiver)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(receiver $receiver)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatereceiverRequest $request, receiver $receiver)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(receiver $receiver)
    {
        //
    }
}
