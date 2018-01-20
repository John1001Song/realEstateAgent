<?php include 'shared/header.php';?>

  <div class="content">
    <div class="content_resize">
      <div class="mainbar">
        <div class="article">
          <h2><span></span>买卖小助手</h2>
          <div class="clr"></div>
            <h2>贷款计算器</h2>
            <p><span><strong>贷款计算器</strong></span></p>
            <div class="article" id="calculator">
                <div class="clr"></div>
                
                <el-form ref="form" :model="form" label-width="120px" v-loading="sendLoading" :rules="rules">
                    <el-form-item label="房产价格" prop="price">
                        <el-input v-model="form.price"></el-input>
                    </el-form-item>
                    <el-form-item label="首付" prop="downPayment">
                        <el-input v-model="form.downPayment"></el-input>
                    </el-form-item>
                    <el-form-item label="贷款年限" prop="term">
                        <el-input v-model="form.term"></el-input>
                    </el-form-item>
                    <el-form-item label="贷款利率" prop="interestRate">
                        <el-input v-model="form.interestRate"></el-input>
                    </el-form-item>
                    <el-form-item>
                        <el-button type="primary" @click="calculate()">Calculate</el-button>
                    </el-form-item>
                </el-form>
                
                <div id="app">
                    <input label="房产价格" v-model="price" placeholder="房产价格">
                    <p>您的房产价格$：{{price}}</p>
                      <input label="首付" v-model="downPayment" placeholder="首付">
                    <p>您的首付$：{{downPayment}}</p>
                      <input label="贷款年限" v-model="term" placeholder="贷款年限">
                    <p>您的贷款年限：{{term}} 年</p>
                      <input label="贷款利率" v-model="interestRate" placeholder="贷款利率">
                    <p>您的预计贷款年利率：{{interestRate}}%</p>
  
                    <p>月还贷$: {{ total }}</p>
                </div>
                
            </div>
        </div>
      </div>
        <?php include 'shared/sidebar.php';?>
      <div class="clr"></div>
    </div>
  </div>
<?php include 'shared/footer.php';?>

<script>

new Vue({
  el: '#app',
  data: {
    price: 0,
    downPayment: 0,
    term: 0,
    interestRate: 0,
  },
  computed: {
    total: function () {
        let a = this.price - this.downPayment;
        let n = this.term * 12;
        let i = (this.interestRate / 100) / 12;
        let d = (((1 + i)**n) - 1) / (i * (1 + i)**n)
      return (a/d).toFixed(2);
    }
  }
})
</script>