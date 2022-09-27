<script>
if (Boolean(window['addProductsToStateModal'])) {
    var addProductsToStateModal = undefined
}
addProductsToStateModal = (alert) =>{
    let openAgain = false
    let msg = ""

    function _onSelectedOption() {
        const label = document.querySelector('#product_type')
        if (!label.classList.contains('selection')) {
            label.addEventListener('change', _onSelectedOption)
        }
        document.querySelectorAll('[name="labelOnChange"]').forEach(ele=>{
            ele.innerHTML = label.value
        })
    }

    function render(){
        Swal.fire({
            title: /*html*/`
                <div class="w-100 text-start border-bottom border-dark is-theme pb-2">
                    <strong>
                        เพิ่มสินค้า/วัสดุ
                    </strong>
                </div>
            `,
            html: /*html*/`
                <div style="overflow:hidden;">
                    <div class="w-100">
                        <div class="w-100 d-flex justify-content-center">
                            <div class="d-grid gap-3">
                                <img-pre src="https://api.iconify.design/akar-icons/shipping-box-01.svg" height=200 width=200 style="justify-self:center;" target="#product_image"></img-pre>
                                <label for="product_image" class="fs-6">ภาพสินค้า/วัสดุ</label>
                                <input type="file" name="product_data" id="product_image" class="form-control" />
                            </div>
                        </div>
                        <hr>
                        <div class="w-100 text-start">
                            <strong>
                                ข้อมูลสินค้า/วัสดุ
                            </strong>
                        </div>
                        <div class="mt-5 col-md-12 row ps-3 pe-3">
                            <div class="col-md-6 row gap-2">
                                <div class="col-md-6 row mt-2">
                                    <label for="product_type">ชนิด/คลัง</label>
                                    <select type="text" id="product_type" name="product_data" class="form-control text-center">
                                        <option>สินค้า</option>
                                        <option>วัสดุ</option>
                                    </select>
                                </div>    
                                <div class="col-md-6 row mt-2 pe-0">
                                    <label for="product_code">
                                        รหัส
                                        <span name="labelOnChange">
                                            สินค้า
                                        </span>
                                    </label>
                                    <input type="text" id="product_code" name="product_data" class="form-control" readonly />
                                </div>
                                <div class="col-md-12 row mt-2">
                                    <label for="product_name">
                                        ชื่อ
                                        <span name="labelOnChange">
                                            สินค้า
                                        </span>
                                    </label>
                                    <input type="text" id="product_name" name="product_data" class="form-control" />
                                </div>
                                <div class="col-md-12 row mt-2">
                                    <label for="product_detail">
                                        รายละเอียด
                                        <span name="labelOnChange">
                                            สินค้า
                                        </span>
                                    </label>
                                    <textarea id="product_detail" name="product_data" class="form-control" >
                                    </textarea>
                                </div>
                            </div>
                            <div class="col-md-6 row gap-2">
                                <div class="col-md-6 row mt-2">
                                    <label for="product_price">
                                        ราคา
                                        <span name="labelOnChange">
                                            สินค้า
                                        </span>
                                    </label>
                                    <input type="number" id="product_price" name="product_data" class="form-control" />
                                </div>    
                                <div class="col-md-6 row mt-2 pe-0">
                                    <label for="product_count">
                                        จำนวณ
                                        <span name="labelOnChange">
                                            สินค้า
                                        </span>
                                    </label>
                                    <input type="number" id="product_count" name="product_data" class="form-control" value="1" />
                                </div>
                                <div class="col-md-3 row mt-2 pe-0">
                                    <label for="product_vat_type">
                                        ภาษี
                                        <span name="labelOnChange">
                                            สินค้า
                                        </span>
                                    </label>
                                    <select type="text" id="product_vat_type" name="product_data" class="form-control text-center">
                                        <option>รวมค่าภาษี</option>
                                        <option>แยกค่าภาษี</option>
                                    </select>
                                </div>
                                <div class="col-md-3 row mt-2 ms-1 pe-0">
                                    <label for="product_vat_price">
                                        ค่าภาษี
                                        <span name="labelOnChange">
                                            สินค้า
                                        </span>
                                    </label>
                                    <input type="text" id="product_vat_price" name="product_data" class="form-control" readonly />
                                </div>
                                <div class="col-md-6 row mt-2 ms-1">
                                    <label for="product_price">
                                        รวมทั้งสิ้น
                                    </label>
                                    <input type="text" id="product_price" name="product_data" class="form-control" readonly />
                                </div>    
                                <div class="col-md-12 row mt-2">
                                    <label for="product_props">
                                        คุณสมบัติ
                                        <span name="labelOnChange">
                                            สินค้า
                                        </span>
                                    </label>
                                    <textarea id="product_props" name="product_data" class="form-control" >
                                    </textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    ${
                        alert ? 
                            '<hr/><span class="text-danger">'+alert+'</span>' 
                        : 
                            ""
                    }
                </div>
            `,
            customClass: {
                popup: 'bg-whitesmoke text-dark border is-theme w-100',
                image: 'rounded',
                title : 'pt-4 ps-4'
            },
            showCancelButton: true,
            focusConfirm: false,
            confirmButtonText: 'เพิ่ม',
            cancelButtonText: 'ปิด',
        })
        .then(async (res)=>{
            if (res.isConfirmed) {
                // new Loading(true)
                await fetch('./controllers/checkLogin.php',{
                    method : 'POST',
                    body : JSON.stringify(useState.use('productsState'))
                })
                .then(res=>res.json())
                .then(data=>{
                    // console.log(data.input)                    
                })
            }
            if (openAgain) {
                addProductsToStateModal(msg)
            } else {
                document.querySelector('#modalScript').innerHTML = ''
                useState.remove('productsState')
                addProductsToStateModal = undefined
            }
        })
        document.querySelector('#swal2-title').querySelectorAll('br').forEach(br=>{
            br.remove()
        })

        _onSelectedOption()
    }
    return render()
}
addProductsToStateModal()

</script>