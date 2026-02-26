<?php

namespace App\Http\Controllers;

use App\Http\Requests\Phone\CreateRequest;
use App\Http\Requests\Phone\UpdateRequest;
use App\Http\Resources\PhoneResource;
use App\Models\Phone;
use App\Services\PhoneService;
use App\Support\ApiResponse;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    public function __construct(public PhoneService $phone_service)
    {
    }
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
    public function store(CreateRequest $request)
    {
        $phone = $this->phone_service->store($request->validated());

        return ApiResponse::success(
            new PhoneResource($phone),
            "Phone addded successfully",
            200
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Phone $phone)
    {
        $phone = $this->phone_service->update($phone, $request->validated());

        return ApiResponse::success(
            new PhoneResource($phone),
            "Phone updated successfully",
            200
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
