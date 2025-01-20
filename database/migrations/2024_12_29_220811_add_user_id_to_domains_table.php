<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddUserIdToDomainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('domains', function (Blueprint $table) {
            // Step 1: Add the column as nullable initially
            $table->foreignId('user_id')
                ->nullable()
                ->after('id')
                ->constrained()
                ->onDelete('cascade');
        });

        // Step 2: Optionally populate existing rows with a default user_id
        // You can adjust the default user ID (e.g., an admin ID) if needed.
        DB::table('domains')->update(['user_id' => 1]);

        // Step 3: Make the column non-nullable
        Schema::table('domains', function (Blueprint $table) {
            $table->foreignId('user_id')->nullable(false)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('domains', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
}
