function test(){
    console.log("teeeeeeeeeeeeeest");
}

function bold_button(){
    var editor = document.getElementById("input");
    var pos_start = editor.selectionStart;
    var pos_end = editor.selectionEnd;
    var sentence = editor.value;
    var len      = sentence.length;

    var before   = sentence.substr(0, pos_start);
    var word_pre = '**';
    var content  = sentence.substr(pos_start, pos_end-pos_start);
    var word_post = '**';
    var after    = sentence.substr(pos_end, len);
    
    sentence = before + word_pre + content + word_post + after;
    editor.value = sentence;
    
    editor.focus();
    if(pos_start == pos_end){
        editor.setSelectionRange(pos_end+2, pos_end+2);
    }else{
        editor.setSelectionRange(pos_end+content.length+2, pos_end+content.length+2);
    }
}
function italic_button(){
    var editor = document.getElementById("input");
    var pos_start = editor.selectionStart;
    var pos_end = editor.selectionEnd;
    var sentence = editor.value;
    var len      = sentence.length;

    var before   = sentence.substr(0, pos_start);
    var word_pre = '*';
    var content  = sentence.substr(pos_start, pos_end-pos_start);
    var word_post = '*';
    var after    = sentence.substr(pos_end, len);
    
    sentence = before + word_pre + content + word_post + after;
    editor.value = sentence;
    
    editor.focus();
    if(pos_start == pos_end){
        editor.setSelectionRange(pos_end+1, pos_end+1);
    }else{
        editor.setSelectionRange(pos_end+content.length+1, pos_end+content.length+1);
    }
}