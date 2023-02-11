<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $fillable = ['accepted_id', 'client_id', 'status', 'foto_bukti'];
    // protected $with     = ['acceptedTask','client'];

    public function task(){
        return $this->belongsTo(AcceptedTask::class, 'accepted_id','id');
    }

    public function client(){
        return $this->belongsTo(Client::class);
    }
}
