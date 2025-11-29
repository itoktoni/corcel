<?php

namespace App\Http\Controllers;

use App\Dao\Models\Core\User;
use App\Http\Controllers\Core\MasterController;
use App\Http\Function\CreateFunction;
use App\Http\Function\UpdateFunction;
use App\Services\Master\SingleService;
use App\Facades\Model\JadwalModel;
use App\Http\Requests\Core\GeneralRequest;
use App\Services\CreateJadwalService;
use App\Services\UpdateJadwalService;
use Plugins\Response;

class JadwalController extends MasterController
{
    use CreateFunction, UpdateFunction;

    public function __construct(JadwalModel $model, SingleService $service)
    {
        self::$service = self::$service ?? $service;
        $this->model = $model::getModel();
    }

    protected function share($data = [])
    {
        $user = User::getOptions();

        $view = [
            'model' => false,
            'user' => $user,
            'selected' => false
        ];

        return array_merge($view, $data);
    }

    public function postCreate(GeneralRequest $request, CreateJadwalService $service)
    {
        $data = $service->save($this->model, $request);

        return Response::redirectBack($data);
    }

    public function postUpdate($code, GeneralRequest $request, UpdateJadwalService $service)
    {
        $data = $service->update($this->model, $request, $code);

        return Response::redirectBack($data);
    }

    public function getUpdate($code)
    {
        $data = $this->get($code, ['has_absen']);
        $selected = $data->has_absen->pluck('id') ?? [];

        return moduleView(modulePathForm(path: self::$is_core), $this->share([
            'model' => $data,
            'selected' => $selected,
        ]));
    }
}
