<template>
 <div>   
    修改密码
<el-form :model="ruleForm" status-icon :rules="rules" ref="ruleForm" label-width="100px" class="demo-ruleForm">
    <el-form-item label="旧密码" prop="oldPassword">
    <el-input type="password" v-model.number="ruleForm.oldPassword"></el-input>
  </el-form-item>
  <el-form-item label="新密码" prop="newPassword">
    <el-input type="password" v-model="ruleForm.newPassword" autocomplete="off"></el-input>
  </el-form-item>
  <el-form-item label="确认密码" prop="newPassword2">
    <el-input type="password" v-model="ruleForm.newPassword2" autocomplete="off"></el-input>
  </el-form-item>
  <el-form-item>
    <el-button type="primary" @click="submitForm('ruleForm')">提交</el-button>
    <el-button @click="resetForm('ruleForm')">重置</el-button>
  </el-form-item>
</el-form>
</div>
</template>
<script>
  export default {
    data() {
      var checkAge = (rule, value, callback) => {
        if (!value) {
          return callback(new Error('密码不能为空'));
        }
        
      };
      var validatePass = (rule, value, callback) => {
        if (value === '') {
          callback(new Error('请输入密码'));
        } else {
          if (this.ruleForm.newPassword !== '') {
            this.$refs.ruleForm.validateField('newPassword');
          }
          callback();
        }
      };
      var validatePass2 = (rule, value, callback) => {
        if (value === '') {
          callback(new Error('请再次输入密码'));
        } else if (value !== this.ruleForm.newPassword) {
          callback(new Error('两次输入密码不一致!'));
        } else {
          callback();
        }
      };
      return {
        ruleForm: {
          oldPassword: '',
          newPassword: '',
          newPassword2: ''
        },
        rules: {
          newPassword : [
            { validator: validatePass, trigger: 'blur' }
          ],
          newPassword2: [
            { validator: validatePass2, trigger: 'blur' }
          ],
          oldPassword: [
            { validator: checkAge, trigger: 'blur' }
          ]
        }
      };
    },
    methods: {
      submitForm(formName) {
        this.$refs[formName].validate((valid) => {
          if (valid) {
            alert('submit!');
          } else {
            console.log('error submit!!');
            return false;
          }
        });
      },
      resetForm(formName) {
        this.$refs[formName].resetFields();
      }
    }
  }
</script>