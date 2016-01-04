<?php

namespace App\Http\Controllers;

use App\PdfWork;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Smalot\PdfParser\Parser;

class PdfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parser = new Parser();
        $pdf    = $parser->parseFile('ceshi.pdf');
        $text = $pdf->getText();
        $a = strpos($text,'作品名称');
        $b = strpos($text,'学校全称');
        $c = strpos($text,'申报者姓名');
        $d = strpos($text,'类别');
        $e = strpos($text,'■');
        $f = strpos($text,'自然科学类学术论文');
        $g = strpos($text,'哲学社会科学类社会调查报告和学术论文');
        $h = strpos($text,'科技发明制作Α类');
        $i = strpos($text,'科技发明制作Β类');
        $j = strpos($text,'作品撰写的目的和基本思路');
        $k = strpos($text,'作 品 的 科 学性、先进性及独特之处');
        $l = strpos($text,'作品的实际应用价值');
        //作品名称
        $workName =substr($text,$a,$b-$a);
        $workName = str_replace(array('作品名称：'),'',$workName);
        echo '这是作品名称';
        echo $workName;
        //学校名称
        $schoolName = substr($text,$b,$c-$b);
        $schoolName = str_replace(array('学校全称：'),'',$schoolName);
        echo '这是学校名称';
        echo $schoolName;
        //申报人姓名
        $peopleName = substr($text,$c,$d-$c);
        $peopleName = str_replace(array('申报者姓名 （集体名称）：','申报者姓名'),'',$peopleName);
        echo '这是申报人姓名';
        echo $peopleName;

        //作品目的
        $aim = substr($text,$j,$k-$j);
        $aim = str_replace(array('作品撰写的目的和基本思路',' '),'',$aim);
        echo '这是作品目的';
        echo $aim;

        //作品的科学性、先进性及独特支出
        $brief = substr($text,$k,$l-$k);
        $brief = str_replace(array('作品的科学性、先进性及独特之处',' '),'',$brief);
        echo '这是作品的科学性';
        echo $brief;


        $lenth[0] = $f-$e;
        $lenth[1] = $g-$e;
        $lenth[2] = $h-$e;
        $lenth[3] = $i-$e;
        $class ='';
        if($lenth[0]==4)
            $class = '自然科学类学术论文';
        if($lenth[1]==4)
            $class = '哲学社会科学类社会调查报告和学术论文';
        if($lenth[2]==4)
            $class = '科技发明制作Α类';
        if($lenth[3]==4)
            $class = '科技发明制作Β类';
        echo '这是作品类别';
        echo $class;

    }

    public function judge(Request $request){
        $fileName = uniqid();
        //判断请求中是否存在文件，如果存在则保存文件，否则存储为null
        if ($request->hasFile('document')) {
            $path1 = './';
            $request->file('document')->move($path1,$fileName.'.pdf');
        }

        $parser = new Parser();
        $pdf    = $parser->parseFile($fileName.'.pdf');
        $text = $pdf->getText();
        $a = strpos($text,'作品名称');
        $b = strpos($text,'学校全称');
        $c = strpos($text,'申报者姓名');
        $d = strpos($text,'类别');
        $e = strpos($text,'■');
        $f = strpos($text,'自然科学类学术论文');
        $g = strpos($text,'哲学社会科学类社会调查报告和学术论文');
        $h = strpos($text,'科技发明制作Α类');
        $i = strpos($text,'科技发明制作Β类');
        $j = strpos($text,'作品撰写的目的和基本思路');
        $k = strpos($text,'作 品 的 科 学性、先进性及独特之处');
        $l = strpos($text,'作品的实际应用价值');


        //作品名称
        $workName =substr($text,$a,$b-$a);
        $workName = str_replace(array('作品名称：',' '),'',$workName);

        //学校名称
        $schoolName = substr($text,$b,$c-$b);
        $schoolName = str_replace(array('学校全称：',' '),'',$schoolName);

        //申报人姓名
        $peopleName = substr($text,$c,$d-$c);
        $peopleName = str_replace(array('申报者姓名 （集体名称）：','申报者姓名：',' '),'',$peopleName);

        //作品目的
        $aim = substr($text,$j,$k-$j);
        $aim = str_replace(array('作品撰写的目的和基本思路',' '),'',$aim);
//        echo $aim;

        //作品的科学性、先进性及独特支出
        $brief = substr($text,$k,$l-$k);
        $brief = str_replace(array('作品的科学性、先进性及独特之处',' ','作品的科学性、先进性及独特之处'),'',$brief);
//        echo $brief;
//        echo $workName;
//        echo $schoolName;
//        echo $peopleName;
        $lenth[0] = $f-$e;
        $lenth[1] = $g-$e;
        $lenth[2] = $h-$e;
        $lenth[3] = $i-$e;
        $class='';
        if($lenth[0]===4)
            $class = '自然科学类学术论文';
        if($lenth[1]==4)
            $class = '哲学社会科学类社会调查报告和学术论文';
        if($lenth[2]==4)
            $class = '科技发明制作Α类';
        if($lenth[3]==4)
            $class = '科技发明制作Β类';
//        echo $class;

        $info['name']=$workName;
        $info['school']=$schoolName;
        $info['people']=$peopleName;
        $info['big_class']=$class;
        $info['aim'] = $aim;
        $info['brief'] = $brief;
        $info['document_name'] = $fileName;

        PdfWork::create($info);

        return view('pages.pdfWorkInfo',compact('info'));
    }
}
