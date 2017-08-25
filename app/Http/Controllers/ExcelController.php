<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use App\test;

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
        $result = $this->import();
        $data = array();
        foreach ($result as $i => $one){
            $data[$i][] = $one['0'];
            $data[$i][] = $one['1'];
        }
        dd($data);


    }

}
