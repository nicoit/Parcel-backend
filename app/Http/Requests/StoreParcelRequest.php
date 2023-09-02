<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreParcelRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|max:99',
            'description' => 'required|max:250',
            'status' => [ 'required',Rule::in(['posted','in-transit','delivered'])],
            'trackingNumber' => 'required|unique:App\Models\Parcel,tracking_number',
        ];
    }
}