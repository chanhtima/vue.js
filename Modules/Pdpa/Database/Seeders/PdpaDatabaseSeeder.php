<?php

namespace Modules\Pdpa\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use Modules\Pdpa\Entities\Pdpas;
use Modules\Pdpa\Entities\PdpaDetails;

class PdpaDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // #command php artisan module:seed Pdpa
        
        $model = new Pdpas ;
        //clear data 
        DB::statement("ALTER TABLE ".$model->getTable()." AUTO_INCREMENT=1");
        DB::table($model->getTable())->truncate();
        //insert data    
        $data = $model->TestData();
        $model->insert($data);

        $model = new PdpaDetails ;
        //clear data 
        DB::statement("ALTER TABLE ".$model->getTable()." AUTO_INCREMENT=1");
        DB::table($model->getTable())->truncate();
        //insert data    
        $data = $model->TestData();
        $model->insert($data);
    }   
}
