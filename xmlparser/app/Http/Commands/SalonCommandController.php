<?php

namespace App\Http\Commands;


use App\Http\Repository\SalonRepository;
use App\Models\Salon;
use App\Services\CommandServices;
use App\Services\DataParser;

class SalonCommandController implements Commands
{
    private string $tableName = 'salons';
    private string $className = 'Salon';
    private array $RepositoryAnswer = [];
    private array $XMLArray;
    private array $fillable = [
        'id',
        'name',
        'city_id',
        'created_at',
        'updated_at',
    ];

    public function start($pathToFile): array|string
    {
        $this->XMLArray = app(DataParser::class)
            ->run(
                $pathToFile,
                $this->tableName,
            );
        if($this->XMLArray){
            $this->choosingActions();

            if(count($this->RepositoryAnswer) === 0){
                return "В таблицу {$this->tableName} изменения не вносились";
            }
            return $this->RepositoryAnswer;
        }
        return "В таблицу {$this->tableName} изменения не вносились";
    }


    public function choosingActions(): void
    {
        foreach ($this->XMLArray as $element){
            $salon = Salon::find($element[0]);

            if(is_null($salon))
            {
                $this->RepositoryAnswer[$element[0]] = app(SalonRepository::class)->store($this->fillable, $element);

            } else {
                $needToChange = app(CommandServices::class)->checkingForDataChanges($this->fillable, $this->className, $element);

                if($needToChange){
                    $this->RepositoryAnswer[$element[0]] = app(SalonRepository::class)->update($this->fillable, $element[0], $needToChange);
                }
            }
        }

        $toBeDeleted = app(CommandServices::class)->checkingForDataDeletion($this->className, $this->XMLArray);

        if($toBeDeleted)
        {
            foreach ($toBeDeleted as $numberId){
                $this->RepositoryAnswer[$numberId] = app(SalonRepository::class)->destroy($numberId);
            }
        }
    }
}
