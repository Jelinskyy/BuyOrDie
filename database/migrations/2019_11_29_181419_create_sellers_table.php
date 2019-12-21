<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Seller;

class CreateSellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sellers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('description');
            $table->string('image');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $sellers = Seller::all();
        foreach($sellers as $seller)
        {
            unlink(storage_path("app\public/{$seller->image}"));
        }
        Schema::dropIfExists('sellers');
    }
}
