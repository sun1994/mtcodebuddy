<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';

    protected $fillable = [
        'name', 'descryption', 'parent_id' 
    ];

    /**
     * get all the sub category of category
     * @return [object] [object of all thesubcategory]
     */
    public function subcat()
    {
        return $this->hasMany(self::class, 'parent_id', 'id')->latest('created_at');
    }

}
