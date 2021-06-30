<template>
<div class="fileData">
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
      <template slot-scope="scope">
        <el-link type="primary" :href="fileInfo[scope.$index].file_address"><i class="el-icon-view el-icon--right"></i>预览 </el-link>
        <el-button
          @click="deleteRow(scope.$index, fileInfo)"
          type="text"
          size="small">
          移除
        </el-button>
      </template>
    </el-table-column>
  </el-table>
  </div>
</template>

<script>
import { getFileData,deleteFile } from '../../api/api';
  export default {
    //props: ['fileInfo'],
    data() {
      return {
          fileInfo: [],
          
      }
    },
    methods: {
        
        deleteRow(index,rows) {
          //let rows =rows;
          let that = this;
          let row = rows[index];
          let obj = {};
          obj.create_time = row.create_time;
          
          this.$confirm("确定删除稿件?", "提示", {
        confirmButtonText: "确定",
        cancelButtonText: "取消",
        type: "warning",
      })
        .then(() => {
          deleteFile(obj).then(() =>{
            that.$message({
            type: "success",
            message: "删除成功！",
          });
            rows.splice(index, 1);
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
    created(){
       getFileData().then(data =>{
           data.data.forEach(item =>{
               this.fileInfo.push(item) ;
           });
           
           //console.log(this.fileInfo);
       });
    }

  }
</script>
<style lang="less">
.fileData{
   .el-button--small{
        margin-left: 20px;
    }
}
</style>