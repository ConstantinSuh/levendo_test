<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Bookmark extends Model
{

    use Sortable;

    protected $connection = 'mysql';

    public $sortable = ['created_at', 'url', 'title'];


}
