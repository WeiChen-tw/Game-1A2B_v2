<?php

namespace App\Http\Controllers;

use Redis;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // //session(['answer' => $this->setAnswer(4)]);
        // Redis::set('name', 'Guest');
        echo session('answer');
        return view('game');
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        session(['answer' => $this->setAnswer(4)]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    function setAnswer($count)
    {
        $answer = "";
        for ($i = 0; $i < $count; $i++) {
            $answer .= rand(0, 9);
        }
        return $answer;
    }
    function checkNumFormat($num, $count)
    {
        $answer = session('answer');
        if (!isset($answer)) {
            return "Please click the START";
        }
        //is number ?
        if (!is_numeric($num)) {
            return "Please enter the number";
        }
        // number length
        if (strlen($num) > $count) {
            return "Number length too long";
        } else if (strlen($num) < $count) {
            return "Number length too short";
        }
        return true;
    }
    function judg($num)
    {

        //substr string and comparison after output A or B
        $result = "";
        $length = 1;
        $answer = session('answer');
        $offsetArr = [];
        $A = 0; //數字與位置正確
        $B = 0; //數字正確位置錯誤
        $numArr = str_split($num);
        $numArr = array_unique($numArr);
        //計算重複數字,預先扣除$B的數量
        foreach ($numArr as $key => $value) {
            $doubleNumCount = substr_count($num, $value) - substr_count($answer, $value);
            if (substr_count($answer, $value) >= 1 && $doubleNumCount > 0) {
                $B -= $doubleNumCount;
            }
        }

        for ($i = 0; $i < strlen($num); $i++) {
            //$x = substr($num, $i, $length);
            $y = substr($answer, $i, $length);
            for ($j = 0; $j < strlen($num); $j++) {
                $x = substr($num, $j, $length);
                //計算A並且清除字串避免重複計算
                ($i == $j && $x == $y) ? ($A++) . ($y = "-") . ($answer = substr_replace($answer, "-", $i, 1)) . ($num = substr_replace($num, " ", $j, 1)) : '';
                //計算B並且清除字串避免重複計算
                ($i != $j && $x == $y) ? ($B++) . ($num = substr_replace($num, " ", $j, 1)) : '';
            }
        }
        ($B < 0) ? $B = 0 : '';
        $result = $A . "A" . $B . "B";
        //A<4 表示不完全正確 
        if ($A < 4) {
            return ($result != "") ? $result : "-1";
        } else {
            return "SUSSECC !!  Answer = " . session('answer');
        }
    }
    public function result(Request $request)
    {
        $userNum = $request->userNum;

        if (isset($userNum)) {
            $result = null;
            //確認是否為4碼數字並且符合答案長度
            $isNum = $this->checkNumFormat($userNum, 4);
            //若符合規定就執行幾A幾B判斷
            if ($isNum === true) {
                $result = $this->Judg($userNum);
            } else {
                $result = $isNum;
            }
            return response()->json(
                [
                    'msg' => $userNum . " OK",
                    'result' => $result,
                    'answer' => session('answer')
                ]
            );
        } else {
            return response()->json(
                [
                    'msg' => "ERROR",
                    'result' => "Pleace enter number",
                    'answer' => session('answer')
                ]
            );
        }
    }
}
