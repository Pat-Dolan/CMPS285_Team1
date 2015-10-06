

if ("-ms-user-select" in document.documentElement.style && navigator.userAgent.match(/IEMobile\/10\.0/)) {
    var msViewportStyle = document.createElement("style");
    var mq = "@-ms-viewport{width:auto!important}";
    msViewportStyle.appendChild(document.createTextNode(mq));
    document.getElementsByTagName("head")[0].appendChild(msViewportStyle);
};

var getURL = function (url, success, error) {
    if (!window.XMLHttpRequest) return;
    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState === 4) {
            if (request.status !== 200) {
                if (error && typeof error === 'function') {
                    error(request.responseText, request);
                }
                return;
            }
            if (success && typeof success === 'function') {
                success(request.responseText, request);
            }
        }
    };
    request.open('GET', url);
    request.send();
};

getURL(
'/app/topbar.html',
function (data) {
    var el = document.createElement(el);
    el.innerHTML = data;
    var fetch = el.querySelector('#new-head');
    var embed = document.querySelector('#head');
    if (!fetch || !embed) return;
    embed.innerHTML = fetch.innerHTML;

}
);

getURL(
'/app/shell.html',
function (data) {
    var el = document.createElement(el);
    el.innerHTML = data;
    var fetch = el.querySelector('#new-shell');
    var embed = document.querySelector('#shell');
    if (!fetch || !embed) return;
    embed.innerHTML = fetch.innerHTML;

}
);