<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bike;
use App\Http\Requests\BikeFormRequest;


class BikeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    private static function getData(){
        return [
            // ['id' => 1, 'name' => "S-Works Venge Di2-Sagan Collection", 'brand' => 'Specialized', 'price' => '14,551,040원'],
            // ['id' => 2, 'name' => "S-Works Tarmac SL7", 'brand' => 'Specialized', 'price' => '18,738,901원'],
            // ['id' => 3, 'name' => "Pinarello Dogma F12 Disk", 'brand' => 'Pinarello', 'price' => '17,035,364원'],
            // ['id' => 4, 'name' => "BMC Teammachine SLR 01 Disc", 'brand' => 'BMC', 'price' => '20,584,399원'],
        ];
        
    }
    public function index()
    {
        //
        return view('bikes.index',[
            // 'bikes'=>self::getData(), //직접입력한 데이터
            'bikes'=>Bike::all(), //데이터베이스에서 불러오기
            'userInput'=>'<script>alert("목록조회 성공!");</script>'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('bikes.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(BikeFormRequest $request)
    {
        $data = $request->validated();
        // $request->validate([
        //     'bike-name'=>'required',
        //     'bike-brand'=>'required',
        //     'bike-price'=>'required', 'integer'
        // ]);
        //
        $bike = new Bike();//Bike모델을 이용해서, 디비 연결하고 그 결과를  객체로 저장.
        $bike->name = $data['bike-name'];
        $bike->brand = $data['bike-brand'];
        $bike->price = $data['bike-price'];
        // $bike->name = strip_tags($request->input('bike-name'));
        // $bike->brand = strip_tags($request->input('bike-brand'));
        // $bike->price = strip_tags($request->input('bike-price'));

        $bike->save();
        return redirect()->route('bikes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bike $bike)
    {
        //
        // $bikes = self::getData();
        //$index = $bike - 1;
        // $index = array_search($bike, array_column($bikes, 'id'));
        
        
        return view('bikes.show', [
            // 'bike'=>Bike::findOrFail($bike)
            //'bike'=>Bike $bike
            'bike'=>$bike
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bike $bike)
    {
        //
         return view('bikes.edit', [
            // 'bike'=>Bike::findOrFail($bike)
            'bike'=>$bike
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, string $id)
    public function update(BikeFormRequest $request, Bike $bike)
    
    {
        //
        //  $request->validate([
        //     'bike-name'=>'required',
        //     'bike-brand'=>'required',
        //     'bike-price'=>'required', 'integer'
        // ]);
         $data = $request->validated();
        //
        // $record = Bike::findOrFail($id);
        
        $bike->name = $data['bike-name'];
        $bike->brand = $data['bike-brand'];
        $bike->price = $data['bike-price'];
        
        // $bike->name = strip_tags($request->input('bike-name'));
        // $bike->brand = strip_tags($request->input('bike-brand'));
        // $bike->price = strip_tags($request->input('bike-price'));

        $bike->save();
        return redirect()->route('bikes.show',$bike->id);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}