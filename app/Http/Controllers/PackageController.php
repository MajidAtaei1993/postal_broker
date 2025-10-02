<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Http\Requests\StorePackageRequest;
use App\Http\Requests\UpdatePackageRequest;
use App\Http\Resources\PackageResource;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $packages = Package::orderBy('created_at', 'desc')->paginate(10);
            return response()->json([
                'data' => PackageResource::collection($packages),
                'meta' => [
                    'current_page' => $packages->currentPage(),
                    'first_page_url' => $packages->url(1),
                    'from' => $packages->firstItem(),
                    'last_page' => $packages->lastPage(),
                    'last_page_url' => $packages->url($packages->lastPage()),
                    'links' => $packages->toArray()['links'],
                    'next_page_url' => $packages->nextPageUrl(),
                    'prev_page_url' => $packages->previousPageUrl(),
                    'path' => $packages->path(),
                    'per_page' => $packages->perPage(),
                    'to' => $packages->lastItem(),
                    'total' => $packages->total()
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
    public function store(StorePackageRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Package $package)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Package $package)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePackageRequest $request, Package $package)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Package $package)
    {
        //
    }
}
