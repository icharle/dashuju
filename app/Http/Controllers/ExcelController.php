<?php

namespace App\Http\Controllers;

use App\qichescore;
use Illuminate\Http\Request;
use Excel;
use App\test;
use App\Student;

class ExcelController extends Controller
{

    /**
     * 导出文件
     */
    public function export()
    {
        $cellData = [
            ['学号','姓名','成绩'],
            ['10001','AAAAA','99'],
            ['10002','BBBBB','92'],
            ['10003','CCCCC','95'],
            ['10004','DDDDD','89'],
            ['10005','EEEEE','96'],
        ];
        Excel::create('学生成绩',function($excel) use ($cellData){
            $excel->sheet('score', function($sheet) use ($cellData){
                $sheet->rows($cellData);
            });
        })->store('xls')->export('xls');
    }


    /**
     * @param $filename   文件名
     * @param $sheetnum   第几个sheet表
     * @return mixed
     *
     * 导入文件
     */
    public function import($filename,$sheetnum)
    {

        //$result = Excel::filter('chunk')->load('storage/exports/'.$filename.'.xls')->chunk(1000,function ($reader){
        $result = Excel::load('storage/exports/'.$filename.'.xls', function($reader) {

        })->getSheet($sheetnum)->toArray();
        unset($result['0']);
        return $result;


//        Excel::load('storage/exports/学生成绩.xls',function ($reader){
////            Excel::filter('chunk')->load('storage/exports/学生成绩.xls')->chunk(10,function ($reader){
//
//                /**
//                 * 1.获取总sheet数
//                 * 2.for循环每一个sheet
//                 * 3.将每一个sheet中的每一行转成数组
//                 */
//
//                $SheetCount = $reader->getSheetCount();
//
//                //$data = array();
//
//                for ($i = 0; $i < $SheetCount; $i++){
//
//
//                    $results = $reader->getSheet($i)->toArray();
//
//                    unset($results[0]);
//
////                    foreach ($results as $key => $value) {
////
////                        $data['one'] =  $value['0'];
////                        $data['two'] =  $value['1'];
////                        $data['three'] =  $value['2'];
////
////                        test::create($data);
////
////                    }
//
//                    //dump($results);
//                    //$data[$i] =  $results;
//
//                }
//
//                //return $data;
//
//            });


    }


    /**
     * 整理返回数据，插入数据库
     */
    public function detail()
    {
        $result = $this->import("13汽车","0");
        $data = array();
        foreach ($result as $i => $value){
            $data[$i][] = $value['0'];
//            $data[$i][] = $value['2'];
//            $data[$i][] = $value['4'];

            /**
             * 首次插入
             */
//            $data['stuid'] = $value['1'];
//            $data['stuname'] = $value['2'];
//            Student::create($data);

            /**
             * 更新插入
             */
//            $id = $value['0'];
//            $data['money'] = $value['2'];
//            $data['monpercent'] = $value['4'];
//            Student::where('stuid',$id)->update($data);

        }
        dd($data);


    }
    
    /**
     * 数据处理
     */
    public function deal()
    {
        $total = qichescore::count();
        for ($i = 1; $i <= $total; $i++){
            $result = qichescore::where('id',$i)->first();

        }


    }

    /**
     * 导入数据并用chunk方法
     */
    public function ichunk()
    {
        Excel::filter('chunk')->noHeading()->load('storage/exports/13汽车.xls')->chunk(1000,function ($reader){

            //unset($reader['0']);
            foreach ($reader as $row){

                $data['stuid'] = $row['0'];
                $data['stuname'] = $row['1'];
                $data['coursetitle'] = $row['2'];
                $data['credit'] = $row['3'];
                $data['results'] = $row['10'];
                $data['point'] = $row['14'];
                $data['coursexzhi'] = $row['15'];
                $data['schoolyear'] = $row['19'];
                $data['semester'] = $row['20'];
                $data['faculty'] = $row['21'];
                $data['class'] = $row['23'];

                qichescore::create($data);

            }
            //die();

        });
    }

}
