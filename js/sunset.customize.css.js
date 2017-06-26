var editor = ace.edit("customCSS");

editor.setTheme('ace/theme/monokai');
editor.getSession().setMode('ace/mode/css');

jQuery(document).ready(function($){
    var updateCSS = function(){
        $('#sunset_css').val(editor.getSession().getValue());
    };
    $('#save-custom-css-submited').submit(updateCSS);
});
