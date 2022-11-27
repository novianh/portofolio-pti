<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialAccount extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'social_accounts';

    protected $fillable = [
        'name',
        'url',
        'type',
    ];
    public function getNameLabelAttribute()
    {
        //ADAPUN VALUENYA AKAN MENCETAK HTML BERDASARKAN VALUE DARI FIELD STATUS
        if ($this->name == 'address') {
            return '<i class="bx bx-map text-2xl text-grey-40"></i>';
        } elseif($this->name == 'email'){
            return '<i class="bx bx-envelope text-2xl text-grey-40"></i>';   
        } elseif($this->name == 'phone'){
            return '<i class="bx bx-phone text-2xl text-grey-40"></i>';
        } elseif($this->name == 'twitter'){
            return '<i class="bx bxl-twitter text-2xl hover:text-yellow"></i>';
        } elseif($this->name == 'facebook'){
            return '<i class="bx bxl-facebook-square text-2xl hover:text-yellow"></i>';
        }elseif($this->name == 'dribble'){
            return '<i class="bx bxl-dribbble text-2xl hover:text-yellow"></i>';
        }elseif($this->name == 'linkedin'){
            return '<i class="bx bxl-linkedin text-2xl hover:text-yellow"></i>';
        }elseif($this->name == 'github'){
            return '<i class="bx bxl-github text-2xl hover:text-yellow"></i>';
        }
        return ' <i class="bx bxl-instagram text-2xl hover:text-yellow"></i>';
    }
}
