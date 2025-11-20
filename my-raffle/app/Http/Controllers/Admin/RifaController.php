<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RifaStoreRequest;
use App\Models\Rifa;
use App\Models\Numero;

class RifaController extends Controller
{
    public function create()
    {
        return view('admin.rifas.create');
    }
    public function store(RifaStoreRequest $request)
    {
        $validated = $request->validated();

        $rifa = Rifa::create($validated);

        $numeros_a_inserir = [];
        $total = $rifa->total_numbers;

        for($i = 1; $i <=$total; $i++)
        {
            $numeros_a_inserir[] = [
                'rifa_id' => $rifa->id,
                'number' => $i,
                'status' => 'available',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        // 3. Inserção em Massa
        Numero::insert($numeros_a_inserir); 

        return redirect()->route('admin.rifas.index')
                         ->with('success', 'Rifa criada e números gerados com sucesso!');
    }
}
