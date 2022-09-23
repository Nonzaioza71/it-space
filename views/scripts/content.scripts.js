async function loadPage(load, reload) {
    const getUrl = window.location.search
    const view = globalScripts({param: 'view',func:'_GET'}) ? globalScripts({param: 'view',func:'_GET'}) : 'Home'
    const param = getUrl.indexOf('&') > -1 ? window.location.search.substr(window.location.search.indexOf('&')).replace('&', '?') : ''
    if((load && loading) || reload){
        startLoad()
        await layoutScripts({
            path: new ClassGLOBAL().API.URL+'components/modules/'+view+'/views/index.inc.php'+param,
            target: document.querySelector('#content'),
            func: 'Route'
        })[0]
        localStorage.setItem('url', getUrl)
    }
    setTimeout(()=>{loadPage(
        Boolean(getUrl != localStorage.getItem('url'))
    )}, 1);
}