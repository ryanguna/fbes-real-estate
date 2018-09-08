<?php
/**
 * Created by IntelliJ IDEA.
 * User: ryan
 * Date: 9/8/18
 * Time: 10:14 AM
 */
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PropertyTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $properties = ['House', 'Unit', 'Townhouse'];

        foreach ($properties as $property){
            DB::table('property_types')->insert([
                'name' => $property
            ]);
        }

    }
}
