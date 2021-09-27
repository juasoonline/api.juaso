<?php

namespace App\Rules\Business\Resource\Product;

use App\Models\Business\Resource\Product\Product\Product;
use Illuminate\Contracts\Validation\Rule;

class ProductBundleRelationship implements Rule
{
    private $theProduct;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct( $product )
    {
        $this -> theProduct = $product;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes( $attribute, $value ) : bool
    {
        return Product::where('resource_id', $this -> theProduct ) -> first() -> bundles() -> where( 'resource_id', $value ) -> exists();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message() : string
    {
        return 'The selected bundle is invalid.';
    }
}
