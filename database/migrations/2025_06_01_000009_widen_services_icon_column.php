<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Widens services.icon from varchar(10) to varchar(30).
     *
     * Earlier installs created the services table before the icon system
     * moved from single emoji (fits in 10 chars) to named SVG icon keys
     * like "archive-box" (11+ chars). This migration fixes existing
     * databases without needing doctrine/dbal, using a raw ALTER TABLE
     * statement so it works the same on fresh and upgraded installs.
     */
    public function up(): void
    {
        if (Schema::hasColumn('services', 'icon')) {
            DB::statement('ALTER TABLE `services` MODIFY `icon` VARCHAR(30) NULL');
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('services', 'icon')) {
            DB::statement('ALTER TABLE `services` MODIFY `icon` VARCHAR(10) NULL');
        }
    }
};
