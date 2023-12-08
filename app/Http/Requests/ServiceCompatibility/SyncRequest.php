<?php

namespace App\Http\Requests\ServiceCompatibility;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SyncRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'service_id' => ['required', Rule::exists('services', 'id')],
            'compatibilities' => ['required', 'array', 'min:1'],
            'compatibilities.*' => ['required', Rule::exists('services', 'id')->whereNotIn('id', [$this->service_id])],
        ];
    }
}
