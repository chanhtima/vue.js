<?php

namespace Modules\ContactUs\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use Modules\ContactUs\Entities\Contacts;
use Modules\ContactUs\Entities\ContactPages;
use Modules\ContactUs\Entities\ContactSubject;

class ContactUsDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // #command php artisan module:seed ContactUs
        $model = new ContactPages ;
        //clear data 
        DB::statement("ALTER TABLE ".$model->getTable()." AUTO_INCREMENT=1");
        DB::table($model->getTable())->truncate();
        //insert data    
        $data = $model->TestData();
        $model->insert($data);
       
        $model = new Contacts ;
        //clear data 
        DB::statement("ALTER TABLE ".$model->getTable()." AUTO_INCREMENT=1");
        DB::table($model->getTable())->truncate();
        //insert data    
        $data = $model->TestData();
        $model->insert($data);

        $model = new ContactSubject ;
        //clear data 
        DB::statement("ALTER TABLE ".$model->getTable()." AUTO_INCREMENT=1");
        DB::table($model->getTable())->truncate();
        //insert data    
        $data = $model->TestData();
        $model->insert($data);
    }
}
