<?php

namespace MiniApp\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Book extends Model
{
    /**
     * Represents a year.
     *
     * @param int $value
     *
     * @return string
     */
    public function getYearAttribute(int $value)
    {
        $difference = date('Y') - $value;

        return "$value, ($difference years ago)";
    }
}