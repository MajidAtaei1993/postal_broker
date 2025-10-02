<?php

namespace App\Http\Controllers;

use App\Models\Sender;
use App\Http\Requests\StoresenderRequest;
use App\Http\Requests\UpdatesenderRequest;
use App\Http\Resources\SenderResource;

class SenderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $senders = Sender::orderBy('created_at', 'desc')->paginate(10);
            return response()->json([
                'data' => SenderResource::collection($senders)->resolve(),
                'meta' => [
                    'current_page' => $senders->currentPage(),
                    'first_page_url' => $senders->url(1),
                    'from' => $senders->firstItem(),
                    'last_page' => $senders->lastPage(),
                    'last_page_url' => $senders->url($senders->lastPage()),
                    'links' => $senders->toArray()['links'],
                    'next_page_url' => $senders->nextPageUrl(),
                    'prev_page_url' => $senders->previousPageUrl(),
                    'path' => $senders->path(),
                    'per_page' => $senders->perPage(),
                    'to' => $senders->lastItem(),
                    'total' => $senders->total()
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
