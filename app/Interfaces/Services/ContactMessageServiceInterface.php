<?php
namespace App\Interfaces\Services;

use App\Interfaces\Services\Base\CreateServiceInterface;
use App\Interfaces\Services\Base\DeleteServiceInterface;
use App\Interfaces\Services\Base\FindServiceInterface;
use App\Interfaces\Services\Base\ReadServiceInterface;
use App\Models\ContactMessage;
use Illuminate\Pagination\LengthAwarePaginator;

interface ContactMessageServiceInterface extends ReadServiceInterface, CreateServiceInterface, DeleteServiceInterface, FindServiceInterface {
    public function toggleRead(ContactMessage $contactMessage):ContactMessage;
}
