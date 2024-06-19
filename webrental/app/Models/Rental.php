<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Rental extends Model
{
    use HasFactory;

    protected $table = 'rentals';

    protected $fillable = [
        'user_name',
        'user_email',
        'car_id',
        'rental_date',
        'return_date',
        'driver',
    ];

    public function car()
    {
        return $this->belongsTo(Car::class, 'car_id');
    }
}


class AddOrderIdAndStatusToRentalsTable extends Migration
{
    public function up()
    {
        Schema::table('rentals', function (Blueprint $table) {
            $table->string('order_id')->unique();
            $table->string('status')->default('pending');
        });
    }

    public function down()
    {
        Schema::table('rentals', function (Blueprint $table) {
            $table->dropColumn('order_id');
            $table->dropColumn('status');
        });
    }
}