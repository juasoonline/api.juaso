<?php

namespace App\Models\Juaso\Resource\Sale\Category;

use App\Models\Juaso\Resource\Sale\AnniversarySale\AnniversarySale;
use App\Models\Juaso\Resource\Sale\BlackFriday\BlackFriday;
use App\Models\Juaso\Resource\Sale\ChristmasSale\ChristmasSale;
use App\Models\Juaso\Resource\Sale\CyberMonday\CyberMonday;
use App\Models\Juaso\Resource\Sale\EasterSale\EasterSale;
use App\Models\Juaso\Resource\Campaign\FlashDeal\FlashDeal;
use App\Models\Juaso\Resource\Campaign\WeeklyDeal\WeeklyDeal;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [ 'id' ], $table = 'sales_categories';

    /**
     * @return string
     */
    public function getRouteKeyName () : string { return 'resource_id'; }

    /**
     * @return HasMany
     */
    public function flash_deals() : HasMany
    {
        return $this -> hasMany( FlashDeal::class );
    }

    /**
     * @return HasMany
     */
    public function weekly_deals() : HasMany
    {
        return $this -> hasMany( WeeklyDeal::class );
    }

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
    public function cyber_monday_sales() : HasMany
    {
        return $this -> hasMany( CyberMonday::class );
    }
}
