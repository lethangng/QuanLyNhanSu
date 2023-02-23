<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KhenThuongRequest extends FormRequest
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
            'TenKhenThuong' => 'required',
            'TienThuong' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute bắt buộc phải nhập',
        ];
    }

    public function attributes()
    {
        return [
            'TenKhenThuong' => 'Tên khen thưởng',
            'TienThuong' => 'Tiền thưởng'
        ];
    }
}
