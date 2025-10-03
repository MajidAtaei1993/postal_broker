<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use App\Http\Requests\StoreshipmentRequest;
use App\Http\Requests\UpdateshipmentRequest;
use App\Http\Resources\ShipmentResource;
use App\Models\Package;
use Illuminate\Support\Facades\DB;

class ShipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $shipments = Shipment::orderBy('created_at', 'desc')->paginate(10);

            return response()->json([
                'data' => ShipmentResource::collection($shipments),
                'meta' => [
                    'current_page' => $shipments->currentPage(),
                    'first_page_url' => $shipments->url(1),
                    'from' => $shipments->firstItem(),
                    'last_page' => $shipments->lastPage(),
                    'last_page_url' => $shipments->url($shipments->lastPage()),
                    'links' => $shipments->toArray()['links'],
                    'next_page_url' => $shipments->nextPageUrl(),
                    'prev_page_url' => $shipments->previousPageUrl(),
                    'path' => $shipments->path(),
                    'per_page' => $shipments->perPage(),
                    'to' => $shipments->lastItem(),
                    'total' => $shipments->total()
                ]
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage()
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreshipmentRequest $request)
    {
        DB::beginTransaction(); // use this when we need to change more than 1 table in DB for sure proccess will be succed
        try {
            // create shipment
            $shipment = Shipment::create([
                'sender_id'    => $request->sender_id,
                'receiver_id'  => $request->receiver_id,
                'tracking_code'=> Shipment::generateNumericTrackingCode(),
                'service_type' => $request->service_type,
                'status'       => $request->status,
            ]);

            // attach packages
            Package::whereIn('id', $request->package_ids)->update(['shipment_id' => $shipment->id]);

            DB::commit();

            return response()->json([ 
                'message' => 'Shipment created successfully',
                'data'    => new ShipmentResource($shipment->load('sender', 'receiver', 'packages'))
            ], 201);

        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'An error occurred while saving the shipment',
                'error'   => $th->getMessage()
            ], 500);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(shipment $shipment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(shipment $shipment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateshipmentRequest $request, shipment $shipment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(shipment $shipment)
    {
        //
    }
}
