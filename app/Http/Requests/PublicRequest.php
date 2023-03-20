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
            'nam' => 'required|date_format:Y'
        ];
    }
    public function messages()
    {
        return [
            'required' => ':attribute bắt buộc phải nhập',
            'date_format' => ':attribute định dạng không chính xác'
        ];
    }

    public function attributes()
    {
        return [
            'nam' => 'Năm'
        ];
    }
}
