<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScrapeLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scrape_locations', function (Blueprint $table) {
            $table->id();
            $table->integer('location_id');
            $table->integer('country_id');
            $table->integer('location_http_status_code');
            $table->string('location_scrape_time');
            $table->integer('location_all_links_count');
            $table->integer('location_new_links_count');
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
        Schema::dropIfExists('scrape_locations');
    }
}
