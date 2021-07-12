<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenderContent extends Model
{
    use HasFactory;

    protected $fillable = ['tender_id',
                           'tender_content',
                           'tender_file',
                           'created_by',
                           'updated_by'];
}
