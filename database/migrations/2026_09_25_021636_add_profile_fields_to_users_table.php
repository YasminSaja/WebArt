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
        Schema::table('users', function (Blueprint $table) {
            $table->text('bio')
                ->nullable()
                ->after('role');

            $table->string('profile_photo')
                ->nullable()
                ->after('bio');

            $table->enum('status', [
                'pending',
                'approved',
                'rejected',
            ])
                ->default('pending')
                ->after('profile_photo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {

            $table->dropColumn([
                'bio',
                'profile_photo',
                'status',
            ]);

        });
    }
};
