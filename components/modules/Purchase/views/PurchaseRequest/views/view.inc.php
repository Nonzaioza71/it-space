<div class="col-md-12 shadow animate__animated animate__fadeIn">
    <div class="card bg-dark text-light is-theme col-md-12">
        <div class="card-header p-3 border-secondary is-theme d-flex justify-content-between">
            <h3>รายการใบขอซื้อ | Purchase Request</h3>
            <To url="?view=Purchase&select=PR&option=insert" class="btn btn-success">
                <span 
                    class="iconify fw-bold" 
                    data-icon="heroicons:document-plus-20-solid"
                    style="vertical-align: middle;"
                >
                </span>
                เพิ่มใบขอซื้อ
            </To>
        </div>
        <div class="card-body">
            <table border="0" cellspacing="5" cellpadding="5" class="mb-3">
                    <tbody><tr>
                        <td>เลือกวันที่:</td>
                        <td><input type="date" id="min" name="min" class="date-selector"></td>
                        <td> ถึง </td>
                        <td><input type="date" id="max" name="max" class="date-selector"></td>
                        <td>
                            <button-selection class="gap-1 button-group" classActive="p-2 border border-3 text-light fw-bold bg-transparent is-theme" default="0">
                                <button type="button" value="waiting" class="btn btn-warning border-warning text-light is-theme">กำลังรอ</button>
                                <button type="button" value="approve" class="btn btn-success border-success text-light is-theme">อนุมัติ</button>
                                <button type="button" value="notApprove" class="btn btn-danger border-danger text-light is-theme">ไม่อนุมัติ</button>
                                <button type="button" value="cancel" class="btn btn-secondary border-secondary text-light is-theme">ยกเลิก</button>
                            </button-selection>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div id="list"></div>
        </div>
    </div>
</div>
<script>
    Date.prototype.toDateInputValue = (function() {
        var local = new Date(this)
        local.setMinutes(this.getMinutes() - this.getTimezoneOffset())
        return local.toJSON().slice(0,10)
    })
    
    $('#min').val(new Date().toDateInputValue())
    $('#max').val(new Date().toDateInputValue())
    $(document).ready( function () {
        function __renderTable__() {
            const getUrl = window.location.search
            const param = getUrl.indexOf('&') > -1 ? window.location.search.substr(window.location.search.indexOf('&')).replace('&', '?') : ''
    
            document.querySelector('#Table_ID')
            ? setTable()
            : layoutScripts({
                path: new ClassGLOBAL().API.URL+'components/modules/Purchase/views/PurchaseRequest/views/list.inc.php'+param,
                target: document.querySelector('#list'),
                func: 'Route'
            })[0]
            
            function setTable() {
                if(!document.querySelector('#Table_ID_previous')){
                    var [minDate, maxDate] = document.querySelectorAll('.date-selector')
                    var status = ""

                    // Refilter the table
                    $('#min, #max').on('change', function () {
                        drawTable()
                    })
                    $('.btn-option').on('click', function (ele) {
                        status = ele.target.getAttribute('value')
                        drawTable()
                    })
                    function drawTable(){
                        const goToAPI = new ClassGLOBAL().API.URL+'components/modules/Purchase/views/PurchaseRequest/views/list.inc.php'+param+`&date_start=${minDate.value}&date_end=${maxDate.value}&status=${status}`
                        layoutScripts({
                            path: goToAPI,
                            target: document.querySelector('#list'),
                            func: 'Route'
                        })[0]
                    }
                }else{
                    
                }
            }
            function setThemeTable() {
                if (document.querySelector('#Table_ID_previous')) {

                    const isThemeText = ['is-theme', 'text-light']
                    const isThemeBorder = ['is-theme', 'border', 'border-light', 'rounded']
                    const isThemeButton = ['is-theme', 'btn', 'btn-light']
                    const isThemeButtonOutline = ['is-theme', 'btn', 'btn-outline-light']
        
                    const Table_ID_info = ['is-theme', 'text-light']
        
                    const Table_ID_filter = ['is-theme', 'text-light', 'd-flex', 'gap-3', 'mb-3'] 
                    const Table_ID_filter_Search = ['form-control', 'form-control-sm', 'd-flex'] 
                    
                    const Table_ID_length = ['is-theme', 'text-light', 'd-flex', 'gap-3', 'mb-3'] 
                    const Table_ID_length_Select = ['form-select', 'form-select-sm', 'd-flex'] 
        
                    const Table_ID_next = ['form-select', 'form-select-sm', 'd-flex'] 
                    
                    const Table_ID_Controllers = {
                        pageSelector : 
                            Object.keys(document.querySelector("#Table_ID_paginate > span").children).map((key)=>{
                                return document.querySelector("#Table_ID_paginate > span").children[key]
                            })
        
                    }
                    
                    document.querySelectorAll('.paginate_button').forEach(ele=>{ele.classList.remove('paginate_button')})
                    Table_ID_Controllers.pageSelector.forEach(ele=>{
                        isThemeButtonOutline.forEach(className=>{
                            ele.classList.add(className)
                        })
                    })
        
                    isThemeText.forEach(className=>{
                        $('#Table_ID_previous').addClass(className)
                    })
                    isThemeBorder.forEach(className=>{
                        $('#Table_ID_previous').addClass(className)
                        $("#Table_ID_next").addClass(className)
                    })
                    isThemeButton.forEach(className=>{
                        $('#Table_ID_previous').addClass(className)
                        $("#Table_ID_next").addClass(className)
                    })
                    isThemeButtonOutline.forEach(className=>{
                        
                    })
                    Table_ID_info.forEach(className=>{
                        $('#Table_ID_info').addClass(className)
                    })
                    Table_ID_filter.forEach(className=>{
                        $("#Table_ID_length > label").addClass(className)
                    })
                    Table_ID_length_Select.forEach(className=>{
                        $("#Table_ID_length > label > select").addClass(className)
                    })
                    Table_ID_filter.forEach(className=>{
                        $("#Table_ID_filter > label").addClass(className)
                    })
                    Table_ID_filter_Search.forEach(className=>{
                        $("#Table_ID_filter > label > input[type=search]").addClass(className)
                    })
                }
                setTimeout(setThemeTable, 1)
            }
            setThemeTable()
            setTable()
        }
        __renderTable__()
    } )
</script>
