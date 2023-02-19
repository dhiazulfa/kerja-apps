<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekening extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $fillable = ['employee_id', 'nomor_rekening', 'jenis_rekening', 'nama_bank', 'nama_pemilik'];
    // protected $with     = ['acceptedTask','client'];

    public function employee(){
        return $this->belongsTo(Employee::class);
    }

    public function employeePayment(){
        return $this->hasMany(EmployeePayment::class);
    }
}
