<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddScrapeStartAtColumnToScrapesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('scrapes', function (Blueprint $table) {
            $table->dateTime('started_at')->nullable()->after('scrape_5xx_count');
            $table->dateTime('ended_at')->nullable()->after('started_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('scrapes', function (Blueprint $table) {
            //
        });
    }
}
