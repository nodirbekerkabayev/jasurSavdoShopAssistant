<?php

namespace App\Http\Controllers\API;
use Illuminate\Http\Request;


use App\Http\Controllers\Controller;
use App\Models\Debt;

class DebtController extends Controller
{
    public function index(Request $request)
    {
        $perPage = request()->query('per_page', 10);
        $query = Debt::query();

        if($request->has('search')) {
            $query->where('name', 'like', '%', $request->get('search') . '%');
        }

        $debts = $query->paginate($perPage);
        return response()->json($debts);
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'client_name' => 'required',
            'client_information' => 'required',
            'client_phone' => 'required',
            'date' => 'required',
            'amount' => 'required',
            'status' => 'required',
        ]);
        $debt = Debt::query()->create($validator);
        return response()->json(['message' => 'Debt created!', 'debt' => $debt]);
    }

    public function show(Debt $debt)
    {
        return response()->json($debt);
    }

    public function update(Request $request, Debt $debt)
    {
        $validator = $request->validate([
            'date' => 'required',
            'amount' => 'required',
        ]);
        $debt->update($validator);
        return response()->json(['message' => 'Debt updated!', 'debt' => $debt]);
    }

    public function destroy(Debt $debt)
    {
        $debt->delete();
        return response()->json(['message' => 'Debt deleted!']);
    }
}
