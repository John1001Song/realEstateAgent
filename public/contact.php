<?php include 'shared/header.php';?>
  <div class="content">
    <div class="content_resize">
      <div class="mainbar">
        <div class="article">
          <h2><span>Contact</span></h2>
          <div class="clr"></div>
          <p>联系我们</p>
        </div>
        <div class="article" id="contactApp">
          <h2><span>Send us</span> mail</h2>
          <div class="clr"></div>
            <el-form ref="form" :model="form" label-width="120px" v-loading="sendLoading" :rules="rules">
                <el-form-item label="姓名" prop="name">
                    <el-input v-model="form.name"></el-input>
                </el-form-item>
                <el-form-item label="邮箱" prop="email">
                    <el-input v-model="form.email"></el-input>
                </el-form-item>
                <el-form-item label="手机号码" prop="cellphone">
                    <el-input v-model="form.cellphone"></el-input>
                </el-form-item>
                <el-form-item label="您的留言" prop="message">
                    <el-input type="textarea" v-model="form.message"></el-input>
                </el-form-item>
                <el-form-item>
                    <el-button type="primary" @click="sendEmail()">Send</el-button>
                </el-form-item>
            </el-form>
        </div>
    </div>
        <?php include 'shared/sidebar.php';?>
        <div class="clr"></div>
  </div>
  </div>
<?php include 'shared/footer.php';?>
<script>
    var contactApp = new Vue({
        el: '#contactApp',
        data: {
            form: {
                name: '',
                email: '',
                cellphone: '',
                message: ''
            },
            rules: {
                name: [{required: true, message: 'Please enter your name'}],
                email: [{
                    required: true, message: 'Please enter email'}, {
                    type: 'email',
                    message: 'Not a valid email format'
                }],
                cellphone: [{
                    pattern: /\d{10,12}/,
                    message: 'Please enter 10-12 digits'
                }],
                message: [{required: true, message: 'Please write your message'}]
            },
            sendLoading: false
        },
        methods: {
            sendEmail(){
                this.$refs['form'].validate((valid)=>{
                    if(valid){
                        this.sendLoading=true;
                        $.post('/send-email', this.form)
                            .done(()=>{
                                setTimeout(()=>{
                                    this.sendLoading=false;
                                    this.$notify({
                                        title: 'Thank you '+this.form.name,
                                        message: 'We will contact you shortly',
                                        type: 'success'
                                    });
                                    this.$refs['form'].resetFields();
                                }, 2000);
                            })
                            .fail(()=>{
                                this.sendLoading=false;
                                this.$notify({
                                    title: 'Ops... we are sorry',
                                    message: 'Something went wrong while processing your request.',
                                    type: 'error'
                                });
                            });
                    }else{
                        return false;
                    }
                });
            }
        }
    })
</script>
