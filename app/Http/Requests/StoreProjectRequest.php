<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'name'=> 'required|max:50',
            'link'=> 'required',
            'img' => 'image|max:250',
            'type_id'=> 'required | exists:types,id'
        ];
    }


    public function messages(){
        return [
            'name.required'     => 'Questo progetto deve avere un nome!',
            'name.max'          => 'Il nome di questo progetto è troppo lungo! Meglio non superare i :max caratteri.',
            'link.required'     => 'Devi inserire un link al progetto!',
            'img.image'         => 'Il file deve essere di tipo jpg, png, jpeg, webp.',
            'imag.max'          => 'Il nome del file non deve superare i :max caratteri.',
            'type_id.requiered' => 'Il progetto deve avere una tipologia',
            'type_id.exists'    => 'Tipologia selezionata non valida',
            
        ];
    }
}
