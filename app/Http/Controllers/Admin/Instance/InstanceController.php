<?php


namespace App\Http\Controllers\Admin\Instance;


use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\InstanceCreation;
use App\Models\Instance;

class InstanceController extends Controller
{

    public function index()
    {
        return view('admin.instance.index');
    }

    public function creation(InstanceCreation $instanceCreation)
    {
        $instance = new Instance([
            'name' => $instanceCreation->get('name'),
            'user_id' => $instanceCreation->get('user_id'),
            'configuration' => json_encode($instanceCreation->get('configuration')),
        ]);
        $instance->save();

        return $instance->exists ? back()->withSuccess('Sie haben die Instanz erfolgreich erstellt.') : back()->withErrors('Die Instanz konnte nicht erstellt werden.');
    }

}
