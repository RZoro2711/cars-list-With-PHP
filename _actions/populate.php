<?php

include("../vendor/autoload.php");
use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Faker\Factory as Faker;

$faker = Faker::create();
$table = new UsersTable(new MySQL());

$table->delete();
    echo "connect";
    for ($i=0; $i < 15; $i++) { 
        $data = [
            'name' => $faker->name(),
            'email' => $faker->email(),
            'phone' => $faker->phoneNumber(),
            'address' => $faker->address(),
            'password' => 'password',
        ];   
        $table->insert($data);
        var_dump($data);
    }
    echo "Done";