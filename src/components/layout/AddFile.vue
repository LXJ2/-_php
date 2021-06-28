<template>
    <div class="addFile">
  <h1>提交稿件</h1>
  <p style="color:red">以下每一项为必填项，请认真填写</p>
  <el-form ref="form" :model="fileInfo" label-width="80px" size="mini">
  <el-form-item label="	稿件名称">
    <el-input v-model="fileInfo.name"></el-input>
  </el-form-item>
  <el-form-item label="	作者编号">
    <el-input v-model="fileInfo.author_num"></el-input>
  </el-form-item>
  <el-form-item label="	通讯作者">
    <el-input v-model="fileInfo.author_main"></el-input>
  </el-form-item>
  <el-form-item label="	分类号" >
    <el-input v-model="fileInfo.Specialty_num" ></el-input>
  </el-form-item>
  <el-form-item label="关键词">
    <el-input type="textarea" v-model="fileInfo.keywords"></el-input>
  </el-form-item>
  <el-form-item label="中文摘要">
    <el-input type="textarea" v-model="fileInfo.ch_abstract"></el-input>
  </el-form-item>
  <el-form-item label="英文摘要">
    <el-input type="textarea" v-model="fileInfo.en_abstract"></el-input>
  </el-form-item>
   <el-form-item label="资助项目">
    <el-input type="textarea" v-model="fileInfo.fund_project"></el-input>
  </el-form-item> 
<el-upload
  class="upload-demo"
  action="https://jsonplaceholder.typicode.com/posts/"
  :on-preview="handlePreview"
  :on-remove="handleRemove"
  :before-remove="beforeRemove"
  multiple
  :limit="3"
  :on-exceed="handleExceed"
  :file-list="fileList">
  <el-button size="small" type="primary">点击上传文件</el-button>
  <div slot="tip" class="el-upload__tip">{{uploadMess}}</div>
</el-upload>
<el-form-item size="large">
    <el-button type="primary" @click="onSubmit">提交</el-button>
    <el-button>重置</el-button>
  </el-form-item>
</el-form>
    </div>
    
</template>
<script>
// @ is an alias to /src
export default {
    data() {
      return {
        fileInfo:{
          name: "",
          author_num: "",
          author_main: "",
          Specialty_num: "",
          keywords: "",
          ch_abstract: "",
          en_abstract: "",
          fund_project : "",
        },
        fileList: [{name: 'food.jpeg', url: 'https://fuss10.elemecdn.com/3/63/4e7f3a15429bfda99bce42a18cdd1jpeg.jpeg?imageMogr2/thumbnail/360x360/format/webp/quality/100'},],
        uploadMess: "请上传pdf/word文件"
      };
    },
    methods: {
      onSubmit() {
        
      },
      handleRemove(file, fileList) {
        console.log(file, fileList);
      },
      handlePreview(file) {
        console.log(file);
      },
      handleExceed(files, fileList) {
        this.$message.warning(`当前限制选择 3 个文件，本次选择了 ${files.length} 个文件，共选择了 ${files.length + fileList.length} 个文件`);
      },
      beforeRemove(file, fileList) {
        return this.$confirm(`确定移除 ${ file.name }？`);
      },
    }
  };
</script>
<style lang="less">
.addFile{
  .upload-demo{
    margin:10px 0 50px 100px;
  }
}
</style>