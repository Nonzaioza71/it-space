async function loadPage(load, reload) {
    const getUrl = window.location.search
    const view = globalScripts({param: 'view',func:'_GET'}) ? globalScripts({param: 'view',func:'_GET'}) : 'Home'
    const param = getUrl.indexOf('&') > -1 ? window.location.search.substr(window.location.search.indexOf('&')).replace('&', '?') : ''
    if(load || reload){
        showLoading = true
        // console.log('route = ', new ClassGLOBAL().API.URL+'components/modules/'+view+'/views/index.inc.php'+param)
        await layoutScripts({
            path: new ClassGLOBAL().API.URL+'components/modules/'+view+'/views/index.inc.php'+param,
            target: document.querySelector('#content'),
            loadingScreen: {
                start : ()=>{showLoading = true},
                end : ()=>showLoading = false,
            },
            func: 'Route'
        })[0]
        localStorage.setItem('url', getUrl)
    }
    setTimeout(()=>{loadPage(
        Boolean(getUrl != localStorage.getItem('url'))
    )}, 1);
}
