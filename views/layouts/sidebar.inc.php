<div 
    class="
        mySidebar
        is-theme
        position-fixed
        d-flex 
        flex-column 
        flex-shrink-0
        p-3 
        bg-whitesmoke 
        text-dark 
        h-100
        animate__animated
        animate__faster
        animate__slideOutLeft
        pb-5
    " 
    style="
        width: 280px;
        z-index: 1060;
        overflow-y:auto;
    ">
    <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-decoration-none justify-content-center w-100">
        <img src="./templates/images/downloads/icon-bg.png" class="rounded" alt="Bootstrap" width="80" height="80">
    </a>
    <hr>
    <list class="list-group mb-5" param="view" def="param:'view'; value:'Home'">
        <ul class="nav nav-pills flex-column mb-auto">
            <p class="text-center fs-3">
                เมนูหลัก
            </p>
            <li class="nav-item text-center">
                <to url="./" class="is-theme bg-dark text-light border border-dark list-group-item list-group-item-action w-100" value="" id="sidebarHome">
                    หน้าร้านค้า
                </to>
            </li>
            <li class="nav-item text-center">
                <to url="?view=Promotion" class="is-theme bg-dark text-light border border-dark list-group-item list-group-item-action w-100" value="Promotion" id="sidebarPromotion">
                    โปรโมชั่น
                </to>
            </li>
            <li class="nav-item text-center">
                <to url="?view=Favorite" class="is-theme bg-dark text-light border border-dark list-group-item list-group-item-action w-100" value="Favorite" id="sidebarFavorite">
                    รายการที่ชื่นชอบ
                </to>
            </li>
            <li class="nav-item text-center">
                <to url="?view=Contact" class="is-theme bg-dark text-light border border-dark list-group-item list-group-item-action w-100" value="Contact" id="sidebarContact">
                    ติดต่อสอบถาม
                </to>
            </li>
            <li class="nav-item text-center">
                <to url="?view=Account" class="is-theme bg-dark text-light border border-dark list-group-item list-group-item-action w-100" value="Account" id="sidebarAccount">
                    บัญชี
                </to>
            </li>
            <div id="sidebarLoginedMenu"></div>
            <div id="sidebarStaffMenu"></div>
            <hr>
            <p class="text-center fs-3">
                หมวดหมู่สินค้า
            </p>
            <li class="nav-item text-center mt-2">
                <div class="is-theme bg-dark text-light border border-dark list-group-item list-group-item-action w-100" style="cursor:pointer;" data-bs-toggle="collapse" data-bs-target="#collapseComputer" aria-expanded="false" aria-controls="collapseComputer">
                    คอมพิวเตอร์
                </div>
                <div class="collapse" id="collapseComputer">
                    <div class="list-group ps-3 rounded-0">
                        <to url="?view=Category&select=Computer" class="is-theme bg-dark text-light list-group-item list-group-item-action w-100 boarder text-end" style="border-color:#8c8c8c50 !important;" value="Computer" id="sidebarComputer">
                            คอมพิวเตอร์ทำงาน
                        </to>
                        <to url="?view=Category&select=GamingComputer" class="is-theme bg-dark text-light list-group-item list-group-item-action w-100 boarder text-end" style="border-color:#8c8c8c50 !important;" value="GamingComputer" id="sidebarGamingComputer">
                            คอมพิวเตอร์เล่นเกม
                        </to>
                    </div>
                </div>
            </li>
            <li class="nav-item text-center">
                <div class="is-theme bg-dark text-light border border-dark list-group-item list-group-item-action w-100" style="cursor:pointer;" data-bs-toggle="collapse" data-bs-target="#collapseLaptop" aria-expanded="false" aria-controls="collapseLaptop">
                    แล็ปท็อป
                </div>
                <div class="collapse" id="collapseLaptop">
                    <div class="list-group ps-3 rounded-0">
                        <to url="?view=Category&select=Laptop" class="is-theme bg-dark text-light list-group-item list-group-item-action w-100 boarder text-end" style="border-color:#8c8c8c50 !important;" value="Laptop" id="sidebarLaptop">
                            แล็ปท็อปทำงาน
                        </to>
                        <to url="?view=Category&select=GamingLaptop" class="is-theme bg-dark text-light list-group-item list-group-item-action w-100 boarder text-end" style="border-color:#8c8c8c50 !important;" value="GamingLaptop" id="sidebarGamingLaptop">
                            แล็ปท็อปเล่นเกม
                        </to>
                    </div>
                </div>
            </li>
            <li class="nav-item text-center">
                <div class="is-theme bg-dark text-light border border-dark list-group-item list-group-item-action w-100" style="cursor:pointer;" data-bs-toggle="collapse" data-bs-target="#collapsePhone" aria-expanded="false" aria-controls="collapsePhone">
                    มือถือ
                </div>
                <div class="collapse" id="collapsePhone">
                    <div class="list-group ps-3 rounded-0">
                        <to url="?view=Category&select=SmartPhone" class="is-theme bg-dark text-light list-group-item list-group-item-action w-100 boarder text-end" style="border-color:#8c8c8c50 !important;" value="SmartPhone" id="sidebarSmartPhone">
                            สมาร์ทโฟน
                        </to>
                        <to url="?view=Category&select=GamingSmartPhone" class="is-theme bg-dark text-light list-group-item list-group-item-action w-100 boarder text-end" style="border-color:#8c8c8c50 !important;" value="GamingSmartPhone" id="sidebarGamingSmartPhone">
                            เกมมิ่งโฟน
                        </to>
                    </div>
                </div>
            </li>
            <li class="nav-item text-center">
                <div class="is-theme bg-dark text-light border border-dark list-group-item list-group-item-action w-100" style="cursor:pointer;" data-bs-toggle="collapse" data-bs-target="#collapseGear" aria-expanded="false" aria-controls="collapseGear">
                    อุปกรณ์ใช้งาน
                </div>
                <div class="collapse" id="collapseGear">
                    <div class="list-group ps-3 rounded-0">
                        <to url="?view=Category&select=Monitor" class="is-theme bg-dark text-light list-group-item list-group-item-action w-100 boarder text-end" style="border-color:#8c8c8c50 !important;" value="Monitor" id="sidebarMonitor">
                            หน้าจอคอมพิวเตอร์
                        </to>
                        <to url="?view=Category&select=Printer" class="is-theme bg-dark text-light list-group-item list-group-item-action w-100 boarder text-end" style="border-color:#8c8c8c50 !important;" value="Printer" id="sidebarPrinter">
                            เครื่องปริ้นท์
                        </to>
                        <to url="?view=Category&select=Mouse" class="is-theme bg-dark text-light list-group-item list-group-item-action w-100 boarder text-end" style="border-color:#8c8c8c50 !important;" value="Mouse" id="sidebarMouse">
                            เมาส์
                        </to>
                        <to url="?view=Category&select=Keyboard" class="is-theme bg-dark text-light list-group-item list-group-item-action w-100 boarder text-end" style="border-color:#8c8c8c50 !important;" value="Keyboard" id="sidebarKeyboard">
                            คีย์บอร์ด
                        </to>
                        <to url="?view=Category&select=Earphones" class="is-theme bg-dark text-light list-group-item list-group-item-action w-100 boarder text-end" style="border-color:#8c8c8c50 !important;" value="Earphones" id="sidebarEarphones">
                            หูฟัง
                        </to>
                        <to url="?view=Category&select=GamingGear" class="is-theme bg-dark text-light list-group-item list-group-item-action w-100 boarder text-end" style="border-color:#8c8c8c50 !important;" value="GamingGear" id="sidebarGamingGear">
                            เกมมิ่งเกียร์
                        </to>
                    </div>
                </div>
            </li>
            <li class="nav-item text-center">
                <div class="is-theme bg-dark text-light border border-dark list-group-item list-group-item-action w-100" style="cursor:pointer;" data-bs-toggle="collapse" data-bs-target="#collapseServer" aria-expanded="false" aria-controls="collapseServer">
                    เซิฟเวอร์
                </div>
                <div class="collapse" id="collapseServer">
                    <div class="list-group ps-3 rounded-0">
                        <to url="?view=Category&select=Server" class="is-theme bg-dark text-light list-group-item list-group-item-action w-100 boarder text-end" style="border-color:#8c8c8c50 !important;" value="Server" id="sidebarServer">
                            เครื่องเซิฟเวอร์
                        </to>
                    </div>
                </div>
            </li>
            <li class="nav-item text-center">
                <div class="is-theme bg-dark text-light border border-dark list-group-item list-group-item-action w-100" style="cursor:pointer;" data-bs-toggle="collapse" data-bs-target="#collapseHardware" aria-expanded="false" aria-controls="collapseHardware">
                    ฮาร์ดแวร์คอมพิวเตอร์
                </div>
                <div class="collapse" id="collapseHardware">
                    <div class="list-group ps-3 rounded-0">
                        <to url="?view=Category&select=CPU" class="is-theme bg-dark text-light list-group-item list-group-item-action w-100 boarder text-end" style="border-color:#8c8c8c50 !important;" value="CPU" id="sidebarCPU">
                            หน่วยประมวลผลกลาง
                        </to>
                        <to url="?view=Category&select=Mainboard" class="is-theme bg-dark text-light list-group-item list-group-item-action w-100 boarder text-end" style="border-color:#8c8c8c50 !important;" value="Mainboard" id="sidebarMainboard">
                            เมนบอร์ด
                        </to>
                        <to url="?view=Category&select=VGA" class="is-theme bg-dark text-light list-group-item list-group-item-action w-100 boarder text-end" style="border-color:#8c8c8c50 !important;" value="VGA" id="sidebarVGA">
                            การ์ดจอ
                        </to>
                        <to url="?view=Category&select=RAM" class="is-theme bg-dark text-light list-group-item list-group-item-action w-100 boarder text-end" style="border-color:#8c8c8c50 !important;" value="RAM" id="sidebarRAM">
                            หน่วยความจำ
                        </to>
                        <to url="?view=Category&select=SSD" class="is-theme bg-dark text-light list-group-item list-group-item-action w-100 boarder text-end" style="border-color:#8c8c8c50 !important;" value="SSD" id="sidebarSSD">
                            SSD
                        </to>
                        <to url="?view=Category&select=HDD" class="is-theme bg-dark text-light list-group-item list-group-item-action w-100 boarder text-end" style="border-color:#8c8c8c50 !important;" value="HDD" id="sidebarHDD">
                            HDD
                        </to>
                        <to url="?view=Category&select=PSU" class="is-theme bg-dark text-light list-group-item list-group-item-action w-100 boarder text-end" style="border-color:#8c8c8c50 !important;" value="PSU" id="sidebarPSU">
                            พาวเวอร์ซัพพลาย
                        </to>
                        <to url="?view=Category&select=Case" class="is-theme bg-dark text-light list-group-item list-group-item-action w-100 boarder text-end" style="border-color:#8c8c8c50 !important;" value="Case" id="sidebarCase">
                            เคสคอมพิวเตอร์
                        </to>
                        <to url="?view=Category&select=CPUCooler" class="is-theme bg-dark text-light list-group-item list-group-item-action w-100 boarder text-end" style="border-color:#8c8c8c50 !important;" value="CPUCooler" id="sidebarCPUCooler">
                            CPU Cooler
                        </to>
                        <to url="?view=Category&select=WaterCooler" class="is-theme bg-dark text-light list-group-item list-group-item-action w-100 boarder text-end" style="border-color:#8c8c8c50 !important;" value="WaterCooler" id="sidebarWaterCooler">
                            Water Cooler
                        </to>
                    </div>
                </div>
            </li>
        </ul>
    </list>
