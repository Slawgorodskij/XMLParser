<?php

namespace App\Http\Repository;

use App\Models\Salon;
use App\Services\RepositoryServices;

class SalonRepository implements Repository
{
    public function store($fillable, $dataArray): string
    {
        $dataArray = app(RepositoryServices::class)->dataPreparationAllElement($fillable, $dataArray);

        try {
            $created = Salon::create($dataArray);
            return "в таблицу 'salons' добалена строка c данными салона {$created->name}";
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Salon error store', [$e]);
            return "ОШИБКА: в таблицу 'salons' не внесены сведения";
        }

    }
    public function update($fillable, $id, $data): string
    {
        $dataArray = app(RepositoryServices::class)->dataPreparation($fillable, $data);
        $salon = Salon::find($id);

        try {
            $salon->update($dataArray);
            return "в таблице 'salons' изменена строка c данными салона {$salon->name}";
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Salon error update', [$e]);
            return "ОШИБКА: в таблицу 'salons' не внесены изменения";
        }
    }

    public function destroy($id): string
    {
        try {
            Salon::find($id)->delete();
            return "из таблицы 'salons' удалена строка c данными салона id{$id}";
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Salon error destroy', [$e]);
            return "ОШИБКА: из таблицы 'salons' не удалена строка c данными салона id{$id}";
        }
    }
}
