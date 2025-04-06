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
        Schema::table('passengers', function (Blueprint $table) {
            if (!Schema::hasColumn('passengers', 'pnr')) {
                $table->string('pnr')->unique()->after('data_nascita');
            }

            if (!Schema::hasColumn('passengers', 'flight_id')) {
                $table->unsignedBigInteger('flight_id')->nullable()->after('booking_id');
            }
        });

        // Aggiorna flight_id da bookings
        DB::statement('
            UPDATE passengers
            JOIN bookings ON bookings.id = passengers.booking_id
            SET passengers.flight_id = bookings.flight_id
        ');

        // Rendi la colonna NULLABLE (MySQL a volte la tratta come NOT NULL)
        DB::statement('
            ALTER TABLE passengers MODIFY COLUMN flight_id BIGINT UNSIGNED NULL
        ');

        // Aggiungi la foreign key
        Schema::table('passengers', function (Blueprint $table) {
            $table->foreign('flight_id')
                ->references('id')
                ->on('flights')
                ->nullOnDelete(); // ON DELETE SET NULL
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('passengers', function (Blueprint $table) {
            $table->dropForeign(['flight_id']);
            if (Schema::hasColumn('passengers', 'flight_id')) {
                $table->dropColumn('flight_id');
            }
            if (Schema::hasColumn('passengers', 'pnr')) {
                $table->dropColumn('pnr');
            }
        });
    }
};