</div>
<script>
    async function ____checkIsNotUser____() {
        const isNotUser = typeof useState.use('user') === 'object' ? Boolean(useState.use('user')['user_role'] != "user") && Boolean(useState.use('user')['user_role']) : false
        const MenuUI = document.querySelector('#sidebarStaffMenu')
        if (isNotUser && !Boolean(MenuUI.querySelector('#'+useState.use('user')['user_role']))) {
            await fetch('./views/layouts/Menu/'+useState.use('user')['user_role']+'/views/index.inc.php')
                    .then(res=>res.text())
                    .then(page=>{
                        MenuUI.innerHTML = page;
                    })
        } else if(!isNotUser){
            MenuUI.innerHTML = ''
        }
        await ____checkIsLogined____()
        setTimeout(()=>{
            ____checkIsNotUser____()
        }, 1)
    }

    async function ____checkIsLogined____() {
        const isLogined = typeof useState.use('user') === 'object' ? Boolean(useState.use('user')['user_role']) : false
        const MenuUI = document.querySelector('#sidebarLoginedMenu')
        if (isLogined && !Boolean(MenuUI.querySelector('#sidebarLoginedMenu'))) {
            await fetch('./views/layouts/Menu/all/views/index.inc.php')
                    .then(res=>res.text())
                    .then(page=>{
                        MenuUI.innerHTML = page;
                    })
        } else if(!isLogined){
            MenuUI.innerHTML = ''
        }
    }
</script>