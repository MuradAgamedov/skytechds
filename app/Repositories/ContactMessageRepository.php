<?php

namespace App\Repositories;

use App\Interfaces\Repositories\ContactMessageRepositoryInterface;
use App\Interfaces\Repositories\MapRepositoryInterface;
use App\Models\ContactMessage;
use App\Models\Map;
use Illuminate\Pagination\LengthAwarePaginator;

class ContactMessageRepository implements ContactMessageRepositoryInterface{
    public function __construct(public ContactMessage $model)
    {
    }
    public function getWidthPagination(array $with = [], int $limit = 60):LengthAwarePaginator {
        return $this->model::with($with)->paginate($limit);
    }
    public function store(array $data):ContactMessage {
        return $this->model::create($data);
    }
  
    public function destroy(ContactMessage $message):ContactMessage {
        $message->delete();
        return $message;
    }
    public function find(ContactMessage $message):ContactMessage {
        return $message;
    }

   

    public function toggleRead(ContactMessage $contactMessage): ContactMessage {
        $contactMessage->read = !$contactMessage->read;
        $contactMessage->save();
        $contactMessage->refresh();
        return $contactMessage;
    }

}