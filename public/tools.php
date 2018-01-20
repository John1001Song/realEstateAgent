<?php include 'shared/header.php';?>
<script src="https://unpkg.com/vue/dist/vue.js"></script>
<script src="https://cdn.rawgit.com/chrisvfritz/5f0a639590d6e648933416f90ba7ae4e/raw/974aa47f8f9c5361c5233bd56be37db8ed765a09/currency-validator.js"></script>

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
                    <currency-input 
                        label="房产价格" 
                        v-model="price"
                    ></currency-input>
                      <currency-input 
                        label="首付" 
                        v-model="downPayment"
                      ></currency-input>
                      <currency-input 
                        label="贷款年限" 
                        v-model="term"
                      ></currency-input>
                      <currency-input 
                        label="贷款利率" 
                        v-model="interestRate"
                      ></currency-input>
  
                        <p>月还贷: ${{ total }}</p>
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
Vue.component('currency-input', {
  template: '\
    <div>\
      <label v-if="label">{{ label }}</label>\
      $\
      <input\
        ref="input"\
        v-bind:value="value"\
        v-on:input="updateValue($event.target.value)"\
        v-on:focus="selectAll"\
        v-on:blur="formatValue"\
      >\
    </div>\
  ',
  props: {
    value: {
      type: Number,
      default: 0
    },
    label: {
      type: String,
      default: ''
    }
  },
  mounted: function () {
    this.formatValue()
  },
  methods: {
    updateValue: function (value) {
      var result = currencyValidator.parse(value, this.value)
      if (result.warning) {
        this.$refs.input.value = result.value
      }
      this.$emit('input', result.value)
    },
    formatValue: function () {
      this.$refs.input.value = currencyValidator.format(this.value)
    },
    selectAll: function (event) {
      // Workaround for Safari bug
      // http://stackoverflow.com/questions/1269722/selecting-text-on-focus-using-jquery-not-working-in-safari-and-chrome
      setTimeout(function () {
      	event.target.select()
      }, 0)
    }
  }
})

new Vue({
  el: '#app',
  data: {
    price: 0,
    downPayment: 0,
    term: 0,
    interestRate: 0
  },
  computed: {
    total: function () {
      return (
        (this.price - this.downPayment) / (  
        ((1 + this.interestRate)^(this.term*12) - 1) / (this.interestRate * (1 + this.interestRate) ^ (this.term*12))
      )
      )
    }
  }
})
</script>