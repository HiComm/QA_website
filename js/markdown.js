window.onload = function() {
    inputTabInTextarea();
    addShortcutKey();
    removeShortcutKey();
}

// textareaでのTABキー入力
function inputTabInTextarea() {
    document.getElementById('input').onkeydown = function(e) {
        if (e.keyCode === 9) {
            e.preventDefault();
            var elem = e.target;
            var val = elem.value;
            var pos = elem.selectionStart;
            elem.value = val.substr(0, pos) + '    ' + val.substr(pos, val.length);
            elem.setSelectionRange(pos + 4, pos + 4);
        }
    }
}

/*
// focusの変更を監視
function addFocusListener() {
    addEventListener("focus", validFocusOnTextarea, true);
}

// focusがmarkdownのテキストエリアにあるかをチェック
function validFocusOnTextarea() {
    var focused = document.activeElement;
    if (focused === document.getElementById('input')) addShortcutKey();
    else removeShortcutKey();
}
*/

// textareaのfocusになったらmarkdownのショートカットキーの追加
function addShortcutKey() {
    document.getElementById('input').onfocus = function() {
        // "B"ボタン
        shortcut.add("Shift+a", function() {
            $('#mde-buttons div p:nth-child(1) button').click();
        });
        // I ボタン(** **)
        // H ボタン(#)
        // list-ul ボタン(*)
        // list-ol ボタン(1.)
        // linkボタン([]http://)
        // imageボタン(![](hhtp://)
    }
}

// textareaのfocusが外れたらmarkdownのショートカットを削除　
function removeShortcutKey() {
    document.getElementById('input').onblur = function() {
        // "B"ボタン
        shortcut.remove("Shift+a");
        // I ボタン(** **)
        // H ボタン(#)
        // list-ul ボタン(*)
        // list-ol ボタン(1.)
        // linkボタン([]http://)
        // imageボタン(![](hhtp://)
    }
}

function markdown2html() {
    document.getElementById('result').innerHTML =
    marked(document.getElementById('input').value);

    //===============================================
    //@brief  更新毎にシンタックスハイライトの判定します
    //@author matsutake
    //@date   2020/3/9
    //===============================================
    var nodelist = document.querySelectorAll('pre_code');
    var node = Array.prototype.slice.call(nodelist,0); 
    node.forEach(function(block){
        hljs.highlightBlock(block);
    });
}
