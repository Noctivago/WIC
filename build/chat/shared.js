/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


self.addEventListener("connect", function (e) {
    var port = e.ports[0];
    port.addEventListener("message", function (e) {
        if (e.data === "start") {
            var ws = new WebSocket("ws://chatwic.eastus.cloudapp.azure.com:9000");
            port.postMessage("done");
        }
    }, false);
    port.start();
}, false);
