<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <!-- ファビコン（サイトのアイコン）設定．-->
        <link rel="shortcut icon" href="images/hiokichi.ico" type="image/vnd.microsoft.icon">
        <!-- CSSフレームワーク：BULMA (https://bulma.io/documentation/) -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
        <!-- markdown用のCSS -->
        <link rel="stylesheet" type="text/css" href="css/markdown.css">
        <!-- awesome font: アイコンのフォント -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
        <!-- marked.js: マークダウンのプレビュー表示用のスクリプト -->
        <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>

        <!-- カスタム用のCSS -->
        <link rel="stylesheet" type="text/css" href="css/customize_bulma.css">
        <link rel="stylesheet" type="text/css" href="css/headline.css">

        <!--送信用のjavascript-->
        <script>
            xhr = new XMLHttpRequest();

            xhr.onload = function(e){
                if(xhr.readyState==4 && xhr.status==200){
                    alert(xhr.responseText);
                }
            }

            //この部分回答用に編集必要
            function post() {
                xhr.open('POST', 'php/post_question.php', true);
                xhr.setRequestHeader('content-type', 'application/x-www-form-urlencoded;charset=UTF-8');
                var title = document.getElementById("title").value;
                var contents = document.getElementById("input").value;
                var request = "userid=" + "12345678" + "&title=" + title + "&body=" + contents;
                xhr.send(request);
            }

        </script>


        <title>HiComm</title>
    </head>

    <body>
    <!-- header -->

    <!-- navi -->
    <nav class="navbar">
        <div class="navbar-brand">
            <div class="navbar-menu">
                <a class="navbar-item">
                    <img src="images/hiokichi.ico" width="auto">
                </a>
                <a class="navbar-item" href="./index.html">
                    Home
                </a>
                <a class="navbar-item" href="./about.html">
                    About
                </a>
            </div>
        </div>
        <div class="navbar-end">
            <span class="navbar-item">
                <a href="#" class="fa fa-user fa-spin"> ログイン</a>
            </span>
        </div>
    </nav>

    <!-- title -->

    <!-- ================================================================================
     marked.js
     @brief  Markdownのプレビュー．
     @author tmt
     @date   2020/7/17
     @comment html_question.htmlから強奪
    ================================================================================= -->

    <!-- simpleMDEっぽいボタン ****************-->
    <section class="section">

        <div class="field has-addons">
            <p class="control">
            <button class="button">
                <i class="fa fa-bold"></i>
            </button>
            </p>
            <p class="control">
            <button class="button">
                <i class="fa fa-italic"></i>
            </button>
            </p>
            <p class="control">
            <button class="button">
                <i class="fa fa-header"></i>
            </button>
            </p>
            <p class="control">
                <button class="button">
                    <i class="fa fa-list-ul"></i>
                </button>
            </p>
            <p class="control">
                <button class="button">
                    <i class="fa fa-list-ol"></i>
                </button>
            </p>
            <p class="control">
                <button class="button">
                    <i class="fa fa-quote-right"></i>
                </button>
            </p>
            <p class="control">
                <button class="button">
                    <i class="fa fa-link"></i>
                </button>
            </p>
            <p class="control">
                <button class="button">
                    <i class="fa fa-image"></i>
                </button>
            </p>
        </div>
        <!-- **************************************-->

        <div class="content" id="editor">
            <textarea id="input"># 回答を入力</textarea>
            <div id="result"></div>
        </div>
        <script>
        //MEMO normal version
            document.getElementById('input').onkeyup = function(e) {
                document.getElementById('result').innerHTML =
                marked(document.getElementById('input').value);
            };
        </script>
        <button onclick="post();">送信する</button>
    </section>
    <!-- ============================================================================ -->



    <!-- footer -->
    <footer class="footer">
        <div class="content has-text-centered">
            <p>
                ©️ 2020 HiComm Developer Team
            </p>
        </div>
    </footer>
    </body>
<!--
                                   ...((-......
                              `   (HH@H@@@@ggHHkkA+.
                         `  `  ` (H@@H@@@@@@ggqqkWWI-` ` `  `  `
                `  `` `   `     .WHHH@@@@@@@ggmqqbfkl.`   `      `
                 `  `  `    `   dMH@H@H@@@@@gmmqkbpWX_       `
                ` ...(JJJJJ(-..JWMMMMMMMMHgg@gmqkbpWXO_ `  `    `
                .HNNNNNNNNNNNN#N###HHHHHHHMHHHHHHHkkQQa+--..... `  ` ``  ` `
    ` `     `  `.M#NNNNNNNNNNNNNNNNNNN#######HHHHHHH@@@@@gmmHHkkA&..    `   `
   ` ....        dMNNNNNNNNNNNNNNNN########HHHHHHH@@@@H@@gggmqqkHf0>
   (XHHHkkkQQQQQQWMNMMMMMMMMMMMMN####HHHMMHHHHHH@@@HH@@@H@gmmqkbfWI~ ` ` `  `
   dHggmgggggggg@@HH#####NNNNMMMMHHHHWWWWHMMMMMMMMM@HHHMMNNNMMMMHK: `   ` `
    ?WHHHHHHHHHHH@MMHHHHH####MHZZZXvwOOOOOvzz11111zzIzOZWM#HHMMMNA-...   ` ` `
       _~???777777<????jMHHHMHuuXwOOz=??>>>>;;:::<:::<<<?UMMMHHmkpfVZXXXXwwA+
   `    `             .HHHHMSXzwOtl=?>>>;;;;;::~~~~~~~~~~(4kkHHgHHkkWfVyyyVfS_
     `   `  `   `    (H@H@MSrrttl===?>;;;;;:::::~~~~..~...(OWpWl _??7"TYYY77!`
      `        ` ``.jH@@@HStttll===??>+uQQQko::~~(ue&._...._vWyk-
  `     `  `  `   .d@@@@H0tll===????1dH9<;;;;::~~~~~~?X...`._vZZw-      `  `
    `     `  `.---(7WHHHSl===???????z01>>;;:::::~~~~~~(6<..`._OZuI.``  `     `
       `      jzllz+:11<+l==??????>?>>>>+jmo;::~~~_Je-......`.(XZXl
      `   `   (OtltOz<1<1tt=??????>>>>>>jMNN>:~:~~(MMr_.....`. ?<zC_---.  ` `
   `       `   ?XOrrwO+<+Ov??????>>?>>;>dNNN>:~~~~(M#b_......._(?<<<>++<_  `
       `  `   `.kkuzvvtz>z=??????>?>>>>>dMN#<::~:~(H#D~~....._(<++++?==<`
  `         `  d@HkuuuOzzz???>?>??>>?>>;<79>::::~~~?9>~......(l==llllv!`  `  `
    `  `  `   -W@@@HkzOI1?????>?>>>>>>>>;;;;:::~:~~~~~~.~.~.~_+OzltOO_     `
      `      `(H@@@MRO=????>>>?>>???>>>>;;;;::~:~:~~~~~~.~~~~~(1OOwXk_  `
   `       `  jggggH0l==???zwuuwz+>?>>>>;;;::::~~~~~~~~~~..~((_~<wfVk_   `  ` `
     `  `    `JggmmHZll=?=zuuuuuzO>?>>>;;;::::::~~:~~~~~~~~(==z_~jVVk_
   `       `  JHmmmHkl===?OuuuuuXA?>>>>;;;;:::~:~:~~~~~~~~(sz=z<~jfV0  `
      `      `(WggmHkl==??zwuuuzHMmx<>>;;;;::::~~~~~~~~~-(K8llv~~dpVI   `  `
         `  ` (WqqmHRll==???1zz1?vWMHex+>>;;;::::~~:~_(+W9>_<<~~(dfV>     `  `
   `   `   `   XqqmmHZll===???>?>>>1VWMNmme&++++(J+ggHB=<~~~~~~:jWfW:
               jgHqmmkOll===????????>>?+OTTHMMMMHB9Y<<~~~:~::::jXbWC` `` ` `
          `     OqqgggkOttz===????????>?>>>>>>;::::~::~::::::+uWbW$``       `
                .ZHmmggHyttll====??????>???>??>;::::::::(:;>jdkHW$``    `
                  ?HqqqmHkwttllllll===?????????>;;;;;;;;++udkbfV>     `
               `   (THqqmmHkmAOttlllll========1?>??+++zuwWkkH0>`          `
                     _7HmmqqqmHkQXwwwwwwwwwwwwwwwwwmkWkqkH9Y!   `  `   `    `
               `  `     ?TWqqqqqqqmgggggggH@@@ggHqkppWUY!`      `
                 `  `       ~?7TWWbHHqqHmqHHHHHHUU0!` `       `     `   `
                                (zzzz1111zwvOOz=??<
                                .1??>>;;;+Ort=?>>><`    `  `  `  `
                             `   +??>;:::+wrl?>>><_  ` `    `
                            `  ` +?>;::::+zwOz1?+udkXA&. `     `
                                 +?>;;:::jkkkAQkHmmqkWWkl `  `   `
                 `     `       `.+>>;;:::JH@@@ggggmgmmHHk_`     `
               `  ` `  ` ` `  ..jAA&+(::<vMH@@@@@gggggmqR!  `
                        `  .(dWkqqqkkWkkk< ?7YWH@@ggggH9=    ` `  `
                     `     jmmmmqqqqkkkkHr`  `   _!!!~``      `
              ` ` `   `  `.WggggmqqqqkkkkD                `      `
                   `  `   .Hg@gggmmqmmqH9`  `              `  `
                       `  .U@@@ggggmmH9>   `  ` `  `   `    `   `
               `  `      `  ?7"TTT77<`       `   `      ` `      `
-->
<!-- ↑すげええええええええええええええ -->
</html>
