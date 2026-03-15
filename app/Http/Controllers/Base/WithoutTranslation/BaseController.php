<?php
namespace App\Http\Controllers\Base\WithoutTranslation;

use App\Helpers\DB\Controller\WithoutTranslation\CreateTrait;
use App\Helpers\DB\Controller\WithoutTranslation\ReadTrait;
use App\Helpers\DB\Controller\WithoutTranslation\UpdateTrait;
use App\Helpers\DB\Controller\WithoutTranslation\DeleteTrait;
use App\Helpers\DB\Controller\WithoutTranslation\FindTrait;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class BaseController extends Controller {
    use AuthorizesRequests, ReadTrait, CreateTrait, UpdateTrait, DeleteTrait, FindTrait;
    public $service;
    public $resource;
    public $create_request;
    public $update_request;
    public $model;
    public $messagesModel;
}
