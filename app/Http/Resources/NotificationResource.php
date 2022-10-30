<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

class NotificationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     *
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id'         => $this->id,
            'message'    => $this->data['message'],
            'icon'       => $this->data['icon'],
            'created_at' => $this->created_at,
            'read_at'    => $this->read_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
