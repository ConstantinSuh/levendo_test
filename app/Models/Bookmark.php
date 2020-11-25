<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Laravel\Scout\Searchable;

class Bookmark extends Model
{

    use Sortable;
    use Searchable;

    protected $connection = 'mysql';

    public $sortable = ['created_at', 'url', 'title'];

    public function toSearchableArray()
    {
        return [
            'title' => $this->title,
            'url' => $this->url,
            'meta_description' => $this->meta_description,
            'meta_keywords' => $this->meta_keywords,
        ];
    }

}
