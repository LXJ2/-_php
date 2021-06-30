<template>
      
  <div class="EditUserInfo">
    <h1>完善我的信息</h1>
    <div></div>
    <el-form ref="form" :model="userForm" label-width="80px" size="mini">
      <el-form-item label="姓名" style="margin-top: 20px">
        <el-input
          v-model="userForm.name"
          style="width: 30%"
          :placeholder="userInfo.name"
        ></el-input>
      </el-form-item>
      <el-form-item label="电话">
        <el-input
          v-model="userForm.phone"
          style="width: 50%"
          :placeholder="userInfo.phone"
        ></el-input>
      </el-form-item>
      <el-form-item label="职称">
        <el-input
          v-model="userForm.level"
          style="width: 50%"
          :placeholder="userInfo.level"
        ></el-input>
      </el-form-item>
      <el-form-item label="工作单位">
        <el-input
          v-model="userForm.workplace"
          style="width: 50%"
          :placeholder="userInfo.workplace"
        ></el-input>
      </el-form-item>
      <el-form-item label="学历">
        <el-input
          v-model="userForm.education"
          style="width: 50%"
          :placeholder="userInfo.education"
        ></el-input>
      </el-form-item>
      <el-form-item label="邮箱">
        <el-input
          v-model="userForm.email"
          style="width: 50%"
          :placeholder="userInfo.email"
        ></el-input>
      </el-form-item>
      <el-form-item label="研究方向">
        <el-input
          v-model="userForm.direction"
          style="width: 50%"
          :placeholder="userInfo.direction"
        ></el-input>
      </el-form-item>
      <el-form-item label="社会职务" v-if="userInfo.social_position">
        <el-input v-model="userForm.direction" style="width: 50%" :placeholder="userInfo.social_position"></el-input>
      </el-form-item>
      <el-form-item label="银行卡号" v-if="userInfo.bank_card">
        <el-input v-model="userForm.bank_card" style="width: 50%" :placeholder="userInfo.bank_card"></el-input>
      </el-form-item>
      <el-form-item size="large">
        <el-button type="primary" @click="onSubmit">提交</el-button>
      </el-form-item>
    </el-form>
        
  </div>
</template>
<script>
// @ is an alias to /src
import { mapState } from "vuex";
import { updataUserInfo } from "../../api/api";
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
        position: that.$store.state.uid,
        create_time: localStorage.getItem("srms_project_token"),
      };
      //console.log(obj);
      that.$confirm("确度修改信息?", "提示", {
        confirmButtonText: "确定",
        cancelButtonText: "取消",
        type: "warning",
      })
        .then(() => {
          updataUserInfo(obj).then((data) => {
           that.$message({
            type: "success",
            message: "提交成功！",
          });
            //console.log(data);
            store.commit("setUserInfo", data.data);
          });
        })
        .catch(() => {
          that.$message({
            type: "info",
            message: "已取消修改",
          });
        });
    },
  },
  computed: mapState({
    // 箭头函数可使代码更简练
    userInfo: (state) => state.userInfo,
  }),
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