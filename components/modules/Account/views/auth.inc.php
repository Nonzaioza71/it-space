<div 
    class="btn btn-primary"
    onclick="
        layoutScripts({
            path: new ClassGLOBAL().API.URL+'/components/modals/Auth/login-modal.inc.php',
            target: document.querySelector('#modalScript'),
            loadingScreen: {
                start : ()=>{showLoading = true},
                end : ()=>showLoading = false,
            },
            func: 'Route'
        })[0]
    "
>
    เข้าสู่ระบบ
</div>
<script>
    layoutScripts({
        path: new ClassGLOBAL().API.URL+'/components/modals/Auth/login-modal.inc.php',
        target: document.querySelector('#modalScript'),
        loadingScreen: {
                start : ()=>{showLoading = true},
                end : ()=>showLoading = false,
            },
        func: 'Route'
    })[0]
</script>