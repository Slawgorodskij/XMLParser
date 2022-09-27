<?php

namespace App\Http\Repository;

interface Repository
{
    public function store($fillable, $dataArray): string;

    public function update($fillable, $id, $data): string;

    public function destroy($id): string;

}
