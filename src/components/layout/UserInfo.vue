<template>
      
  <div class="userInfo">
      <h1>我的信息</h1>
     <el-form ref="form" :model="userForm" label-width="80px" size="mini" :disabled="true">
      <el-form-item label="姓名" style="margin-top: 20px">
        <el-input v-model="userForm.name" style="width: 30%" :placeholder="userInfo.name"></el-input>
      </el-form-item>
      <el-form-item label="电话">
        <el-input v-model="userForm.phone" style="width: 50%" :placeholder="userInfo.phone" ></el-input>
      </el-form-item>
      <el-form-item label="职称">
        <el-input v-model="userForm.level" style="width: 50%" :placeholder="userInfo.level"></el-input>
      </el-form-item>
      <el-form-item label="工作单位">
        <el-input v-model="userForm.workplace" style="width: 50%" :placeholder="userInfo.workplace"></el-input>
      </el-form-item>
      <el-form-item label="学历">
        <el-input v-model="userForm.education" style="width: 50%" :placeholder="userInfo.education"></el-input>
      </el-form-item>
      <el-form-item label="邮箱">
        <el-input v-model="userForm.email" style="width: 50%" :placeholder="userInfo.email"></el-input>
      </el-form-item>
      <el-form-item label="研究方向">
        <el-input v-model="userForm.direction" style="width: 50%" :placeholder="userInfo.direction"></el-input>
      </el-form-item>
    </el-form>
  </div>
</template>

<script>
import { mapState } from "vuex";
// @ is an alias to /src
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
        desc: "",
      },
    };
  },
  methods: {
    
  },
  computed: mapState({
    // 箭头函数可使代码更简练
    userInfo: (state) => state.userInfo,
  }),
};
</script>
<style lang="less">
.el-form {
  width: 80%;
  .el-input {
  border: 1px solid;
}
}
.el-form-item--mini.el-form-item,
.el-form-item--small.el-form-item {
  margin-bottom: 5px;
}
.userInfo{
.el-input__inner {
    &::placeholder {
       font-size: vw(14);
       color: #000;
    }

    &::-webkit-input-placeholder {
        /* WebKit browsers 适配谷歌 */
        font-size: vw(14);
        color:black;
    }
    &:-moz-placeholder {
        /* Mozilla Firefox 4 to 18 适配火狐 */
       font-size: vw(14);
    }

    &::-moz-placeholder {
        /* Mozilla Firefox 19+ 适配火狐 */
       font-size: vw(14);
    }

    &:-ms-input-placeholder {
        /* Internet Explorer 10+  适配ie*/
        font-size: vw(14);
    }
}
}

</style>