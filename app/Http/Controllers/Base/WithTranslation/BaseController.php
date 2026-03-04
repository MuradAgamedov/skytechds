<?php
namespace App\Http\Controllers\Base\WithTranslation;

use App\Helpers\DB\Controller\WithTranslation\CreateTrait;
use App\Helpers\DB\Controller\WithTranslation\ReadTrait;
use App\Helpers\DB\Controller\WithTranslation\UpdateTrait;
use App\Helpers\DB\Controller\WithTranslation\DeleteTrait;
use App\Helpers\DB\Controller\WithTranslation\FindTrait;
use App\Http\Controllers\Controller;


class BaseController extends Controller {
    use ReadTrait, CreateTrait, UpdateTrait, DeleteTrait, FindTrait;
    public $service;
    public $resource;
    public $create_request;
    public $update_request;
    public $model;
}