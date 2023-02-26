<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KyLuatRequest extends FormRequest
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
            'TenKyLuat' => 'required',
            'TienPhat' => 'required|integer'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute bắt buộc phải nhập',
            'integer' => ':attribute phải là số'
        ];
    }

    public function attributes()
    {
        return [
            'TenKyLuat' => 'Tên kỷ luật',
            'TienPhat' => 'Tiền phạt'
        ];
    }
}
