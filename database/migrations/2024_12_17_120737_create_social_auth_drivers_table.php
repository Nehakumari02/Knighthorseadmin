<?php

use App\Models\Admin\SocialAuthDriver;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_auth_drivers', function (Blueprint $table) {
            $table->id();
            $table->ulid('ulid')->unique()->index();
            $table->string('panel', 50)->default(SocialAuthDriver::PANEL_USER);
            $table->string('driver_name', 250);
            $table->string('driver_slug', 250);
            $table->text('credentials');
            $table->string('image')->nullable();
            $table->boolean('status')->default(false);
            $table->string('redirect_url')->nullable();
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
        Schema::dropIfExists('social_auth_drivers');
    }
};
