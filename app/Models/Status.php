<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    public function ideas()
    {
        return $this->hasMany(Idea::class);
    }

    public function getStatusClasses()
    {
        $allStatuses = [
            'Open' => 'bg-blue-200',
            'Considering' => 'bg-purple-500 text-white',
            'In Progress' => 'bg-yellow-500 text-white',
            'Implemented' => 'bg-green-500 text-white',
            'Closed' => 'bg-gray-800 text-white',
        ];

        return $allStatuses[$this->name];
    }
}
