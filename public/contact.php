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
            <el-form ref="form" :model="form" label-width="120px">
                <el-form-item label="姓名">
                    <el-input v-model="form.name"></el-input>
                </el-form-item>
                <el-form-item label="邮箱">
                    <el-input v-model="form.email"></el-input>
                </el-form-item>
                <el-form-item label="手机号码">
                    <el-input v-model="form.cellphone"></el-input>
                </el-form-item>
                <el-form-item label="您的留言">
                    <el-input type="textarea" v-model="form.message"></el-input>
                </el-form-item>
                <el-form-item>
                    <el-button type="primary">Send</el-button>
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
                email:'',
                cellphone:'',
                message:''
            }
        }
    })
</script>
