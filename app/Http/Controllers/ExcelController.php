<?php

namespace App\Http\Controllers;

use App\qiche;
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
            $data = array();
            $resultf = qichescore::where('id',$i)->first();
            $results = qiche::where('stuid',$resultf['stuid'])->first();

            if ($results){    //判断是否存在该人
                if ($resultf['results'] > $results['fenshubig']){
                    $data['fenshubigc'] = $resultf['coursetitle'];
                    $data['fenshubig'] = $resultf['results'];
                }
                $data['kemushu'] = bcadd($results['kemushu'], 1 , 0);
                //qiche::increment(‘kemushu‘,1);
                if ($resultf['results'] < 60 && $resultf['coursexzhi'] != '通选课' ){

                    $data['gkemushu'] = bcadd($results['gkemushu'], 1 , 0);
                    //qiche::increment(‘gkemushu‘);

                }else{

                }
                $data['credits'] = bcadd($resultf['credit'], $results['credits'] , 2);
                if ($resultf['coursexzhi'] == '通选课' ){

                }else{
                    $data['points'] = bcadd( bcmul($resultf['point'],$resultf['credit'],2) , $results['points'], 2 );
                    $data['fcredits'] = bcadd($resultf['credit'] , $results['fcredits'] , 2);
                }
                
                if ($resultf['schoolyear']=='2013-2014' && $resultf['semester'] == '1'){

                    if ($resultf['results'] > $results['yishight']){
                        $data['yishight'] = $resultf['results'] ;
                    }else{
                        $data['yishight'] = $results['yishight'];
                    }

                    if ($results['yislow'] == ""){

                        $data['yislow'] = $resultf['results'];

                    }else{

                        if ($resultf['results'] < $results['yislow']){
                            $data['yislow'] = $resultf['results'];
                        }else{
                            $data['yislow'] = $results['yislow'];
                        }

                    }

                    $data['yiszongfen'] = bcadd($resultf['results'] , $results['yiszongfen'] , 2);
                    $data['yiszongke'] = bcadd($results['yiszongke'] , 1 , 2);
                    //qiche::increment(‘yiszongke‘);

                }elseif ($resultf['schoolyear']=='2013-2014' && $resultf['semester'] == '2'){

                    if ($resultf['results'] > $results['yixhight']){
                        $data['yixhight'] = $resultf['results'] ;
                    }else{
                        $data['yishight'] = $results['yishight'];
                    }

                    if ($results['yixlow'] == ""){

                        $data['yixlow'] = $resultf['results'];

                    }else{

                        if ($resultf['results'] < $results['yixlow']){
                            $data['yixlow'] = $resultf['results'];
                        }else{
                            $data['yixlow'] = $results['yixlow'];
                        }

                    }

                    $data['yixzongfen'] = bcadd($resultf['results'] , $results['yixzongfen'] , 2);
                    $data['yixzongke'] = bcadd($results['yixzongke'] , 1 , 2);
                    //qiche::increment(‘yixzongke‘);

                }elseif ($resultf['schoolyear']=='2014-2015' && $resultf['semester'] == '1'){

                    if ($resultf['results'] > $results['ershight']){
                        $data['ershight'] = $resultf['results'] ;
                    }else{
                        $data['ershight'] = $results['ershight'];
                    }

                    if ($results['erslow'] == ""){

                        $data['erslow'] = $resultf['results'];

                    }else{

                        if ($resultf['results'] < $results['erslow']){
                            $data['erslow'] = $resultf['results'];
                        }else{
                            $data['erslow'] = $results['erslow'];
                        }

                    }

                    $data['erszongfen'] = bcadd($resultf['results'] , $results['erszongfen'] , 2);
                    $data['erszongke'] = bcadd($results['erszongke'] , 1 , 2);
                    //qiche::increment(‘erszongke‘);

                }elseif ($resultf['schoolyear']=='2014-2015' && $resultf['semester'] == '2'){

                    if ($resultf['results'] > $results['erxhight']){
                        $data['erxhight'] = $resultf['results'] ;
                    }else{
                        $data['erxhight'] = $results['erxhight'];
                    }

                    if ($results['erxlow'] == ""){

                        $data['erxlow'] =$resultf['results'];

                    }else{

                        if ($resultf['results'] < $results['erxlow']){
                            $data['erxlow'] = $resultf['results'];
                        }else{
                            $data['erxlow'] = $results['erxlow'];
                        }

                    }

                    $data['erxzongfen'] = bcadd($resultf['results'] , $results['erxzongfen'] , 2);
                    $data['erxzongke'] = bcadd($results['erxzongke'] , 1 , 2);
                    //qiche::increment(‘erxzongke‘);

                }elseif ($resultf['schoolyear']=='2015-2016' && $resultf['semester'] == '1'){

                    if ($resultf['results'] > $results['sanshight']){
                        $data['sanshight'] = $resultf['results'] ;
                    }else{
                        $data['sanshight'] = $results['sanshight'];
                    }

                    if ($results['sanslow'] == ""){

                        $data['sanslow'] = $resultf['results'];

                    }else{

                        if ($resultf['results'] < $results['sanslow']){
                            $data['sanslow'] = $resultf['results'];
                        }else{
                            $data['sanslow'] = $results['sanslow'];
                        }

                    }

                    $data['sanszongfen'] = bcadd($resultf['results'] , $results['sanszongfen'] , 2);
                    $data['sanszongke'] = bcadd($results['sanszongke'] , 1 , 2);
                    //qiche::increment(‘sanszongke‘);

                }elseif ($resultf['schoolyear']=='2015-2016' && $resultf['semester'] == '2'){

                    if ($resultf['results'] > $results['sanxhight']){
                        $data['sanxhight'] = $resultf['results'] ;
                    }else{
                        $data['sanxhight'] = $results['sanxhight'];
                    }

                    if ($results['sanxlow'] == ""){

                        $data['sanxlow'] = $resultf['results'];

                    }else{

                        if ($resultf['results'] < $results['sanxlow']){
                            $data['sanxlow'] = $resultf['results'];
                        }else{
                            $data['sanxlow'] = $results['sanxlow'];
                        }

                    }

                    $data['sanxzongfen'] = bcadd($resultf['results'] , $results['sanxzongfen'] , 2);
                    $data['sanxzongke'] = bcadd($results['sanxzongke'] , 1 , 2);
                    //qiche::increment(‘sanxzongke‘);

                }elseif ($resultf['schoolyear']=='2016-2017' && $resultf['semester'] == '1'){

                    if ($resultf['results'] > $results['sishight']){
                        $data['sishight'] = $resultf['results'] ;
                    }else{
                        $data['sishight'] = $results['sishight'];
                    }

                    if ($results['sislow'] == ""){

                        $data['sislow'] = $resultf['results'];

                    }else{

                        if ($resultf['results'] < $results['sislow']){
                            $data['sislow'] = $resultf['results'];
                        }else{
                            $data['sislow'] = $results['sislow'];
                        }

                    }

                    $data['siszongfen'] = bcadd($resultf['results'] , $results['siszongfen'] , 2);
                    $data['siszongke'] = bcadd($results['siszongke'] , 1 , 2);
                    //qiche::increment(‘siszongke‘);

                }elseif ($resultf['schoolyear']=='2016-2017' && $resultf['semester'] == '2'){

                    if ($resultf['results'] > $results['sixhight']){
                        $data['sixhight'] = $resultf['results'] ;
                    }else{
                        $data['sixhight'] = $results['sixhight'];
                    }

                    if ($results['sixlow'] == ""){

                        $data['sixlow'] = $resultf['results'];

                    }else{

                        if ($resultf['results'] < $results['sixlow']){
                            $data['sixlow'] = $resultf['results'];
                        }else{
                            $data['sixlow'] = $results['sixlow'];
                        }

                    }

                    $data['sixzongfen'] = bcadd($resultf['results'] , $results['sixzongfen'] , 2);
                    $data['sixzongke'] = bcadd($results['sixzongke'] , 1 , 2);
                    //qiche::increment(‘sixzongke‘);

                }

                qiche::where('stuid',$resultf['stuid'])->update($data);
                //dd($data);


            }else{
                $data['stuid'] = $resultf['stuid'];
                $data['stuname'] = $resultf['stuname'];
                $data['fenshubigc'] = $resultf['coursetitle'];
                $data['fenshubig'] = $resultf['results'];
                $data['kemushu'] = 1;
                if ($resultf['results'] < 60 && $resultf['coursexzhi'] != '通选课'){
                    $data['gkemushu'] = 1;
                }else{
                    $data['gkemushu'] = 0;
                }
                $data['credits'] = $resultf['credit'];

                if ($resultf['coursexzhi'] == '通选课' ){
                    $data['points'] = 0;
                    $data['fcredits'] = 0;
                }else{
                    $data['points'] = bcmul($resultf['point'],$resultf['credit'],2);
                    $data['fcredits'] = $resultf['credit'];
                }

                if ($resultf['schoolyear']=='2013-2014' && $resultf['semester'] == '1'){
                    $data['yishight'] = $resultf['results'];
                    $data['yislow'] = $resultf['results'];
                    $data['yiszongfen'] = $resultf['results'];
                    $data['yiszongke'] = 1;
                }elseif ($resultf['schoolyear']=='2013-2014' && $resultf['semester'] == '2'){
                    $data['yixhight'] = $resultf['results'];
                    $data['yixlow'] = $resultf['results'];
                    $data['yixzongfen'] = $resultf['results'];
                    $data['yixzongke'] = 1;
                }elseif ($resultf['schoolyear']=='2014-2015' && $resultf['semester'] == '1'){
                    $data['ershight'] = $resultf['results'];
                    $data['erslow'] = $resultf['results'];
                    $data['erszongfen'] = $resultf['results'];
                    $data['erszongke'] = 1;
                }elseif ($resultf['schoolyear']=='2014-2015' && $resultf['semester'] == '2'){
                    $data['erxhight'] = $resultf['results'];
                    $data['erxlow'] = $resultf['results'];
                    $data['erxzongfen'] = $resultf['results'];
                    $data['erxzongke'] = 1;
                }elseif ($resultf['schoolyear']=='2015-2016' && $resultf['semester'] == '1'){
                    $data['sanshight'] = $resultf['results'];
                    $data['sanslow'] = $resultf['results'];
                    $data['sanszongfen'] = $resultf['results'];
                    $data['sanszongke'] = 1;
                }elseif ($resultf['schoolyear']=='2015-2016' && $resultf['semester'] == '2'){
                    $data['sanxhight'] = $resultf['results'];
                    $data['sanxlow'] = $resultf['results'];
                    $data['sanxzongfen'] = $resultf['results'];
                    $data['sanxzongke'] = 1;
                }elseif ($resultf['schoolyear']=='2016-2017' && $resultf['semester'] == '1'){
                    $data['sishight'] = $resultf['results'];
                    $data['sislow'] = $resultf['results'];
                    $data['siszongfen'] = $resultf['results'];
                    $data['siszongke'] = 1;
                }elseif ($resultf['schoolyear']=='2016-2017' && $resultf['semester'] == '2'){
                    $data['sixhight'] = $resultf['results'];
                    $data['sixlow'] = $resultf['results'];
                    $data['sixzongfen'] = $resultf['results'];
                    $data['sixzongke'] = 1;
                }

                $data['faculty'] = $resultf['faculty'];
                $data['class'] = $resultf['class'];
                qiche::create($data);
                //dd($data);

            }

        }
        $this->sdeal();


    }

    /**
     * 计算平均绩点、平均分
     */
    public function sdeal()
    {
        $total = qiche::count();
        $data = array();
        for ($i = 1 ; $i<= $total; $i++){
            $result = qiche::where('id',$i)->first();

            if ( $result['fcredits']==0 ){
                $data['pjpoints'] = 0;
            }else{
                $data['pjpoints'] = bcdiv($result['points'] , $result['fcredits'], 2);
            }

            if ($result['yiszongke'] == 0){
                $data['yispjf'] = 0;

            }else{
                $data['yispjf'] = bcdiv($result['yiszongfen'] , $result['yiszongke'], 2);
            }

            if ($result['yixzongke'] ==0){
                $data['yixpjf'] = 0;

            }else{
                $data['yixpjf'] = bcdiv($result['yixzongfen'] , $result['yixzongke'], 2);
            }

            if ($result['erszongke'] ==0){
                $data['erspjf'] = 0;
            }else{
                $data['erspjf'] = bcdiv($result['erszongfen'] , $result['erszongke'], 2);
            }

            if ($result['erxzongke'] ==0){
                $data['erxpjf'] = 0;
            }else{
                $data['erxpjf'] = bcdiv($result['erxzongfen'] , $result['erxzongke'], 2);
            }

            if ($result['sanszongke'] ==0){
                $data['sanspjf'] = 0;
            }else{
                $data['sanspjf'] = bcdiv($result['sanszongfen'] , $result['sanszongke'], 2);
            }

            if ($result['sanxzongke'] ==0){
                $data['sanxpjf'] = 0;
            }else{
                $data['sanxpjf'] = bcdiv($result['sanxzongfen'] , $result['sanxzongke'], 2);
            }

            if ($result['siszongke'] ==0){
                $data['sispjf'] = 0;
            }else{
                $data['sispjf'] = bcdiv($result['siszongfen'] , $result['siszongke'], 2);
            }

            if ($result['sixzongke'] ==0){
                $data['sixpjf'] = 0;
            }else{
                $data['sixpjf'] = bcdiv($result['sixzongfen'] , $result['sixzongke'], 2);
            }

            qiche::where('stuid',$result['stuid'])->update($data);
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
                //$data['results'] = $row['10'];

                if ($row['10'] == "" && $row['15'] != '通选课'){
                    switch ($row['14']){
                        case '4.00':
                            $data['results'] = 90;
                            break;
                        case '3.70':
                            $data['results'] = 85;
                            break;
                        case '3.30':
                            $data['results'] = 82;
                            break;
                        case '3.00':
                            $data['results'] = 78;
                            break;
                        case '2.70':
                            $data['results'] = 75;
                            break;
                        case '2.30':
                            $data['results'] = 71;
                            break;
                        case '2.00':
                            $data['results'] = 66;
                            break;
                        case '1.70':
                            $data['results'] = 62;
                            break;
                        case '1.30':
                            $data['results'] = 60;
                            break;
                        case '0.00':
                            $data['results'] = 0;
                            break;
                    }
                }else{
                    $data['results'] = $row['10'];
                }

                $data['point'] = $row['14'];
                $data['coursexzhi'] = $row['15'];
                $data['schoolyear'] = $row['19'];
                $data['semester'] = $row['20'];
                $data['faculty'] = $row['21'];
                $data['class'] = $row['23'];

                qichescore::create($data);
                //dd($data);

            }
            //die();

        });
    }

}
