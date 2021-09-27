<?php

namespace App\Http\Requests\Juasoonline\Resource\Customer\Wishlist;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;

class WishlistRequest extends FormRequest
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
                'data'                                                  => [ 'required' ],
                'data.type'                                             => [ 'required', 'string', 'in:Wishlist' ],
            ];
        }
        return
        [
            'data'                                                      => [ 'required' ],
            'data.type'                                                 => [ 'required', 'string', 'in:Wishlist' ],

            'data.attributes.product_id'                                => [ 'required', 'string', 'exists:products,resource_id' ],
        ];
    }

    /**
     * @return array|string[]
     */
    public function messages() : array
    {
        return
            [
                'data.required'                                             => "The data field is invalid",

                'data.type.required'                                        => "The type is required",
                'data.type.string'                                          => "The type must be of a string",
                'data.type.in'                                              => "The type is invalid",

                'data.attributes.product_id.exists'                         => "The selected product does not exist.",
            ];
    }
}
