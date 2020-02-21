// textareaでのTABキー入力
window.onload = function() {
    document.getElementById('input').onkeydown = function(e) {
        if (e.keyCode === 9) {
            e.preventDefault();
            var elem = e.target;
            var val = elem.value;
            var pos = elem.selectionStart;
            elem.value = val.substr(0, pos) + '\t' + val.substr(pos, val.length);
            elem.setSelectionRange(pos + 1, pos + 1);
        }
    }
}

function markdown2html() {
    document.getElementById('result').innerHTML =
    marked(document.getElementById('input').value);
}
