<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateActivityRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'code' => ['required', 'string', 'max:30', Rule::unique('activities', 'code')->ignore($this->route('activity'))],
            'title' => ['required', 'string', 'max:150'],
            'description' => ['nullable', 'string'],
            'location' => ['required', 'string', 'max:150'],
            'start_at' => ['required', 'date'],
            'end_at' => ['required', 'date', 'after_or_equal:start_at'],
            'capacity' => ['required', 'integer', 'min:1', 'max:500'],
            // status tidak diubah lewat form edit umum, lihat ActivityService::publish()/complete().
        ];
    }
}
