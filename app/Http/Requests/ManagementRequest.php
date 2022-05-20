<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ManagementRequest extends FormRequest
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
            'position' => 'required|string|in:PENGASUH,BINA KONSELING,GURU',
            'job' => 'required|string|max:255|in:KETUA UMUM,DEWAN GURU,BIMBINGAN KONSELING,PINISEPUH',
            'nomor' => 'required|string|max:15',
            'file' => 'required|image'
        ];
    }
}
