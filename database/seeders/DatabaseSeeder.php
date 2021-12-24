<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\DeliveryStatus;
use App\Models\Product;
use App\Models\Status;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Product::insert([
            'name'=>'name1', 
            'description'=>'desc1',
            'photo'=>'1.jfif',
            'weight'=>100,
            'price'=>100,
        ]);
        
        Product::insert([
            'name'=>'name2', 
            'description'=>'desc2',
            'photo'=>'2.jfif',
            'weight'=>200,
            'price'=>200,
        ]);

        Address::insert([
            'address' => 'г. Челябинск, ул. Пушкина, д. 17',
            'time' => '7 дней',
            'price' => 100
        ]);

        Address::insert([
            'address'=>'г. Москва, ул. Колотушкина, д. 47',
            'time' => '3 дня',
            'price' => 200
        ]);

        Status::insert([
            'name'=>'Создан',
        ]);

        Status::insert([
            'name'=>'Обрабатывается',
        ]);

        Status::insert([
            'name'=>'Отправлен',
        ]);

        Status::insert([
            'name'=>'Ожидает выдачи',
        ]);

        Status::insert([
            'name'=>'Выдан',
        ]);

        Status::insert([
            'name'=>'Отменнён',
        ]);

        DeliveryStatus::insert([
            'name'=>'Действующий',
        ]);

        DeliveryStatus::insert([
            'name'=>'Отменнён',
        ]);
    }
}
