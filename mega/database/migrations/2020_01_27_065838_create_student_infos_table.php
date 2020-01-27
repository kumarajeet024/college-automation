<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username');
            $table->string('email');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('city');
            $table->string('country');
            $table->string('batchyear');
            $table->string('studentnumber');
            $table->string('contact');
            $table->string('dateofbirth');
            $table->string('hostlerdaysc');
            $table->string('hostelname');
            $table->string('hostelroom');
            $table->string('fathername');
            $table->string('parentcontact');
            $table->string('guardianname');
            $table->string('guardiancontact');
            $table->string('category');
            $table->string('houseno');
            $table->string('stree');
            $table->string('townvillage');
            $table->string('district');
            $table->string('state');
            $table->string('pincode');
            $table->string('guardianhno');
            $table->string('guardianstreet');
            $table->string('guardiancity');
            $table->string('guardiandistrict');
            $table->string('guardian');
            $table->string('guardianstate');
            $table->string('guardianpincode');
            $table->string('10');
            $table->string('12');
            $table->string('1sem');
            $table->string('2sem');
            $table->string('3sem');
            $table->string('4sem');
            $table->string('5sem');
            $table->string('6sem');
            $table->string('7sem');
            $table->string('8sem');
            $table->string('section');
            $table->string('branch');
            $table->string('gender');
            $table->string('entranceexamrank');
            $table->string('graduationper');
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
        Schema::dropIfExists('student_infos');
    }
}
