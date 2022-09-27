<div class="animate__animated animate__fadeIn w-100">
    <div class="col-md-12 card bg-dark is-theme">
        <div class="card-header p-3 border-secondary is-theme d-flex justify-content-between">
            <h3>เพิ่มใบขอซื้อ | Add Purchase Request</h3>
            <div class="btn btn-outline-secondary text-dark is-theme" onclick="useState.remove('qutationInsert'); window.history.back()">
                <span class="iconify" data-icon="bx:arrow-to-left"></span>
                ย้อนกลับ
            </div>
        </div>
        <div class="card-body col-md-12">
            <form 
                id="formInsert" 
                action="" 
                method="post" 
                enctype="multipart/form-data" 
                onsubmit="
                    useState.use('qutationInsert')(this); 
                    return false
                    " 
                class="col-md-12"
            >
                <div class="col-md-12 row justify-content-center m-0">
                    <div class="col-md-6 row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="quotation_alert_date" class="fw-bold ps-1">*วันที่แจ้งเตือน : </label>
                                <input type="date" name="quotation_alert_date" id="quotation_alert_date" class="form-control" readonly value="Q45328009">
                            </div>
                        </div>
                        <div class="col-md-12 mt-5">
                            <div class="form-group">
                                <label for="quotation_remark" class="fw-bold ps-1">หมายเหตุ : </label>
                                <textarea type="text" name="quotation_remark" id="quotation_remark" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="quotation_code" class="fw-bold ps-1">*เลขที่ใบขอซื้อ : </label>
                                <input type="text" name="quotation_code" id="quotation_code" class="form-control" readonly value="Q45328009">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="quotation_date" class="fw-bold ps-1">*วันที่ร้องขอ : </label>
                                <input type="date" name="quotation_date" id="quotation_date" class="form-control" value="">
                            </div>
                        </div>
                        <div class="col-md-12 mt-4">
                            <div class="form-group">
                                <label for="quotation_addby" class="fw-bold ps-1">*ผู้ร้องขอ : </label>
                                <input type="text" name="quotation_addby" id="quotation_addby" class="form-control" value="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 justify-content-center m-0 mt-5">
                    <table class="is-theme table table-dark table-striped table-hover">
                        <thead>
                            <th>
                                No.
                            </th>
                            <th>
                                รหัสสินค้า
                            </th>
                            <th>
                                รายการสินค้า
                            </th>
                            <th>
                                จำนวณ
                            </th>
                            <th>
                                ชนิด
                            </th>
                            <th>
                                ราคา
                            </th>
                            <th>
                                #
                            </th>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="7" class="text-center">
                                    <div 
                                        class="btn btn-primary"
                                        onclick="
                                            layoutScripts({
                                                path: new ClassGLOBAL().API.URL+'/components/modals/Product/add-product-to-state.inc.php',
                                                target: document.querySelector('#modalScript'),
                                                func: 'Route'
                                            })[0]
                                        "
                                    >
                                        เพิ่ม สินค้า/วัสดุ
                                    </div>
                                    <div 
                                        class="btn btn-info text-light"
                                        onclick="
                                            layoutScripts({
                                                path: new ClassGLOBAL().API.URL+'/components/modals/Product/add-product-to-state.inc.php',
                                                target: document.querySelector('#modalScript'),
                                                func: 'Route'
                                            })[0]
                                        "
                                    >
                                        เลือก สินค้า/วัสดุ
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
useState.setState({
    qutationInsert : (ele)=>{
        const quotation_code = ele.elements['quotation_code'].value
    }
})
</script>