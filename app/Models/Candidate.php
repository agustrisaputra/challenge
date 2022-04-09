<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class Candidate extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'education',
        'dob',
        'experience',
        'last_position',
        'applied_position',
        'skills',
        'resume'
    ];

    /**
     * Set the resume
     *
     * @param  object  $value
     * @return void
     */
    public function setResumeAttribute($value)
    {
        if (! isset($value)) return;

        $fileName = $value->getClientOriginalName() . '.' . $value->extension();

        $path = Storage::url('files/' . $fileName);

        if (File::exists($path)) {
            File::delete($path);
        }

        $value->storeAs('files', $fileName, 'public');

        return $this->attributes['resume'] = $fileName;
    }

    /**
     * Get the resume
     *
     * @param  string  $value
     * @return string
     */
    public function getResumeAttribute($value)
    {
        if (! isset($value)) return;

        $path = Storage::url('files/' . $value);

        if (File::exists(public_path($path))) {
            return asset($path);
        } else {
            return;
        }
    }
}
