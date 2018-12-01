<template>
    <div>
        <p class="error">{{ error }}</p>

        <!--<p class="decode-result">Last result: <b>{{ result }}</b></p>-->

        <qrcode-stream @decode="onDecode" @init="onInit" style="border-radius: 10px"/>

        <nav>
            <div style="display:flex;vertical-align: middle;align-content: center;align-items: center; margin: 30px 300px;margin-left: 415px;">
                <span style="width:100px;font-size:25px;color:#005792">code :</span>
                <input type="text" id="codeqr" class="form-control shadow decode-result" style="height:45px;border-radius: 10px;width: 500px" placeholder="พิมพ์ code ช่องนี้ แล้วกด enter เพื่อยืนยันครับ">
                <button id="theForm" class="btn btn-primary" style="height: 45px;width: 200px;margin-left: 10px" @click="submit()">Submit</button>
            </div>
        </nav>
    </div>
</template>

<script>
    import $ from "jquery";
    import swal from 'sweetalert2';

    export default {
        name: "ShopScanComponent",
        data () {
            return {
                result: '',
                error: ''
            }
        },
        methods: {
            submit(){
                // console.log($("#codeqr").val());
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                axios.post('/shop/addShopQr', {
                    shop: $("#codeqr").val(),
                    user: 1,
                })
                    .then(function (response) {
                        // console.log(response.data);
                        if(response.data == 'success'){
                            swal({
                                type: 'success',
                                title: 'เพิ่มข้อมูลเรียบร้อย',
                                text: 'คุณมีร้านนี้ในกระเป๋าสะสมเรียบร้อย ( คุณได้รับ 1 สแตมป์ และ 5 point )',
                                footer: '<a href>หากมีปัญหาในการเพิ่มข้อมูลร้าน โปรดติดต่อสอบถาม</a>'
                            });
                            window.onload = function() {
                                if(!window.location.hash) {
                                    window.location = window.location + '#loaded';
                                    window.location.reload();
                                }
                            }
                        }
                        else if(response.data == 'success0'){
                            swal({
                                type: 'success',
                                title: 'เพิ่มข้อมูลเรียบร้อย',
                                text: 'คุณมีร้านใหม่นี้ ในกระเป๋าสะสมเรียบร้อย',
                                footer: '<a href>หากมีปัญหาในการเพิ่มข้อมูลร้าน โปรดติดต่อสอบถาม</a>'
                            });
                            window.onload = function() {
                                if(!window.location.hash) {
                                    window.location = window.location + '#loaded';
                                    window.location.reload();
                                }
                            }
                        }
                        else if(response.data == 'empty'){
                            swal({
                                type: 'error',
                                title: 'ไม่พบข้ออมูล',
                                text: 'กรุณาตรวจสอบข้อมูลใหม่ครับ',
                                footer: '<a href>หากมีปัญหาในการเพิ่มข้อมูลร้าน โปรดติดต่อสอบถาม</a>'
                            });
                            window.onload = function() {
                                if(!window.location.hash) {
                                    window.location = window.location + '#loaded';
                                    window.location.reload();
                                }
                            }
                        }
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            onDecode (result) {
                this.result = result;
                $("#codeqr").val(result);
                this.submit();
                // document.getElementById('theForm').submit();
            },
            async onInit (promise) {
                try {
                    await promise
                } catch (error) {
                    if (error.name === 'NotAllowedError') {
                        this.error = "ERROR: you need to grant camera access permisson"
                    } else if (error.name === 'NotFoundError') {
                        this.error = "ERROR: no camera on this device"
                    } else if (error.name === 'NotSupportedError') {
                        this.error = "ERROR: secure context required (HTTPS, localhost)"
                    } else if (error.name === 'NotReadableError') {
                        this.error = "ERROR: is the camera already in use?"
                    } else if (error.name === 'OverconstrainedError') {
                        this.error = "ERROR: installed cameras are not suitable"
                    } else if (error.name === 'StreamApiNotSupportedError') {
                        this.error = "ERROR: Stream API is not supported in this browser"
                    }
                }
            }
        }
    }
</script>

<style scoped>
    .error {
        font-weight: bold;
        color: red;
    }

</style>