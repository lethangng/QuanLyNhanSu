<?php

namespace App\Http\Requests;

use App\Models\NhanVien;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;

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
            'ngaykhenthuong' => 'required|date',
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
            'ngaykhenthuong' => 'Ngày khen thưởng',
            'lydo' => 'Lý do',
            'upfile' => 'File'
        ];
    }
    // public function withValidator($validator)
    // {
    //     $validator->after(function ($validator) {
    //         $tennv = NhanVien::select('tennv')->where('id', $this->manv)->first();
    //         // dd($this->tennv);
    //         if($this->tennv != $tennv) {
    //             $validator->errors()->add('tennv', 'Tên nhân viên nhập vào không khớp với mã nhân viên.');
    //         }
    //     });
    // }

    protected function failedValidation(Validator $validator) {
        if ($this->ajax()){
            throw new HttpResponseException(response()->json(['error' => $validator->errors()]));
        } else{
            throw (new ValidationException($validator))
                            ->errorBag($this->errorBag)
                            ->redirectTo($this->getRedirectUrl());
        }
    }
}
