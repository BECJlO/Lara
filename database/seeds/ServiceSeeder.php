<?php

use App\ExeService;
use App\ExeTask;
use App\Order;
use App\Room;
use App\Service;
use App\Task;
use App\User;
use App\Worker;

use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //=========== Service ============================
        DB::table('services')->delete();
        Service::create([
            'service_name' => 'First service',
            'service_desc' => 'Lorem1 ipsum dolor sit amet, vix no aperiri pertinax. Cu vel mundi nostrud inciderint, in hinc apeirian facilisis qui, ea epicurei quaestio scribentur per. In quot propriae verterem duo, vix id amet brute simul. Exerci adipisci vel ea, labore malorum in ius. Ad diceret splendide quo, ut noluisse disputationi sit, ea vel munere moderatius. Sit impetus nostrum in, nec ei facer patrioque deterruisset',
            'service_category' => 'S1',
            'service_price' => 120.20
        ]);
        Service::create([
            'service_name' => 'Second service',
            'service_desc' => 'Lorem2 ipsum dolor sit amet, vix no aperiri pertinax. Cu vel mundi nostrud inciderint, in hinc apeirian facilisis qui, ea epicurei quaestio scribentur per. In quot propriae verterem duo, vix id amet brute simul. Exerci adipisci vel ea, labore malorum in ius. Ad diceret splendide quo, ut noluisse disputationi sit, ea vel munere moderatius. Sit impetus nostrum in, nec ei facer patrioque deterruisset',
            'service_category' => 'S1',
            'service_price' => 100.00
        ]);
        Service::create([
            'service_name' => 'Third service',
            'service_desc' => 'Lorem3 ipsum dolor sit amet, vix no aperiri pertinax. Cu vel mundi nostrud inciderint, in hinc apeirian facilisis qui, ea epicurei quaestio scribentur per. In quot propriae verterem duo, vix id amet brute simul. Exerci adipisci vel ea, labore malorum in ius. Ad diceret splendide quo, ut noluisse disputationi sit, ea vel munere moderatius. Sit impetus nostrum in, nec ei facer patrioque deterruisset',
            'service_category' => 'S2',
            'service_price' => 130.00
        ]);

    }
}
