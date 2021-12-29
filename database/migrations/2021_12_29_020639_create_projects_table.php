<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->string('department');
            $table->string('location');
            $table->datetime('deadline');
            $table->string('officer')->comment('officer name');
            $table->datetime('training_start')->nullable();
            $table->datetime('training_end')->nullable();
            $table->string('register_details')->nullable();
            $table->enum('result', ['processed', 'processing', 'unprocessed'])->default('unprocessed');
            $table->string('kpi')->comment('ตัวชี้วัด');
            $table->string('kpi_unit')->comment('ร้อยละของผลการดำเนินงาน');
            $table->float('budget')->comment('งบประมาณ');
            $table->float('disbursement')->comment('งบประมาณที่ได้รับจัดสรร');
            $table->datetime('start_date')->comment('วันที่เริ่มต้น');
            $table->datetime('end_date')->comment('วันที่สิ้นสุด');
            $table->string('comment')->nullable();
            $table->string('attachment')->nullable();
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
        Schema::dropIfExists('projects');
    }
}
