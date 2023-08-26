<?php

namespace Modules\WebSetting\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Modules\WebSetting\Entities\WebSettings;

class WebSettingDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
 

        $model = new WebSettings ;
        //clear data 
        DB::statement("ALTER TABLE ".$model->getTable()." AUTO_INCREMENT=1");
        DB::table($model->getTable())->truncate();
        //insert data    
        $data = $model->TestData();
        $model->insert($data);
    }
}
