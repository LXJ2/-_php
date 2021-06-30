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
        <el-button type="text" size="small"  v-if="fileInfo[scope.$index].rowTip" >通过</el-button>
        <el-button type="text" size="small"  @click="pass(scope.$index, fileInfo)" v-else>审核</el-button>
      </template>
    </el-table-column>
  </el-table>
  </div>
</template>

<script>
import { getFileData,updataFileStatus } from '../../api/api';
  export default {
    //props: ['fileInfo'],
    data() {
      return {
          fileInfo: [],
          
      }
    },
    methods: {
      pass(index, rows) {
           //console.log(rows);
           let row = rows[index];
           let obj = {};
           obj.create_time = row.create_time;
          this.$confirm('是否审核通过?', '提示', {
          confirmButtonText: '是',
          cancelButtonText: '否',
          type: 'warning'
        }).then((data) => {
            //console.log(obj);
          updataFileStatus(obj).then((data) =>{
              this.$set(row,'rowTip',true);
              localStorage.setItem("file_token", row.create_time);
              //console.log(rows);   
              alert('审核通过!');
          })
    
        }).catch((e) => {
            console.log(e);
          this.$message({
            type: 'info',
            message: '已取消修改'
          })
          });
            
        }

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