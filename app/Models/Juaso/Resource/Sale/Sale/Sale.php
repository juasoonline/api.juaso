<?php

namespace App\Models\Juaso\Resource\Sale\Sale;

use App\Models\Juaso\Resource\Sale\AnniversarySale\AnniversarySale;
use App\Models\Juaso\Resource\Sale\BlackFriday\BlackFriday;
use App\Models\Juaso\Resource\Sale\ChristmasSale\ChristmasSale;
use App\Models\Juaso\Resource\Sale\CyberMonday\CyberMonday;
use App\Models\Juaso\Resource\Sale\EasterSale\EasterSale;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static where(string $string, string $string1, $resource_id)
 */
class Sale extends Model
{
    use HasFactory;

    protected $guarded = [ 'id' ];

    /**
     * @return string
     */
    public function getRouteKeyName () : string { return 'resource_id'; }

    /**
     * @return HasMany
     */
    public function black_fridays() : HasMany
    {
        return $this -> hasMany( BlackFriday::class );
    }

    /**
     * @return HasMany
     */
    public function christmas_sales() : HasMany
    {
        return $this -> hasMany( ChristmasSale::class );
    }

    /**
     * @return HasMany
     */
    public function easter_sales() : HasMany
    {
        return $this -> hasMany( EasterSale::class );
    }

    /**
     * @return HasMany
     */
    public function anniversary_sales() : HasMany
    {
        return $this -> hasMany( AnniversarySale::class );
    }

    /**
     * @return HasMany
     */
    public function cyber_mondays() : HasMany
    {
        return $this -> hasMany( CyberMonday::class );
    }

    /**
     * @return BelongsTo
     */
    public function sliders()
    {
        return $this -> belongsTo( Slider::class );
    }
}
