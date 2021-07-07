<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenderCategory extends Model
{
    use HasFactory;

    public function storeTenderCategory($tender_id, $category)
    {
        $this->tender_id = $tender_id;
        $this->category_id = $category;
        $this->save();
    }

    public function destroyTenderCategories($tender_id)
    {
        $this->where('tender_id', $tender_id)->delete();
    }
}
