<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('rut')->unique()->nullable();
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('second_last_name')->nullable();
            $table->string('phone', 100)->unique()->nullable();
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            
            $table->string('recovery_pin')->nullable();
            $table->dateTime('last_access')->nullable();

            $table->text('photo')->nullable();

            $table->rememberToken();

            $table->boolean('active')->default(1);

            $table->timestamps();
            $table->softDeletes();
        });


        $c = new \App\Models\Customer();
        $c->first_name = 'Franco';
        $c->last_name = 'Castelli';
        $c->phone = '990684339';
        $c->email = 'f.castelli1999@innovaweb.cl';
        $c->password = bcrypt('admin123');
        $c->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
