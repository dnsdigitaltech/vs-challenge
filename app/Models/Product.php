<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['nome', 'marca', 'preco', 'estoque'];

    //Filtros de Produtos da API
    public function getResults($data, $total)
    {
        if (!isset($data['filter']) && !isset($data['nome']) && !isset($data['marca']))
            return $this->paginate($total);

        return $this->where(function ($query) use ($data) {
                    if (isset($data['filter'])) {
                        $filter = $data['filter'];
                        $query->where('nome', $filter);
                        $query->orWhere('marca', 'LIKE', "%{$filter}%");
                    }

                    if (isset($data['nome']))
                        $query->where('nome', $data['nome']);
                    
                    if (isset($data['marca'])) {
                        $marca = $data['marca'];
                        $query->where('marca', 'LIKE', "%{$marca}%");
                    }
                })//->toSql();dd($results);
                ->paginate($total);
    }
    
}
