<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LuongRequest extends FormRequest
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
            'Thang' => 'required',
            'Nam' => 'required',
            'HSL' => 'required|decimal:0,3'
        ];
    }

    public function messages() {
        return [
            'required' => ':attribute bắt buộc phải nhập',
            'decimal' => ':atribute phải là số trong khoảng :decimal'
        ];
    }

    public function attributes() {
        return [
            'Thang' => 'Tháng',
            'Nam' => 'Năm',
            'HSL' => 'Hệ số lương'
        ];
    }
}
