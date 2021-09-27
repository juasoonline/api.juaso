<?php

namespace App\Http\Requests\Juaso\Resource\Group\Subcategory;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;

class SubcategoryRequest extends FormRequest
{
    /**
     * @param Validator $validator
     */
    protected function failedValidation( Validator $validator )
    {
        throw new HttpResponseException( response() -> json([ 'status' => 'Error', 'code' => Response::HTTP_UNPROCESSABLE_ENTITY, 'errors' => $validator -> errors() -> all() ]) );
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() : bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array|mixed
     */
    public function rules() : array
    {
        if ( in_array( $this -> getMethod (), [ 'PUT', 'PATCH' ] ) )
        {
            return $rules =
            [
                'data'                                                              => [ 'required' ],
                'data.type'                                                         => [ 'required', 'string', 'in:Subcategory' ],

                'data.attributes.name'                                              => [ 'sometimes', 'string', 'unique:subcategories,name' ],
            ];
        }

        return
        [
            'data'                                                                  => [ 'required' ],
            'data.type'                                                             => [ 'required', 'string', 'in:Subcategory' ],

            'data.attributes.name'                                                  => [ 'required', 'string', 'unique:subcategories,name' ],
            'data.attributes.description'                                           => [ 'sometimes', 'string' ],

            'data.relationships.category.category_id'                               => [ 'required', 'string', 'exists:subcategories,id' ],
        ];
    }
}
