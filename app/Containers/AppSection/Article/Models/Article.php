<?php

namespace App\Containers\AppSection\Article\Models;

use App\Ship\Parents\Models\Model as ParentModel;

class Article extends ParentModel
{
    protected $fillable = [
        'title',
        'content',
    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'Article';
}
