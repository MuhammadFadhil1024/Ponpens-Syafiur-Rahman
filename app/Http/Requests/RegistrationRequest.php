<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class RegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required',
            'address' => 'required',
            'phone' => 'required|string|max:15',

            'status' => 'required|string|in:Sudah Diterima Di Perguruan Tinggi,Masih Dalam Proses Seleksi',
            'asal_pt' => 'required|string|in:Universitas Jember,Politeknik Negeri Jember,UIN KHAS Jember,Universitas Muhammadiyah Jember,STIE Mandala Jember,Universitas Islam Jember',
            'prodi' => 'required|string|max:255',
            'jenjang' => 'required|string|in:D3,D4/S1,S2',
            'angkatan' => 'required|string|in:2019,2020,2021,2022',

            'nama_wali' => 'required|string|max:255',
            'phone_wali' => 'required|string|max:15',

        ];
    }
}
