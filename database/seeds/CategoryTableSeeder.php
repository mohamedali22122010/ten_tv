<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Category::truncate();
    	Category::create( [
		        'title'=>'قسم التوعية والتثقيف الصحي',
		        'description'=>'', 
		        'meta_tag_title'=>'', 
		        'meta_tag_description'=>'', 
		        'meta_tag_keywords'=>'',
		        'status'=>1,
	    	]
    	);
		Category::create( [
		        'title'=>'قسم العلاج الخيري',
		        'description'=>'', 
		        'meta_tag_title'=>'', 
		        'meta_tag_description'=>'', 
		        'meta_tag_keywords'=>'',
		        'status'=>1,
	    	]
    	);
		Category::create( [
		        'title'=>'قسم شرح أنظمة وزارة الصحة',
		        'description'=>'', 
		        'meta_tag_title'=>'', 
		        'meta_tag_description'=>'', 
		        'meta_tag_keywords'=>'',
		        'status'=>1,
	    	]
    	);
		Category::create( [
		        'title'=>'قسم الإجراءات القانونية سواً اخطاء طبية',
		        'description'=>'', 
		        'meta_tag_title'=>'', 
		        'meta_tag_description'=>'', 
		        'meta_tag_keywords'=>'',
		        'status'=>1,
	    	]
    	);
		Category::create( [
		        'title'=>'قسم الاخبار عن شركات التأمين',
		        'description'=>'', 
		        'meta_tag_title'=>'', 
		        'meta_tag_description'=>'', 
		        'meta_tag_keywords'=>'',
		        'status'=>1,
	    	]
    	);
		Category::create( [
		        'title'=>'قسم الحالات الانسانية',
		        'description'=>'', 
		        'meta_tag_title'=>'', 
		        'meta_tag_description'=>'', 
		        'meta_tag_keywords'=>'',
		        'status'=>1,
	    	]
    	);
		
		Category::create( [
		        'title'=>'عيادة القلب',
		        'description'=>'', 
		        'meta_tag_title'=>'', 
		        'meta_tag_description'=>'', 
		        'meta_tag_keywords'=>'',
		        'home'=>1,
		        'status'=>1,
	    	]
    	);
		
		Category::create( [
		        'title'=>'عيادة البطن',
		        'description'=>'', 
		        'meta_tag_title'=>'', 
		        'meta_tag_description'=>'', 
		        'meta_tag_keywords'=>'',
		        'home'=>1,
		        'status'=>1,
	    	]
    	);		
		Category::create( [
		        'title'=>'عيادة الاطفال',
		        'description'=>'', 
		        'meta_tag_title'=>'', 
		        'meta_tag_description'=>'', 
		        'meta_tag_keywords'=>'',
		        'home'=>1,
		        'status'=>1,
	    	]
    	);		
		Category::create( [
		        'title'=>'عيادة النساء',
		        'description'=>'', 
		        'meta_tag_title'=>'', 
		        'meta_tag_description'=>'', 
		        'meta_tag_keywords'=>'',
		        'home'=>1,
		        'status'=>1,
	    	]
    	);		
		
    }
}
