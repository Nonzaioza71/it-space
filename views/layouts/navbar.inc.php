<nav class="navbar bg-whitesmoke" style="visibility: hidden;"  id="myNavbarHitBox">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="https://getbootstrap.com/docs/5.2/assets/brand/bootstrap-logo.svg" alt="Bootstrap" width="30" height="24">
        </a>
    </div>
</nav>

<nav class="navbar bg-whitesmoke text-dark fixed-top is-theme animate__animated" id="myNavbar">
    <div class="container d-flex justify-content-between">
        <div class="justify-content-start d-flex gap-3">
            <div
                is="true"
                class="
                    is-theme
                    btn
                    btn-light
                    border
                    border-dark
                    bg-whitesmoke
                    text-dark
                "
                onclick="navControllers({ele:this, func:'sidebarToggle'})"
            >
                <span class="iconify" data-icon="ic:round-table-rows" style="width: 3rem;"></span>
            </div>
            <a class="navbar-brand" href="./" style="visibility:hidden;">
                <img src="https://getbootstrap.com/docs/5.2/assets/brand/bootstrap-logo.svg" alt="Bootstrap" width="30" height="24">
            </a>
        </div>
        <div 
            class="
                d-flex
                justify-content-end
                gap-3
            "
        >   
            <div 
                id="navAuth"
                class="
                    d-flex
                    justify-content-center
                    align-items-center
                "
            >
                <span 
                    id="navbarAuth"
                    class="animate__animated animate__fadeInRight"
                    onclick="
                        layoutScripts({
                            path: './components/modals/Auth/login-modal.inc.php',
                            target: document.querySelector('#modalScript'),
                            func: 'Route'
                        })[0]
                    "
                    style="cursor:pointer;"
                >
                    เข้าสู่ระบบ/ลงทะเบียน
                </span>
            </div>
            <div
                is="true"
                class="
                    is-theme
                    btn 
                    btn-light
                    border
                    border-dark
                    bg-whitesmoke
                    text-dark
                "
                onclick="navControllers({ele:this, func:'themeToggle'})"
            >
                <span class="iconify" data-icon="fluent:dark-theme-20-filled"></span>
            </div>
        </div>
    </div>
</nav>
<script>
    loopCheck()

    async function checkLoginNav(Alert = true) {
        const _html = document.querySelector('#navAuth')
        fetch('./controllers/checkLogin.php')
        .then(res=>res.json())
        .then(data=>{
            const user = typeof useState.use('user') === 'object' ? useState.use('user') : {}
            if ((data.res) && !(Object.keys(user).length)) {
                _html.innerHTML = /*html*/`
                    <span 
                        id="navbarAccount"
                        class="animate__animated animate__fadeInRight"
                        onClick="document.querySelector('#sidebarAccount').click()"
                        style="cursor:pointer;"
                    >
                        ${data.res.user_name + " " + data.res.user_lastname}
                    </span>
                `
                useState.setState({
                    user: data.res
                })
            }
            else if(!(data.res) && Object.keys(user).length){
                if (Boolean(Alert)) {
                    Swal.fire(
                        'แจ้งเตือน',
                        'เซสชั่นหมดอายุ',
                        'warning'
                    )
                    // layoutScripts({
                    //     link : {
                    //         url : './'
                    //     },
                    //     func : 'Link'
                    // })
                }
                _htmlNoUser()
            }
            if ((data.res != user) && (data.res)) {
                useState.setState({
                    user: data.res
                })
            }
        })
    }
    function loopCheck() {
        checkLoginNav(false)
        setTimeout(loopCheck, 5000)
    }
    async function _htmlNoUser() {
        await fetch('./controllers/logoutUser.php')
        useState.remove('user')
        const _html = document.querySelector('#navAuth')
        _html.innerHTML = /*html*/`
            <span 
                id="navbarAuth"
                class="animate__animated animate__fadeInRight"
                onclick="
                    layoutScripts({
                        path: './components/modals/Auth/login-modal.inc.php',
                        target: document.querySelector('#modalScript'),
                        func: 'Route'
                    })[0]
                "
                style="cursor:pointer;"
            >
                เข้าสู่ระบบ/ลงทะเบียน
            </span>
        `
        loadPage(true, true)
    }
</script>