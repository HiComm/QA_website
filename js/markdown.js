// textareaでのTABキー入力
window.onload = function() {
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

function markdown2html() {
    document.getElementById('result').innerHTML =
    marked(document.getElementById('input').value);

    //===============================================
    //@brief  更新毎にシンタックスハイライトの判定します
    //@author matsutake
    //@date   2020/3/9
    //===============================================
    document.querySelectorAll('pre code').forEach((block) => {
        hljs.highlightBlock(block);
    });
}
