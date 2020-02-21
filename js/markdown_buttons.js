function test(){
    console.log("teeeeeeeeeeeeeest");
}

function bold_button(){
    var editor = document.getElementById("input");
    var pos = editor.selectionEnd;
    var sentence = editor.value;
    var len      = sentence.length;
    var before   = sentence.substr(0, pos);
    var word     = '****';
    var after    = sentence.substr(pos, len);
    
    sentence = before + word + after;
    editor.value = sentence;
    
    editor.focus();
    editor.setSelectionRange(pos+2, pos+2);
}