<?php

namespace App\Http\Enum;
use Spatie\Enum\Enum;

final class CategoryType extends Enum   //final can not extends
{
    const main_category = 1;
    const sub_category = 2;

}
?>