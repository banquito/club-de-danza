(function() {
  jQuery(function() {
    var editors;
    return editors = nicEditors.allTextAreas({
      iconsPath: '/img/vendors/nicEditorIcons.gif',
      buttonList: ['bold', 'italic', 'underline', 'left', 'center', 'right', 'justify', 'ol', 'ul', 'indent', 'outdent', 'forecolor', 'bgcolor', 'link', 'unlink', 'removeformat']
    });
  });

}).call(this);
