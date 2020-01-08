<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class LeavesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // factory(App\Leave::class, 10)->create();// an other way
        if (DB ::table('leaves') -> get() -> count() == 0)
        {

            DB ::table('leaves') -> insert([
                [
                    'from_date'=>'2020-01-10',
                    'to_date'=>'2020-01-12',
                    'type'=>1,
                    'reason'=>'hello this is reason',
                    'status'=>0,
                    'user_id'=>3,
                    'assigned_id'=>1,
                    'created_at' => Carbon ::now(),
                    'updated_at' => Carbon ::now(),

                ],

                [
                    'from_date'=>'2020-01-10',
                    'to_date'=>'2020-01-12',
                    'type'=>1,
                    'reason'=>'hello this is reason',
                    'status'=>1,
                    'user_id'=>4,
                    'assigned_id'=>1,
                    'created_at' => Carbon ::now(),
                    'updated_at' => Carbon ::now(),

                ],
                [
                    'from_date'=>'2020-01-12',
                    'to_date'=>'2020-01-15',
                    'type'=>1,
                    'reason'=>'hello this is reason',
                    'status'=>1,
                    'user_id'=>4,
                    'assigned_id'=>1,
                    'created_at' => Carbon ::now(),
                    'updated_at' => Carbon ::now(),

                ],

                [
                    'from_date'=>'2020-01-2',
                    'to_date'=>'2020-01-5',
                    'type'=>1,
                    'reason'=>'hello this is reason',
                    'status'=>1,
                    'user_id'=>5,
                    'assigned_id'=>2,
                    'created_at' => Carbon ::now(),
                    'updated_at' => Carbon ::now(),

                ],

                [
                    'from_date'=>'2020-01-25',
                    'to_date'=>'2020-01-30',
                    'type'=>1,
                    'reason'=>'hello this is reason',
                    'status'=>1,
                    'user_id'=>5,
                    'assigned_id'=>2,
                    'created_at' => Carbon ::now(),
                    'updated_at' => Carbon ::now(),

                ],
                [
                    'from_date'=>'2020-02-2',
                    'to_date'=>'2020-02-7',
                    'type'=>1,
                    'reason'=>'hello this is reason',
                    'status'=>0,
                    'user_id'=>5,
                    'assigned_id'=>2,
                    'created_at' => Carbon ::now(),
                    'updated_at' => Carbon ::now(),

                ],
            ]);
        } else
        {
            echo "\nError ! there are leaves\n";
        }
    }
}
