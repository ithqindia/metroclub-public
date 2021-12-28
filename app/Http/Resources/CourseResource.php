<?php

namespace App\Http\Resources;

use App\Http\Resources\UniversityResource;
use App\Http\Resources\CourseMajorResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'uuid' => $this->id,
            'course' => $this->name,
            'description' => $this->details,
            'university' => $this->university_id,
            'uni_details' => (new UniversityResource($this->university)),
            'level_of_study' => $this->course_major_id,
            'level_details' => (new CourseMajorResource($this->courseMajor))
        ];
    }
}
