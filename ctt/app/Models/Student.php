<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Contracts\Auth\Authenticatable;

class Student extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'students';
    protected $primaryKey = 'INDEX_NO';
    protected $fillable = [
        'INDEX_NO',
        'NAME',
        'SEX',
        'DOB',
        'CID',
        'SCHOOL',
        'SUB1',
        'MKS1',
        'SUB2',
        'MKS2',
        'SUB3',
        'MKS3',
        'SUB4',
        'MKS4',
        'SUB5',
        'MKS5',
        'SUB6',
        'MKS6',
        'TOTAL',
        'year',
        'SOC',
        'SOC_RANKING',
        'SIDD',
        'SIDD_RANKING',
        'ELIGIBILITY',
        'email',
        'phone',
        'status',
    ];

    public function getAuthIdentifierName()
    {
        return 'email'; // Change this to your desired identifier (email, username, etc.)
    }

    // Specify the method to get the password
    public function getAuthPassword()
    {
        return $this->password; // Assuming the column name for the password is 'password'
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //bcrypt password
    protected function password(): Attribute {
        return Attribute::make(
            set: fn ($value) => bcrypt($value)
        );
    }
}
