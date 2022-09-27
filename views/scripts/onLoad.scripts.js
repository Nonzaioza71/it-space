window.addEventListener('load', onLoadStart)
function onLoadStart() {
    try {
        clearURL()
        loadLayout()
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
        try {
            ____checkIsNotUser____()
            new SplashScreen().close()
        } catch (e) {
            setTimeout(_func, 10);
        }
    }
    setTimeout(func, 100);
    setTimeout(_func, 1000);
}
function clearURL() {
    window.localStorage.removeItem('url')
}