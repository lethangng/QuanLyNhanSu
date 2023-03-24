<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrangThai extends Model
{
    use HasFactory;

    protected $table = 'trangthai';

    protected $fillable = [
        'matrangthai',
        'tentrangthai',
    ];
    public function addOrUpdate($ma, $ten)
    {
        $this->matrangthai = $ma;
        $this->tentrangthai = $ten;
        $this->save();
    }
    public function searchElm()
    {
        return '
        <tr class="" >
            <th class="h1" scope="row">' . $this->matrangthai . '</th>
            <th class="h1" scope="row">' . $this->tentrangthai . '</th>
            <th class="h1" scope="row">
                <a href="' . route('suatrangthai', ['id' => $this->id]) . ' ">
                    <button class="i-edit">
                        <i class="bx bx-edit"></i>
                    </button>
                </a>
                    <button class="i-rotate js-buy-ticket click_del " id="' . $this->id . '" onclick="showBuyTickets()">
                        <i class="bx bx-trash"></i>
                    </button>

            </th>
            </tr>
            ';
    }
}
