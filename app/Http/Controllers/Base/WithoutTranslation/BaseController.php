<?php
namespace App\Http\Controllers\Base\WithoutTranslation;

use App\Helpers\DB\Controller\WithTranslation\CreateTrait;
use App\Helpers\DB\Controller\WithTranslation\ReadTrait;
use App\Helpers\DB\Controller\WithTranslation\UpdateTrait;
use App\Helpers\DB\Controller\WithTranslation\DeleteTrait;
use App\Helpers\DB\Controller\WithTranslation\FindTrait;
use App\Http\Controllers\Controller;
use App\Support\ApiResponse;
use Symfony\Component\HttpFoundation\JsonResponse;

class BaseController extends Controller {
    use ReadTrait, CreateTrait, UpdateTrait, DeleteTrait, FindTrait;
    public $service;
    public $resource;
    public $create_request;
    public $update_request;
    public $model;

    public function index():JsonResponse {
        $results = $this->service->getWidthPagination();

        return ApiResponse::success(
            $this->resource::collection($results),
            "Emails fetched successfully",
            200
        );
    }

    public function store():JsonResponse {
        $request = app($this->create_request);
        $result = $this->service->store($request->validated());

        return ApiResponse::success(
            new $this->resource($result),
            "Email added successfully",
            200
        );
    }


    public function update($id):JsonResponse {
        $request = app($this->create_request);

        $email = $this->service->find($id, $request->validated());

        return ApiResponse::success(
            new $this->resource($email),
            "Email updated successfully",
            200
        );
    }

    public function destroy($id):JsonResponse {
        $email = $this->service->destroy($id);

        return ApiResponse::success(
            new $this->resource($email),
            "Email deleted successfully",
            200
        );
    }
    

    public function show($id) {
         $email = $this->service->find($id);
    
        return ApiResponse::success(
            new $this->resource($email),
            "Email fetched successfully",
            200
        );
    }
}