var page = require('webpage').create();
page.open('http://lattes.cnpq.br/0041476511097254', function () {
       page.evaluate(function () {
            var ev = document.createEvent("MouseEvents");
            ev.initEvent("click", true, true);
            document.querySelector("a[href='javascript:getAudio()']").dispatchEvent(ev);
        });
        console.log('Content: ' + page.content);
        phantom.exit();
});
