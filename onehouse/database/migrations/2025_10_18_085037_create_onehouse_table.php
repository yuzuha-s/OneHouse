<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->index();
            $table->timestamps();
        });

        Schema::create('makers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profile_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('sales')->nullable();
            $table->string('option')->nullable();
            $table->integer('star');
            $table->timestamps();
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('features', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->string('tag');
            $table->timestamps();
        });

        Schema::create('maker_features', function (Blueprint $table) {
            $table->foreignId('maker_id')->constrained()->cascadeOnDelete();
            $table->foreignId('feature_id')->constrained()->cascadeOnDelete();
            $table->primary(['maker_id', 'feature_id']);
            $table->timestamps();
        });

        Schema::create('landlogs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profile_id')->constrained()->cascadeOnDelete();
            $table->string('address');
            $table->integer('landarea');
            $table->unsignedSmallInteger('far');
            $table->unsignedSmallInteger('bcr');
            $table->integer('floor');
            $table->integer('builable_area');
            $table->bigInteger('pricePerTsubo');
            $table->timestamps();
        });
        Schema::create('checklist_templates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profile_id')->constrained()->cascadeOnDelete();
            $table->foreignId('template_list_id')->constrained()->cascadeOnDelete();
            $table->boolean('checked')->default(false);
            $table->timestamps();
        });

        Schema::create('template_lists', function (Blueprint $table) {
            $table->id();
            $table->integer('phase');
            $table->string('list');
            $table->timestamps();
        });
        Schema::create('checklist_customs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profile_id')->constrained()->cascadeOnDelete();
            $table->foreignId('custom_list_id')->constrained()->cascadeOnDelete();
            $table->boolean('checked')->default(false);
            $table->timestamps();
        });

        Schema::create('custom_lists', function (Blueprint $table) {
            $table->id();
            $table->integer('phase');
            $table->string('list');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('checklist_templates');
        Schema::dropIfExists('checklist_customs');
        Schema::dropIfExists('template_lists');
        Schema::dropIfExists('custom_lists');

        Schema::dropIfExists('maker_features');
        Schema::dropIfExists('landlogs');
        Schema::dropIfExists('features');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('makers');
        Schema::dropIfExists('profiles');
    }
};
