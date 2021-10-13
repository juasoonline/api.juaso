<?php

namespace App\Http\Requests\Juasoonline\Resource\Customer\Customer;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;

class CustomerRequest extends FormRequest
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
                'data.type'                                             => [ 'required', 'string', 'in:Customer' ],
            ];
        }

        // Password reset validations
        elseif ( $this -> is( '*/password/reset/email/verification' ))
        {
            return
            [
                'data'                                                  => [ 'required' ],
                'data.type'                                             => [ 'required', 'string', 'in:Customer' ],

                'data.attributes.email'                                 => [ 'required', 'email', 'exists:customers,email' ],
            ];
        }
        elseif ( $this -> is( '*/password/reset/code/verification' ))
        {
            return
            [
                'data'                                                  => [ 'required' ],
                'data.type'                                             => [ 'required', 'string', 'in:Customer' ],

                'data.attributes.email'                                 => [ 'required', 'email', 'exists:customers,email' ],
                'data.attributes.verification_code'                     => [ 'required', 'integer', 'exists:customers,password_reset_token' ],
            ];
        }
        elseif ( $this -> is( '*/password/reset' ))
        {
            return
            [
                'data'                                                  => [ 'required' ],
                'data.type'                                             => [ 'required', 'string', 'in:Customer' ],

                'data.attributes.email'                                 => [ 'required', 'email', 'exists:customers,email' ],
                'data.attributes.password'                              => [ 'required', 'confirmed' ],
            ];
        }
//        elseif ( $this -> is( '*/verification' ) || $this -> is( '*/resend' ) || $this -> is( '*/forgot-password' ) || $this -> is( '*/change-password' ) )
//        {
//            return
//            [
//                'data'                                                      => [ 'required' ],
//                'data.type'                                                 => [ 'required', 'string', 'in:Customer' ],
//
//                'data.attributes.email'                                     => [ 'required', 'email', 'exists:customers,email' ],
//                'data.attributes.verification_code'                         => [ 'sometimes', 'integer', 'exists:customers,verification_code' ],
//            ];
//        }
        return
        [
            'data'                                                      => [ 'required' ],
            'data.type'                                                 => [ 'required', 'string', 'in:Customer' ],

            'data.attributes.first_name'                                => [ 'required', 'string' ],
            'data.attributes.middle_name'                               => [ 'sometimes', 'string' ],
            'data.attributes.last_name'                                 => [ 'required', 'string' ],

            'data.attributes.email'                                     => [ 'required', 'email', 'unique:customers,email' ],
            'data.attributes.mobile_phone'                              => [ 'required', 'min:10', 'numeric' ],
        ];
    }

    /**
     * @return array|string[]
     */
    public function messages() : array
    {
        return
        [
            'data.required'                                             => "The data field is invalid.",

            'data.type.required'                                        => "The type is required.",
            'data.type.string'                                          => "The type must be of a string.",
            'data.type.in'                                              => "The type is invalid.",

            'data.attributes.first_name.required'                       => "The first name is required.",
            'data.attributes.first_name.string'                         => "The first name must be of a string type.",

            'data.attributes.middle_name.string'                        => "The middle name must be of a string type.",

            'data.attributes.last_name.required'                        => "The last name is required.",
            'data.attributes.last_name.string'                          => "The last name must be of a string type.",

            'data.attributes.email.required'                            => "The email is required.",
            'data.attributes.email.email'                               => "The email address is invalid.",
            'data.attributes.email.unique'                              => "The email address is already taken.",

            'data.attributes.mobile_phone.required'                     => "The mobile phone number is required.",
            'data.attributes.mobile_phone.min'                          => "The mobile phone number must have a minimum of 10 digits.",
            'data.attributes.mobile_phone.numeric'                      => "The mobile phone number must only contain numbers.",
            'data.attributes.mobile_phone.unique'                       => "The mobile phone number is already taken.",

            'data.attributes.email.exists'                              => "The email does not exist.",

            'data.attributes.verification_code.required'                => "The verification code is required.",
            'data.attributes.verification_code.integer'                 => "The verification code must be an integer value.",
            'data.attributes.verification_code.exists'                  => "The verification code is invalid.",

            'data.attributes.password.required'                         => "The password is required.",
            'data.attributes.password.confirmed'                        => "The password confirmation does not match.",
        ];
    }
}
