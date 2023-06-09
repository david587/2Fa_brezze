<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Exception;
use App\Mail\SendCodeMail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Mail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

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
        'password' => 'hashed',
    ];

    public function generateCode()
    {
        $uniqueCode = false;
        $code = null;

    while (!$uniqueCode) {
        $code = rand(100000, 999999);

        $existingCode = UserCode::where('code', $code)->exists();

        if (!$existingCode) {
            $uniqueCode = true;
        }
    }

    UserCode::updateOrCreate(
        ['user_id' => auth()->user()->id],
        ['code' => $code]
    );

        try {
  
            $details = [
                'title' => 'Submission code',
                'code' => $code
            ];
             
            Mail::to(auth()->user()->email)->send(new SendCodeMail($details));
    
        } catch (Exception $e) {
            info("Error: ". $e->getMessage());
        }
    }
}
