<div 
    class="btn btn-primary"
    onclick="
        layoutScripts({
            path: './components/modals/Auth/login-modal.inc.php',
            target: document.querySelector('#modalScript'),
            func: 'Route'
        })[0]
    "
>
    เข้าสู่ระบบ
</div>
<script>
    layoutScripts({
        path: './components/modals/Auth/login-modal.inc.php',
        target: document.querySelector('#modalScript'),
        func: 'Route'
    })[0]
</script>