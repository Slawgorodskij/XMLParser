<?php

namespace App\Http\Repository;

use App\Models\Stock;
use App\Services\RepositoryServices;

class StockRepository implements Repository
{
     public function store($fillable, $dataArray): string
    {
        $dataArray = app(RepositoryServices::class)->dataPreparationAllElement($fillable, $dataArray);

        try {
            $created = Stock::create($dataArray);
            return "в таблицу 'stocks' добалена строка c данными id {$created->id}";
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Stock error store', [$e]);
            return "ОШИБКА: в таблицу 'stocks' не внесены сведения";
        }

    }
    public function update($fillable, $id, $data): string
    {
        $dataArray = app(RepositoryServices::class)->dataPreparation($fillable, $data);
        $stock = Stock::find($id);

        try {
            $stock->update($dataArray);
            return "в таблице 'stocks' изменена строка c данными id {$stock->id}";
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Stock error update', [$e]);
            return "ОШИБКА: в таблицу 'stocks' не внесены изменения";
        }
    }

    public function destroy($id): string
    {
        try {
            Stock::find($id)->delete();
            return "из таблицы 'stocks' удалена строка c данными id {$id}";
        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Stock error destroy', [$e]);
            return "ОШИБКА: из таблицы 'stocks' не удалена строка c данными id {$id}";
        }
    }
}
