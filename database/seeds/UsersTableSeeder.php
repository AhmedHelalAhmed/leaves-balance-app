<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * TODO enhance this class be make boss seeder and employees seeder
     */
    public function run()
    {
        // factory(App\User::class, 10)->create();// an other way
        if (DB ::table('users') -> get() -> count() == 0)
        {
            // insert managers
            DB ::table('users') -> insert([
                [
                    'name'=>'manager1',
                    'email'=>'manager1@app.com',
                    'password'=>bcrypt('123456'),
                    'type'=>2,
                    'created_at' => Carbon ::now(),
                    'updated_at' => Carbon ::now(),
                ],
                [
                    'name'=>'manager2',
                    'email'=>'manager2@app.com',
                    'password'=>bcrypt('123456'),
                    'type'=>2,
                    'created_at' => Carbon ::now(),
                    'updated_at' => Carbon ::now(),
                ]
            ]);

            // insert employees
            DB ::table('users') -> insert([
                [
                    'name'=>'employee1',
                    'email'=>'employee1@app.com',
                    'password'=>bcrypt('123456'),
                    'type'=>1,
                    'user_id'=>1,
                    'balance_of_leaves'=>21,
                    'created_at' => Carbon ::now(),
                    'updated_at' => Carbon ::now(),
                ],
                [
                    'name'=>'employee2',
                    'email'=>'employee2@app.com',
                    'password'=>bcrypt('123456'),
                    'type'=>1,
                    'user_id'=>1,
                    'balance_of_leaves'=>15,
                    'created_at' => Carbon ::now(),
                    'updated_at' => Carbon ::now(),
                ],
                [
                    'name'=>'employee3',
                    'email'=>'employee3@app.com',
                    'password'=>bcrypt('123456'),
                    'type'=>1,
                    'user_id'=>2,
                    'balance_of_leaves'=>7,
                    'created_at' => Carbon ::now(),
                    'updated_at' => Carbon ::now(),
                ]
            ]);


        } else
        {
            echo "\nError ! there are user\n";
        }
    }
}
