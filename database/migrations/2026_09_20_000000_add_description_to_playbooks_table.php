<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('playbooks', function (Blueprint ) {
            if (!Schema::hasColumn('playbooks', 'description')) {
                ->text('description')->nullable()->after('name');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('playbooks', function (Blueprint ) {
            if (Schema::hasColumn('playbooks', 'description')) {
                ->dropColumn('description');
            }
        });
    }
};
