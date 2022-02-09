<?php
/**
 * User: kholoudElkholy
 * Email: kholoudelkholy91@gmail.com
 */

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{

    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request): array
    {

        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'postcode' => $this->postcode,
//            'created_at' => $this->created_at->diffForHumans()
        ];
    }
}