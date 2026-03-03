<?php

namespace App\Http\Controllers;

use App\Http\Requests\Address\CreateRequest;
use App\Http\Requests\Address\UpdateRequest;
use App\Http\Resources\Address\AddressResource;
use App\Models\Address\Address;
use App\Services\AddressService;
use App\Support\ApiResponse;
use Symfony\Component\HttpFoundation\JsonResponse;

class AddressController extends Controller
{
     public function __construct(public AddressService $address_service)
    {
    }

    public function index():JsonResponse {
        $addresses = $this->address_service->getWidthPagination(['translations']);
        
        return ApiResponse::success(
            AddressResource::collection($addresses),
            "Addresses fetched successfully",
            200
        );
    }

    public function store(CreateRequest $request):JsonResponse {
        $email = $this->address_service->store($request->validated());

        return ApiResponse::success(
            new AddressResource($email),
            "Address added successfully",
            200
        );
    }


    public function update(UpdateRequest $request, Address $address):JsonResponse {
        $address = $this->address_service->update($address, $request->validated());

        return ApiResponse::success(
            new AddressResource($address),
            "Address updated successfully",
            200
        );
    }

    public function destroy(Address $address):JsonResponse {
        $address = $this->address_service->destroy($address);

        return ApiResponse::success(
            new AddressResource($address),
            "Address deleted successfully",
            200
        );
    }
    

    public function show(Address $address) {
         $address = $this->address_service->find($address);

        return ApiResponse::success(
            new AddressResource($address),
            "Address fetched successfully",
            200
        );
    }
}
