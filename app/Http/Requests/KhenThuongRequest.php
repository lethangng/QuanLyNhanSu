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
            'manv' => 'required|exists:nhanvien,id',
            'tennv' => 'required|exists:nhanvien,tennv',
            'NgayKhenThuong' => 'required|date'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute bắt buộc phải nhập',
            'date' => ':attribute phải là định dạng ngày tháng',
            'exists' => ':attribute không tồn tại.'
        ];
    }

    public function attributes()
    {
        return [
            'manv' => 'Mã nhân viên',
            'tenv' => 'Tên nhân viên',
            'NgayKhenThuong' => 'Ngày khen thưởng'
        ];
    }
}
