<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class StoreAccountRequest
 * @package App\Http\Requests
 * @property string slug
 * @property string description
 * @property string currency
 * @property float initial_balance
 */
class StoreAccountRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'slug' => [
                'required',
                Rule::unique('accounts', 'slug')
            ],
            'description' => 'required',
            'currency' => 'required|in:BRL,USD,EUR'
        ];
    }
}
