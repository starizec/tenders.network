<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScrapeDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scrape_data', function (Blueprint $table) {
            $table->id();
            $table->integer('location_id');
            $table->integer('country_id');
            $table->string('scrape_url', 3000);
            $table->string('scrape_text', 2048)->nullable();
            $table->string('data_scrape_time');
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
        Schema::dropIfExists('scrape_data');
    }
}
