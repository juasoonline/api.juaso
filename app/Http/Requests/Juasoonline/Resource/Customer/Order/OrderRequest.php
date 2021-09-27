<?php

namespace App\Http\Requests\Juasoonline\Resource\Customer\Order;

use App\Rules\Business\Resource\Product\ProductBundleRelationship;
use App\Rules\Business\Resource\Product\ProductColorRelationship;
use App\Rules\Business\Resource\Product\ProductSizeRelationship;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;

class OrderRequest extends FormRequest
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
                'data.type'                                             => [ 'required', 'string', 'in:Order' ],
            ];
        }

        return
        [
            'data'                                                      => [ 'required' ],
            'data.type'                                                 => [ 'required', 'string', 'in:Order' ],

            'data.attributes.product_id'                                => [ 'required', 'string', 'exists:products,resource_id'],
            'data.attributes.color_id'                                  => [ 'sometimes', 'string', 'nullable', 'exists:colors,resource_id', new ProductColorRelationship( $this -> all()['data']['attributes']['product_id'] )],
            'data.attributes.size_id'                                   => [ 'sometimes', 'string', 'nullable', 'exists:sizes,resource_id', new ProductSizeRelationship( $this -> all()['data']['attributes']['product_id'] )],
            'data.attributes.bundle_id'                                 => [ 'sometimes', 'string', 'nullable', 'exists:bundles,resource_id', new ProductBundleRelationship( $this -> all()['data']['attributes']['product_id'] )],

            'data.attributes.delivery_method_id'                        => [ 'required', 'string', 'exists:delivery_methods,resource_id', ],
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

            'data.attributes.delivery_method_id.required'               => "The delivery method is required",
        ];
    }
}
