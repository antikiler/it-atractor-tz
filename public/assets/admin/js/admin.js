
function my_tinymce(selector_name){
  $(document).ready(function() {
   $(selector_name).css('display','block');
  });
  tinyMCE.remove(selector_name);
  tinymce.init({
    file_browser_callback: function(field, url, type, win) {
          tinyMCE.activeEditor.windowManager.open({
              file: '/assets/admin/js/kcfinder/browse.php?opener=tinymce4&field=' + field + '&type=' + type+'&langCode=ru',
              title: 'KCFinder',
              width: 700,
              height: 500,
              inline: true,
              close_previous: false
          }, {
              window: win,
              input: field
          });
          return false;
      },
    selector: selector_name,
    // height: 460,
    theme: 'modern',
    language:'ru',
    menubar: false,
    autoresize: true,
    plugins: [
    "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
    "table directionality emoticons template textcolor  imagetools paste fullpage textcolor colorpicker textpattern codesample toc autoresize"
  ],
  // moxiemanager

  toolbar1: "newdocument | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect",
  toolbar2: "cut copy | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor image media code | insertdatetime preview | forecolor backcolor",
  toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons | print fullscreen | ltr rtl | visualchars visualblocks nonbreaking ",
    image_advtab: true,
  content_css: [
        '/assets/css/tinymce.css',
        '/assets/admin/css/tinymce-1.css?var=123'
      ],
   });
}
