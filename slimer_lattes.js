// http://darrendev.blogspot.jp/2013/11/saving-downloaded-files-in-slimerjs-and.html
var fs = require('fs');
var page = require("webpage").create();
fs.makeTree('contents');
page.captureContent = [/^audio\/.*/];

page.open("http://lattes.cnpq.br/0496255936346354") // loads a page
  .then(function(){  
    page.evaluate(function(){
      var a = document.getElementById("btn_audio_captcha");
      var e = document.createEvent('MouseEvents');
      e.initMouseEvent('click', true, true, window, 0, 0, 0, 0, 0, false, false, false, false, 0, null);
      a.dispatchEvent(e);
    });
});

page.onResourceReceived = function(response) {
  //console.log('Response (#' + response.id + ', stage "' + response.stage + '"): ' + JSON.stringify(response));  
  if (response.stage != "end" || !response.bodySize || response.contentType != "audio/mpeg") return;
  //console.log(JSON.stringify(response.contentType));
  //console.log(JSON.stringify(response.url));
  var matches = response.url.match(/[0-9]{13}/);
  var fname = 'audio_' + matches[0] + '.mp3';
  console.log("Saving " + response.bodySize + " bytes to " + fname);
  fs.write(fs.workingDirectory + '/contents/' + fname, response.body, 'wb');
};

