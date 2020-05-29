<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class create_post_category extends Model
{
    $category = new \App\Admin();
    $category->name = 'Tech';
    $category->save();

    $category = new \App\Admin();
    $category->name = 'Sport';
    $category->save();

    $category = new \App\Admin();
    $category->name = 'Food';
    $category->save();
}
