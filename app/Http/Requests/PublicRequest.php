<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PublicRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'photo' => 'required|mimes:png,jpg,jpeg|max:1024'
        ];
    }
    public function messages()
    {
        return [
            'required' => ':attribute bắt buộc phải nhập,',
            'mimes' => ':attribute phải là ảnh.',
            'max' => ':attribute phải nhỏ hơn :size'
        ];
    }

    public function attributes()
    {
        return [
            'photo' => 'Ảnh'
        ];
    }
}
