<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenderType extends Model
{
    use HasFactory;

    public function storeTenderType($tender_id, $type)
    {
        $this->tender_id = $tender_id;
        $this->type_id = $type;
        $this->save();
    }

    public function destroyTenderTypes($tender_id)
    {
        $this->where('tender_id', $tender_id)->delete();
    }
}
