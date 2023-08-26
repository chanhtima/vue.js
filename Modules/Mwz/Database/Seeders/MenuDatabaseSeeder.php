<?php

namespace Modules\Mwz\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use Modules\Mwz\Entities\MenuGroups;
use Modules\Mwz\Entities\Menus;

class MenuDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // #command php artisan module:seed Menu
       
        $model = new Menus ;
        //clear data 
        DB::statement("ALTER TABLE ".$model->getTable()." AUTO_INCREMENT=1");
        DB::table($model->getTable())->truncate();
        //insert data    
        $data = $model->TestData();
        $model->insert($data);

        $model = new MenuGroups ;
        //clear data 
        DB::statement("ALTER TABLE ".$model->getTable()." AUTO_INCREMENT=1");
        DB::table($model->getTable())->truncate();
        //insert data    
        $data = $model->TestData();
        $model->insert($data);
    }
}
