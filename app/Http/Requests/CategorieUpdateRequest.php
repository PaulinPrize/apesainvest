<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategorieUpdateRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        $id = $this->categorie ? ',' . $this->categorie->id : '';
        return [
            'nom' => 'required|string|max:255|unique:categories,nom' . $id,
            'slug' => 'required|string|max:255|unique:categories,slug' . $id,
        ];
    }
}
