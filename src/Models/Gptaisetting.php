<?php
namespace Zeemo\Gptai\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Gptaisetting extends Model
{
    protected $table = 'gptsetting';
    protected $fillable = [
        'id',
        'chatapikey'
    ];
}
