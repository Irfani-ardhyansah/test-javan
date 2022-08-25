<?php

namespace App\Http\Controllers;

use App\Http\Requests\FamilyRequest;
use Illuminate\Http\Request;
use App\Models\Family;

class FamilyController extends Controller
{
    public function get(Request $request)
    {
        try {
            if($request->number == 3) {
                $families = Family::whereHas('parent', function($query) {
                                        $query->where('name', 'Budi');
                                    })->get();
            } else if ($request->number == 4) {
                $families = Family::whereHas('grand_parent', function($query) {
                                        $query->where('name', 'Budi');
                                    })->get();
            } else if ($request->number == 5) {
                $families = Family::where('gender', 'female')
                                    ->whereHas('grand_parent', function($query) {
                                        $query->where('name', 'Budi');
                                    })->get();
            } else if ($request->number == 6) {
                $families = Family::whereHas('grand_child', function($query) {
                                        $query->where('name', 'Farah');
                                    })
                                    ->with(['child' => function($query) {
                                        $query->where('gender', 'female');
                                    }])
                                    ->get();
            } else if ($request->number == 7) {
                $families = Family::where('gender', 'male')
                                    ->whereHas('grand_parent', function($query) {
                                        $query->where('name', 'Budi');
                                    })->get();
            } else {
                $families = Family::get();
            }

            return response()->json([
                'success'   => true,
                'data'      => $families
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success'   => false,
                'data'      => $e->getMessage()
            ]);
        }
    }

    public function store(FamilyRequest $request)
    {
        try {
            $response = Family::create([
                'name'              => $request->name,
                'gender'            => $request->gender,
                'parent_id'         => $request->parent_id ?? null,
                'grand_parent_id'   => $request->grand_parent_id ?? null
            ]);

            return response()->json([
                'success'   => true,
                'data'      => $response
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success'   => false,
                'data'      => $e->getMessage()
            ]);
        }
    }

    public function update(FamilyRequest $request, $id)
    {
        try {
            $response = Family::find($id)->update([
                'name'              => $request->name,
                'gender'            => $request->gender
            ]);

            return response()->json([
                'success'   => true,
                'data'      => $response
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success'   => false,
                'data'      => $e->getMessage()
            ]);
        }
    }

    public function delete($id)
    {
        try {
            $response = Family::find($id);

            $response->delete();

            return response()->json([
                'success'   => true,
                'data'      => null
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success'   => false,
                'data'      => $e->getMessage()
            ]);
        }
    }
}
