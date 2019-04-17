(function($) {
  'use strict';

  function loadScriptData() {
    var value = $.trim($('#pasted-script').val()),
      validScript = true,
      id,
      inlineScript;

    if (
      value.indexOf('<script') === -1 ||
      value.indexOf('//widget.websitevoice.com') === -1 ||
      value.indexOf('window.wvData') === -1 ||
      value.indexOf('wvtag(') === -1 ||
      value.indexOf('</script>') === -1) {
      validScript = false;
    } else {
      id = value.match(/websitevoice.com\/([A-Z0-9\-_])+/gi);
      inlineScript = value.match(/<script>([\s\S])*<\/script>/gi);
      if (null === id || null === inlineScript) {
        validScript = false;
      } else {
        id = id[0].replace('websitevoice.com/', '');
        inlineScript = $.trim(inlineScript[0].replace('<script>', '').replace('</script>', ''));
        $('#user-id').val(id);
        $('#inline-script').val(inlineScript);
      }
    }

    $('#submit-error').toggleClass('hidden', validScript);
    $('#submit').toggleClass('hidden', !validScript);
  }

  $(document).ready(function() {
    $('#pasted-script').on('keyup', loadScriptData);
    loadScriptData();
  });
})(jQuery);
