<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\CountryResource;
use App\Models\Wishlist;
use Illuminate\Http\Resources\Json\JsonResource;

class UniversityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $user = Auth::user();
        $wishlist = [];
        if ($user && isset($this->id)) {
            $wishlist = Wishlist::where([
                'user_id' => $user->id,
                'university_id' => $this->id
            ])->get()->first();
        }
        return [
            'uuid' => $this->id,
            'name' => $this->name,
            'description' => $this->details,
            'city' => $this->city,
            'logo' => $this->logo,
            'country' => (new CountryResource($this->country)),
            'wished' => $wishlist ? true :  false
        ];
    }
}
