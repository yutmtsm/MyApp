@extends('layouts.common.common')
@section('css', 'top.css')

@section('content')
<div class="container">
    <!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>test</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="dist/css/bootstrap-colorpicker.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
 
    <script src="//code.jquery.com/jquery-3.1.0.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="dist/js/bootstrap-colorpicker.js"></script>
    <script type="text/javascript">
    function check() {
        console.log("表示テスト");
        if (window.confirm('入力しますか？')) {
            $('[name=result]').val('名前:' + $('input[name=name]').val() + "\n"  + 
                                   'カラー選択:' + $('input[name=colorpicker]').val() + "\n"
            );
        }
    }
    </script>
</head>
<body>
<body>
<div class="container">
 
    <!-- navbar -->
    <div class="row">
        <nav class="navbar navbar-default navbar-fixed-top">
 
            <div class="navbar-header">
                <a href="" class="navbar-brand">Home</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="">menu1</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">menu2 <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a tabindex="-1" href="#">submenu1</a></li>
                        <li class="divider"></li>
                        <li><a tabindex="-1" href="#">submenu2</a></li>
                    </ul>
                </li>
                <li><a href="">menu3</a></li>
            </ul>
        </nav>
    </div>
 
    <!-- content -->
    <div class="row" style="padding:80px 0 0 0">
 
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Menu
                </div>
                <!-- <div class="panel-body"> -->
                <ul class="nav nav-pills nav-stacked">
                    <li class="active"><a href=""><i class="glyphicon glyphicon-pencil"></i> submenu1</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-download"></i>submenu2 <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a tabindex="-1" href="#">submenu1</a></li>
                            <li class="divider"></li>
                            <li><a tabindex="-1" href="#">submenu2</a></li>
                        </ul>
                    </li>
                    <li><a href=""><i class="glyphicon glyphicon-leaf"></i> submenu3</a></li>
                    <li><a href=""><i class="glyphicon glyphicon-folder-open"></i> submenu4</a></li>
                </ul> 
                <!-- </div> -->
            </div>
        </div>
 
        <!-- main -->
        <div class="col-md-9">
            <!-- apply custom style -->
            <div class="page-header" style="margin-top:-30px;padding-bottom:0px;">
            <h1><small>menu1->submenu1</small></h1>
            </div>
 
            <form method="post" action="" class="form-horizontal">
 
                <!-- name -->
                <div class="form-group">
                    <label class="col-md-2 control-label">名前</label>
                    <div class="col-sm-5">
                        <input type="text" name="name" class="form-control" placeholder="名前を入力して下さい"> 
                        <p class="help-block" >全角で名前を入れてね</p>
                    </div>
                </div>
 
                <!-- select -->
                <div class="form-group">
                    <label class="col-md-2 control-label">エリア</label>
                    <div class="col-md-5">
                        <select name="area" class="form-control">
                            <option value="関東">関東</option>
                            <option value="関西">関西</option>
                        </select>
                    </div>
                </div>
 
 
                <!-- gender -->
                <div class="form-group">
                    <label class="col-md-2 control-label">性別</label>
                    <div class="col-md-5">
                        <div class="radio-inline">
                            <label>
                                <input type="radio" name="gender" value="1" id="man">男
                            </label>
                        </div>
                        <div class="radio-inline">
                            <label>
                                <input type="radio" name="gender" value="2" id="woman">女
                            </label>
                        </div>
                    </div>
                </div>
 
                <!-- known by -->
                <div class="form-group">
                    <label class="col-md-2 control-label">情報源</label>
                    <div class="col-md-5">
                        <div class="checkbox-inline">
                            <label>
                                <input type="checkbox" name="knownby" value="web" id="web">Web
                            </label>
                        </div>
                        <div class="checkbox-inline">
                            <label>
                                <input type="checkbox" name="knownby" value="magazine" id="magazine">雑誌
                            </label>
                        </div>
                    </div>
                </div>
 
 
                <!-- Colorpicker  -->
                <div class="form-group">
                    <label class="col-md-2 control-label">カラー選択</label>
                    <div class="col-sm-5">
                        <input id="cp1" type="text"  name="colorpicker" class="form-control" value="#5367ce" /> 
                        <script> $(function() { $('#cp1').colorpicker(); }); </script>
                        <p class="help-block">色を選択してね。</p>
                    </div>
                </div>
  
                <!-- Slide bar  -->
                <div class="form-group">
                    <label class="col-md-2 control-label">ボリューム</label>
                    <div class="col-sm-5">
                        <input type="range" name="num" min="0" max="100" step="5" value="50"
                         onchange="changeValue(this.value)">
                        <span id="val">50</span>
                        <script type="text/javascript">
                        function changeValue(value) {
                            document.getElementById("val").innerHTML = value;
                        }
                        </script>
                    </div>
                </div>
  
                <!-- submit  -->
                 <div class="form-group">
                    <div class="col-md-offset-3">
                        <input type="button" value="Submit" class="btn btn-primary" onClick="check()">
                    </div>
                </div>
                 
                <!-- input result  -->
                <div class="form-group">
                    <label class="col-md-2 control-label">入力結果</label>
                    <div class="col-md-5">
                        <textarea class="form-control" name="result" rows=3 ></textarea>
                    </div>
                </div>
           </form>
        </div>
    </div>
</div>
 
<!-- footer -->
<div id="footer">copy left everything free.</div>
</html>
</div>
@endsection
