<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PublicacoesRequest extends FormRequest
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




        public function rules() {



        return [
           /* 'capa' => 'mimetypes:image/jpg,image/png,image/jpeg|mimes:jpeg,jpg,png',
            'arquivo' => 'mimetypes:image/jpg,image/png,image/jpeg|mimes:jpeg,jpg,png,pdf',*/

        ];



    }

}
