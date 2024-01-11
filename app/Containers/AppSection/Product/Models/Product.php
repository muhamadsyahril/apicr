<?php

namespace App\Containers\AppSection\Product\Models;

use App\Containers\AppSection\Category\Models\Category;
use App\Ship\Parents\Models\Model as ParentModel;

class Product extends ParentModel
{
    protected $fillable = [
        'showcase',
        'detail_showcase',
        'category_id',
    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    public function categories(){
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'Product';
}
