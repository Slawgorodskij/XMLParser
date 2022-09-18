<?php

namespace App\Http\Repository;

use App\Models\City;
use App\Services\RepositoryServices;

class CityRepository implements Repository
{
    public function store($fillable, $dataArray): string
    {
        $dataArray = app(RepositoryServices::class)->dataPreparationAllElement($fillable, $dataArray);

        try {
            $created = City::create($dataArray);
            return "в таблицу 'cities' добалена строка c данными города {$created->name}";
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('City error store', [$e]);
            return "ОШИБКА: в таблицу 'cities' не внесены сведения";
        }

    }

    public function update($fillable, $id, $data): string
    {
        $dataArray = app(RepositoryServices::class)->dataPreparation($fillable, $data);
        $city = City::find($id);

        try {
            $city->update($dataArray);
            return "в таблице 'cities' изменена строка c данными города {$city->name}";
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('City error update', [$e]);
            return "ОШИБКА: в таблицу 'cities' не внесены изменения";
        }
    }

    public function destroy($id): string
    {
            try {
                City::find($id)->delete();
                return "из таблицы 'cities' удалена строка c данными города {$id}";
            } catch (\Exception $e) {
                \Illuminate\Support\Facades\Log::error('City error destroy', [$e]);
                return "ОШИБКА: из таблицы 'cities' не удалена строка c данными города id{$id}";
            }
    }
}
