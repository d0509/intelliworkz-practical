<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class Create extends FormRequest
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


        $rules =  [
            'name' => 'required',
            'category_id' => 'required|not_in:default',
            'code' => 'required',
            'title' => 'required',
            'color' => 'required',
            'description' => 'required',
            // 'image' => 'required|image'
        ];

        if(isset($this->product)){
            $rules['image'] = 'nullable|image';
        } else {
            $rules['image'] = 'required|image';
        }
        
        return $rules;
    }

    public function messages()
    {
        return [
            'category_id' => 'The category field is required.',
        ];
    }
}
