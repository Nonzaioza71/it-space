window.addEventListener('load', onLoadStart)
function onLoadStart() {
    try {
        clearURL()
        loadLayout()
        .then(startLoad)
        .then(delayLoad)
    } catch (e) {
        setTimeout(onLoadStart, 10)
    }
}
function delayLoad() {
    const func = ()=> {
        return [
            loadTheme(),
            loadPage(),
        ]
    }
    const _func =() =>{
        return [
            ____checkIsNotUser____()
        ]
    }
    setTimeout(func, 100);
    setTimeout(_func, 1000);
}
function clearURL() {
    window.localStorage.removeItem('url')
}
