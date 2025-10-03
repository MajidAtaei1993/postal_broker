<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreuserRequest;
use App\Http\Requests\UpdateuserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $users = User::orderBy('created_at', 'desc')->paginate(10);
            return response()->json([
                'data' => UserResource::collection($users),
                'meta' => [
                    'current_page' => $users->currentPage(),
                    'first_page_url' => $users->url(1),
                    'from' => $users->firstItem(),
                    'last_page' => $users->lastPage(),
                    'last_page_url' => $users->url($users->lastPage()),
                    'links' => $users->toArray()['links'],
                    'next_page_url' => $users->nextPageUrl(),
                    'prev_page_url' => $users->previousPageUrl(),
                    'path' => $users->path(),
                    'per_page' => $users->perPage(),
                    'to' => $users->lastItem(),
                    'total' => $users->total()
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
    public function store(StoreuserRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $receiver)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $receiver)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateuserRequest $request, User $receiver)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $receiver)
    {
        //
    }
}
