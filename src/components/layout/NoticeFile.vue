<template>
<div class="fileInfo">
  <el-table
    :data="fileInfo"
    stripe
    style="width: 100%">
    <el-table-column
      prop="file_id"
      label="稿件编号"
      width="180">
    </el-table-column>
    <el-table-column
      prop="name"
      label="稿件名称"
      width="180">
    </el-table-column>
    <el-table-column
      prop="author_main"
      label="通讯作者"
      width="180">
    </el-table-column>
    <el-table-column
      prop="specialty_num"
      label="分类号"
      width="180">
    </el-table-column>
    <el-table-column
      prop="keywords"
      label="关键词"
      width="180">
    </el-table-column>
    <el-table-column
      prop="fund_project"
      label="资助项目"
      width="180">
    </el-table-column>
    <el-table-column
      label="操作"
      width="200">
      <template slot-scope="props">
        <el-link type="primary" href="http://www.srms.cn:90/files/6d745772288a244070d0fa2bd760577c.jpg" v-if="props.row.status == 1"></i>缴费</el-link>
        <el-link type="primary" :href="props.row.file_address" v-else><i class="el-icon-view el-icon--right"></i>预览 </el-link>
        <el-button type="text" size="small" v-if="props.row.status == 1">通过</el-button>
        <el-button type="text" size="small" v-else>待审核</el-button>       
      </template>
    </el-table-column>
  </el-table>
  </div>
</template>

<script>
import { getUserFile } from "../../api/api";
export default {
  data() {
    return {
      fileInfo: [],
      //<el-link icon="el-icon-edit" type="primary"  target="_blank">编辑</el-link>
      data1: true,
    };
  },
  methods: {},
  created() {
    let data = localStorage.getItem("myfile_token");
    let obj = {};
    obj.create_time = data;
    getUserFile(obj).then((data) => {
      let paramas = data.data;
      let status = parseInt(paramas.status);
      paramas.status = status;
      this.fileInfo.push(paramas);
      console.log(this.fileInfo);
    });
  },
};
</script>
<style lang="less">
.fileInfo{
   .el-button--small{
        margin-left: 20px;
    }
}
</style>