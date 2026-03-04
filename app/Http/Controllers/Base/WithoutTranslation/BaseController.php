<?php
namespace App\Http\Controllers\Base\WithoutTranslation;

use App\Helpers\DB\Controller\WithoutTranslation\CreateTrait;
use App\Helpers\DB\Controller\WithoutTranslation\ReadTrait;
use App\Helpers\DB\Controller\WithoutTranslation\UpdateTrait;
use App\Helpers\DB\Controller\WithoutTranslation\DeleteTrait;
use App\Helpers\DB\Controller\WithoutTranslation\FindTrait;
use App\Http\Controllers\Controller;


class BaseController extends Controller {
    use ReadTrait, CreateTrait, UpdateTrait, DeleteTrait, FindTrait;
    public $service;
    public $resource;
    public $create_request;
    public $update_request;
    public $model;
    public $messagesModel;
}