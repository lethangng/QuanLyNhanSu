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
            // 'dimensions:min_width=500,max_width=1500'
            'photo' => 'required|image|mimes:png,jpg,jpeg|max:1024'
        ];
    }
    public function messages()
    {
        return [
            'required' => ':attribute bắt buộc phải nhập',
            'mimes' => ':attribute phải là ảnh đuôi png, jpg hoặc jpeg',
            'max' => ':attribute phải nhỏ hơn 1 MB',
        ];
    }

    public function attributes()
    {
        return [
            'photo' => 'Ảnh'
        ];
    }
}
