<template>
      
  <div class="EditUserInfo">
    <div></div>
    <el-form ref="form" :model="userForm" label-width="80px" size="mini">
      <el-form-item label="姓名" style="margin-top: 20px">
        <el-input v-model="userForm.name" style="width: 30%"></el-input>
      </el-form-item>
      <el-form-item label="电话">
        <el-input v-model="userForm.phone" style="width: 50%"></el-input>
      </el-form-item>
      <el-form-item label="职称">
        <el-input v-model="userForm.level" style="width: 50%"></el-input>
      </el-form-item>
      <el-form-item label="工作单位">
        <el-input v-model="userForm.workplace" style="width: 50%"></el-input>
      </el-form-item>
      <el-form-item label="学历">
        <el-input v-model="userForm.education" style="width: 50%"></el-input>
      </el-form-item>
      <el-form-item label="邮箱">
        <el-input v-model="userForm.email" style="width: 50%"></el-input>
      </el-form-item>
      <el-form-item label="研究方向">
        <el-input v-model="userForm.direction" style="width: 50%"></el-input>
      </el-form-item>
      <el-form-item label="社会职务">
        <el-input v-model="userForm.social_position" style="width: 50%"></el-input>
      </el-form-item>
      <el-form-item label="银行卡号">
        <el-input v-model="userForm.bank_card" style="width: 50%"></el-input>
      </el-form-item>
      <el-form-item size="large">
        <el-button type="primary" @click="onSubmit">提交</el-button>
      </el-form-item>
    </el-form>
        
  </div>
</template>
<script>
// @ is an alias to /src

import { addEditors } from "../../api/api";
export default {
  data() {
    return {
      userForm: {
        name: "",
        phone: "",
        level: "",
        workplace: "",
        education: "",
        email: "",
        direction: "",
        bank_card: "",
        social_position: "",
      },
    };
  },
  methods: {
    onSubmit() {
      let that = this;
      let a = that.userForm;
      let obj = {
        name: a.name,
        phone: a.phone,
        level: a.level,
        workplace: a.workplace,
        education: a.education,
        email: a.email,
        direction: a.direction,
        social_position: a.social_position,
        bank_card: a.bank_card,
      };
      console.log(obj);
      that.$confirm("确定增加审稿人?", "提示", {
        confirmButtonText: "确定",
        cancelButtonText: "取消",
        type: "warning",
      })
        .then(() => {
          addEditors(obj).then((data) => {
            that.$message({
            type: "success",
            message: "添加成功！",
          });
            
          });
        })
        .catch((e) => {
          that.$message({
            type: "info",
            message: "已取消修改",
          });
          console.log(e);
        });
    },
  },
  /* computed: mapState({
    // 箭头函数可使代码更简练
    userInfo: (state) => state.userInfo,
  }), */
};
</script>
<style lang="less">
.EditUserInfo {
  .el-form {
    width: 80%;
  }
  .el-form-item--mini.el-form-item,
  .el-form-item--small.el-form-item {
    margin-bottom: 10px;
  }
  .el-input {
    border: 1px solid;
  }
}
</style>