<?php

namespace App\Http\Requests\Business\Resource\Product\Product;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;

class ProductRequest extends FormRequest
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
     * @return array
     */
    public function rules() : array
    {
        if ( in_array( $this -> getMethod (), [ 'PUT', 'PATCH' ] ) )
        {
            return $rules =
            [
                'data'                                                  => [ 'required' ],
                'data.type'                                             => [ 'required', 'string', 'in:Product' ],
            ];
        }
        return
        [
            'data'                                                      => [ 'required' ],
            'data.type'                                                 => [ 'required', 'string', 'in:Product' ],

            // Validate product attributes
            'data.attributes.name'                                      => [ 'required', 'string' ],
            'data.attributes.quantity'                                  => [ 'sometimes', 'nullable', 'numeric' ],
            'data.attributes.price'                                     => [ 'sometimes', 'nullable', 'numeric', 'regex:/^\d*(\.\d{2})?$/' ],
            'data.attributes.sales_price'                               => [ 'sometimes', 'nullable', 'numeric', 'regex:/^\d*(\.\d{2})?$/' ],

            'data.attributes.pricing'                               => [ 'required', 'string', 'in:Product,Color,Size,Bundle' ],

            // Validate product relationship with brand

            // Validate product categories and relations
            'data.relationships.categories'                             => [ 'required' ],
            'data.relationships.categories.data'                        => [ 'required' ],
            'data.relationships.categories.data.*.type'                 => [ 'required', 'in:Category' ],
            'data.relationships.categories.data.*.category_id'          => [ 'required', 'string', 'exists:subcategories,id' ],
        ];
    }

    /**
     * @return array|string[]
     */
    public function messages(): array
    {
        return
        [
            'data.required'                                             => "The data field is invalid",

            'data.type.required'                                        => "The type is required",
            'data.type.string'                                          => "The type must be of a string",
            'data.type.in'                                              => "The type is invalid",

            'data.attributes.name.required'                             => "Name is required",
            'data.attributes.quantity.required'                         => "Quantity is required",
            'data.attributes.quantity.numeric'                          => "Quantity must be of a number type",
            'data.attributes.price.number'                              => "Prices must be of a number type",
            'data.attributes.sales_price.required'                      => "Sale price is required",
            'data.attributes.sales_price.number'                        => "Sale price must be of a number type",

            'data.specifications.data.*.categories.required'            => "Product must belong to at least one category",
            'data.specifications.data.*.categories.exists'              => "Some product categorie(s) does not exist",
        ];
    }
}
