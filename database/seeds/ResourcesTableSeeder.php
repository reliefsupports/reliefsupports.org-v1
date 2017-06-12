<?php

use Illuminate\Database\Seeder;

class ResourcesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('resources')->insert([
    		['name'=>'Rice', 					'type'=>'Food (Dry Rations)'],
    		['name'=>'Dhal', 					'type'=>'Food (Dry Rations)'],
    		['name'=>'Green Gram', 				'type'=>'Food (Dry Rations)'],
    		['name'=>'Chick Peas', 				'type'=>'Food (Dry Rations)'],
    		['name'=>'Canned Fish', 			'type'=>'Food (Dry Rations)'],
    		['name'=>'Biscuits', 				'type'=>'Food (Dry Rations)'],
    		['name'=>'Powdered Milk', 			'type'=>'Food (Dry Rations)'],
    		['name'=>'Rice', 					'type'=>'Food (Cooked)'],
    		['name'=>'Bread', 					'type'=>'Food (Cooked)'],
    		['name'=>'Baby Cereal', 			'type'=>'Food (Baby Food)'],
    		['name'=>'Baby Fomula Milk < 6m', 	'type'=>'Food (Baby Food)'],
    		['name'=>'Baby Fomula Milk < 1y', 	'type'=>'Food (Baby Food)'],
    		['name'=>'Baby Fomula Milk < 1+', 	'type'=>'Food (Baby Food)'],
    		['name'=>'Baby Fomula Milk < 2+', 	'type'=>'Food (Baby Food)'],
    		['name'=>'Baby Fomula Milk < 3+', 	'type'=>'Food (Baby Food)'],
    		['name'=>'Panadol', 				'type'=>'Medicine (OTC)'],
    		['name'=>'Bottled Water 500ml', 	'type'=>'Drinking Water Bottles'],
    		['name'=>'Bottled Water 1l', 		'type'=>'Drinking Water Bottles'],
    		['name'=>'Bottled Water 1.5l', 		'type'=>'Drinking Water Bottles'],
    		['name'=>'Bottled Water 5l', 		'type'=>'Drinking Water Bottles'],
    		['name'=>'Bottled Water 10l', 		'type'=>'Drinking Water Bottles'],
    		['name'=>'Bottled Water 18l', 		'type'=>'Drinking Water Bottles'],
    		['name'=>'Water Bowser 10000l', 	'type'=>'Water (Non Drinking)'],
    		['name'=>'Mobile Toilet', 			'type'=>'Sanitary Equipment'],
    		['name'=>'Clothes (adult male)',	'type'=>'Clothes'],
    		['name'=>'Clothes (adult female)',	'type'=>'Clothes'],
    		['name'=>'Clothes (teenage male)',	'type'=>'Clothes'],
    		['name'=>'Clothes (teenage female)','type'=>'Clothes'],
    		['name'=>'Clothes (child male)',	'type'=>'Clothes'],
    		['name'=>'Clothes (child female)',	'type'=>'Clothes'],
    		['name'=>'2 Person Tent',			'type'=>'Shelter (Tents)'],
    		['name'=>'4 Person Tent',			'type'=>'Shelter (Tents)'],
    		['name'=>'Large Tent',				'type'=>'Shelter (Tents)'],
    		['name'=>'Convertainer',			'type'=>'Shelter (Temporary)'],
    		['name'=>'Chainsaw',				'type'=>'Tools'],
    		['name'=>'Showel',					'type'=>'Tools'],
    		['name'=>'Water Pump (Electric)',	'type'=>'Tools'],
    		['name'=>'Water Pump (Fuel)',		'type'=>'Tools'],
    		['name'=>'Water Tank 500l',			'type'=>'Water Storage'],
    		['name'=>'Water Tank 1000l',		'type'=>'Water Storage'],
    		['name'=>'Cab/Van', 				'type'=>'Transport (Land)'],
    		['name'=>'Small Lorry', 			'type'=>'Transport (Land)'],
    		['name'=>'Big Lorry', 				'type'=>'Transport (Land)'],
    		['name'=>'Container 20ft', 			'type'=>'Transport (Land)'],
    		['name'=>'Container 40ft', 			'type'=>'Transport (Land)'],
    		['name'=>'Helicopter', 				'type'=>'Transport (Air)'],
    		['name'=>'Cargo Aircraft', 			'type'=>'Transport (Air)'],
    		['name'=>'Inflatable Paddle Boat', 	'type'=>'Transport (Water)'],
    		['name'=>'Motor Grader', 			'type'=>'Heavy Machinery'],
    		['name'=>'Backhoe Loader', 			'type'=>'Heavy Machinery'],
    		['name'=>'Tipper Truck', 			'type'=>'Heavy Machinery'],
    		['name'=>'Excavator', 				'type'=>'Heavy Machinery'],
    		['name'=>'Stretcher', 				'type'=>'Medical Equipment'],
    		['name'=>'Wheelchair', 				'type'=>'Medical Equipment'],
    		['name'=>'Bodybag', 				'type'=>'Medical Equipment'],
    		['name'=>'Other', 					'type'=>'Other']
    	]);
    }
}
