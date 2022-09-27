<?php

namespace App\Http\Repository;

use App\Models\ModelAuto;
use App\Services\RepositoryServices;

class ModelAutoRepository implements Repository
{
    public function store($fillable, $dataArray): string
    {
        $dataArray = app(RepositoryServices::class)->dataPreparationAllElement($fillable, $dataArray);

        try {
            $created = ModelAuto::create($dataArray);
            return "в таблицу 'model_autos' добалена строка c данными транспортного средства {$created->name}";
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('ModelsAuto error store', [$e]);
            return "ОШИБКА: в таблицу 'model_autos' не внесены сведения";
        }

    }
    public function update($fillable, $id, $data): string
    {
        $dataArray = app(RepositoryServices::class)->dataPreparation($fillable, $data);
        $salon = ModelAuto::find($id);

        try {
            $salon->update($dataArray);
            return "в таблице 'model_autos' изменена строка c данными транспортного средства {$salon->name}";
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('ModelsAuto error update', [$e]);
            return "ОШИБКА: в таблицу 'model_autos' не внесены изменения";
        }
    }

    public function destroy($id): string
    {
        try {
            ModelAuto::find($id)->delete();
            return "из таблицы 'model_autos' удалена строка c данными транспортного средства id{$id}";
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('ModelsAuto error destroy', [$e]);
            return "ОШИБКА: из таблицы 'model_autos' не удалена строка c данными транспортного средства id{$id}";
        }
    }
}
