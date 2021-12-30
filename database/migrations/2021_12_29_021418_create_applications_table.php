<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->boolean('has_idcard')->default(false);
            $table->boolean('has_house_registration')->default(false);
            $table->boolean('has_document')->default(false);
            $table->string('group_name')->nullable();
            $table->enum('product_type', ['FOOD', 'SOUVENIR', 'BEVERAGE', 'HERB', 'CLOTHES', 'OTHER'])->default('OTHER');
            $table->string('reason')->nullable();
            $table->string('fullname');
            $table->string('address');
            $table->string('phone');
            $table->string('shop_address');
            $table->string('shop_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applications');
    }
}
