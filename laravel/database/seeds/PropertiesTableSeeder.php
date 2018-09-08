<?php
/**
 * Created by IntelliJ IDEA.
 * User: ryan
 * Date: 9/8/18
 * Time: 10:14 AM
 */



http://fbes.example/images/first.jpg

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PropertiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $properties = [
          [
              "bedrooms" => '5',
              "bathrooms" => '6',
              "price" => '200000',
              "contact_info" => '252-5129',
              "picture" => 'http://fbes.example/images/first.jpg',
              "description" => 'Magnificent newly built home with stunning views across the city on a residential block in coveted Noe Valley. 4 bedrooms, 4.5 bathrooms, and all the amenities you desire!',
              "property_type_id" => rand(1,3),
              "construction_type_id" => rand(1,3),
          ],
          [
              "bedrooms" => '1',
              "bathrooms" => '2',
              "price" => '52200',
              "picture" => 'http://fbes.example/images/second.jpg',
              "contact_info" => '+63 9168444147',
              "description" => 'This bright and sunny four bedroom, four bathroom home has been remodeled from the studs up! Enter into a chef\'s kitchen featuring high-end stainless steel appliances and hardwood flooring throughout.',
              "property_type_id" => rand(1,3),
              "construction_type_id" => rand(1,3),
          ],
          [
              "bedrooms" => '3',
              "bathrooms" => '4',
              "price" => '959992',
              "picture" => 'http://fbes.example/images/third.jpg',
              "contact_info" => '+63 9168444147',
              "description" => 'This home has just completed an interior renovation and has combined the charm of a 3 story Marina style facade with a modern, contemporary interior aesthetic and a nod to energy efficiency and environmental consciousness.',
              "property_type_id" => rand(1,3),
              "construction_type_id" => rand(1,3),
          ],
            [
                "bedrooms" => '8',
                "bathrooms" => '1',
                "price" => '550990',
                "picture" => 'http://fbes.example/images/fourth.jpg',
                "contact_info" => '+63 9161245621',
                "description" => 'NEW CONSTRUCTION duplex at the intersection of vibrant Glen Park village, numerous outdoor recreational opportunities, commuter corridors to Peninsula and East Bay.',
                "property_type_id" => rand(1,3),
                "construction_type_id" => rand(1,3),
            ],
            [
                "bedrooms" => '1',
                "bathrooms" => '1',
                "price" => '102245',
                "picture" => 'http://fbes.example/images/fifth.jpg',
                "contact_info" => '251225',
                "description" => '161 Devonshire Way is a superior home. Views of the Pacific Ocean, Golden Gate Park, Marin Headlands and San Francisco Bay. Centrally located in the exceptional Forest Knolls neighborhood close to UCSF and Mt Sutro.',
                "property_type_id" => rand(1,3),
                "construction_type_id" => rand(1,3),
            ]
        ];


        foreach ($properties as $property){
            DB::table('properties')->insert($property);
        }


//        DB::table('properties')->insert([
//            'email' => 'admin@example.com',
//            'password' => bcrypt('admin')
//        ]);




    }
}
