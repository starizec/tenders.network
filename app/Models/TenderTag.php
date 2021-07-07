<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenderTag extends Model
{
    use HasFactory;

    public function storeTenderTag($tender_id, $tag)
    {
        $this->tender_id = $tender_id;
        $this->tag_id = $tag;
        $this->save();
    }

    public function destroyTenderTags($tender_id)
    {
        $this->where('tender_id', $tender_id)->delete();
    }
}
