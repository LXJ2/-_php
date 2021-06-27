<template>
  <div>
    <el-form
      :model="ruleForm"
      status-icon
      :rules="rules"
      ref="ruleForm"
      label-width="100px"
      class="demo-ruleForm"
    >
      <el-form-item label="身份">
        <el-select v-model="form.position" placeholder="请选择身份">
          <el-option label="作者" value= 1></el-option>
          <el-option label="审稿人" value= 2></el-option>
          <el-option label="管理员" value= 3></el-option>
        </el-select>
      </el-form-item>
      <el-form-item label="电话" prop="phone">
        <el-input v-model="ruleForm.phone" autocomplete="off"></el-input>
      </el-form-item>
      <el-form-item label="密码" prop="password">
        <el-input
          type="password"
          v-model="ruleForm.password"
          autocomplete="off"
          @change="submitForm('ruleForm')"
        ></el-input>
      </el-form-item>

      <el-form-item>
        <el-button
          type="primary"
          :loading="!flag"
          @click="submitForm('ruleForm')"
          >提交</el-button
        >
      </el-form-item>
    </el-form>
  </div>
</template>
<script>
// @ is an alias to /src
import { login } from "../api/api";
import store from '../store';
export default {
  data() {
    var validatePass = (rule, value, callback) => {
      if (value === "") {
        callback(new Error("请输入密码"));
      } else {
        if (this.ruleForm.checkPass !== "") {
          this.$refs.ruleForm.validateField("password");
        }
        callback();
      }
    };
    var validatePass2 = (rule, value, callback) => {
      if (value === "") {
        callback(new Error("请再次输入密码"));
      } else if (value !== this.ruleForm.pass) {
        callback(new Error("两次输入密码不一致!"));
      } else {
        callback();
      }
    };

    return {
      ruleForm: {
        phone: "",
        password: "",
      },
      rules: {
        pass: [{ validator: validatePass, trigger: "blur" }],
        checkPass: [{ validator: validatePass2, trigger: "blur" }],
      },
      form:{
        position: "",
      },
      flag: true,
    };
  },
  methods: {
    submitForm(formName) {
      console.log(666);
      if (!this.flag) return;
      this.flag = false;
      this.$refs[formName].validate((valid) => {
        if (valid) {
          let obj = {};
          obj.phone = this.ruleForm.phone;
          obj.password = this.ruleForm.password;
          obj.position = this.form.position;
          login(obj).then((data) => {
            console.log(data);
             store.commit('setUserInfo',data.data)
             store.commit('setUid', this.form.position);
             
            localStorage.setItem("srms_project_token", data.data.creat_time);
            if (this.$route.query.from) {
              console.log("this.$route.query.from", this.$route.query.from);
              this.$router.replace(this.$route.query.from);
            } else {
              this.$router.replace("/");
            }
            this.flag = true;
            // window.location.href='';
          });
        } else {
          console.log("error submit!!");
          return false;
        }
      });
    },
    resetForm(formName) {
      this.$refs[formName].resetFields();
    },
  },
};
</script>
<style lang="less">
.el-form demo-ruleForm{
    width: 420px;
    height: 500px;
    background-color: #fff;
    border-radius: 4px;
    box-shadow: 0 21px 41px 0 rgb(0 0 0 / 20%);
}
</style>