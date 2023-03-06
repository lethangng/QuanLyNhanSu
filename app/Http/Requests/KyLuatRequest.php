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
            'manv' => 'required|exists:nhanvien,id',
            'ngaykyluat' => 'required|date',
            'lydo' => 'required',
            'upfile' => 'required|mimes:png,jpg,jpeg,doc,docx,pdf|max:10024',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute bắt buộc phải nhập',
            'date' => ':attribute phải là định dạng ngày tháng',
            'exists' => ':attribute không tồn tại.',
            'upfile.max' => ':attribute phải nhỏ hơn 10 MB'
        ];
    }

    public function attributes()
    {
        return [
            'manv' => 'Mã nhân viên',
            'ngaykyluat' => 'Ngày kỷ luật',
            'lydo' => 'Lý do',
            'upfile' => 'File'
        ];
    }
}
