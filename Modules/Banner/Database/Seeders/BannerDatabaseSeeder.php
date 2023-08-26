<?php

namespace Modules\Banner\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use Modules\Banner\Entities\BannerAds;
use Modules\Banner\Entities\Banner;

class BannerDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // #command php artisan module:seed Banner
        
        $model = new Banner ;
        //clear data 
        DB::statement("ALTER TABLE ".$model->getTable()." AUTO_INCREMENT=1");
        DB::table($model->getTable())->truncate();
        //insert data    
        $data = $model->TestData();
        $model->insert($data);
        

        $model = new BannerAds ;
        //clear data 
        DB::statement("ALTER TABLE ".$model->getTable()." AUTO_INCREMENT=1");
        DB::table($model->getTable())->truncate();
        //insert data
        $data = $model->TestData();
        $model->insert($data);
    }
}
