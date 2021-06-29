<template>
      <div class="addFile" v-if="uploadVisible">
  <h1>提交稿件</h1>
  <p style="color:red">以下每一项为必填项，请认真填写</p>
  <el-form  ref="fileInfo" :model="fileInfo" label-width="80px" size="mini">
  <el-form-item label="	稿件名称">
    <el-input :prop="fileInfo.name" v-model="fileInfo.name" autocomplete="off"></el-input>
  </el-form-item>
  <el-form-item label="	作者编号">
    <el-input :prop="fileInfo.author_num" v-model="fileInfo.author_num" autocomplete="off"></el-input>
  </el-form-item>
  <el-form-item label="	通讯作者">
    <el-input :prop="fileInfo.author_main" v-model="fileInfo.author_main" autocomplete="off"></el-input>
  </el-form-item>
  <el-form-item label="	分类号" >
    <el-input :prop="fileInfo.specialty_num" v-model="fileInfo.specialty_num"  autocomplete="off"></el-input>
  </el-form-item>
  <el-form-item label="关键词">
    <el-input type="textarea" :prop="fileInfo.keywords" v-model="fileInfo.keywords" autocomplete="off"></el-input>
  </el-form-item>
  <el-form-item label="中文摘要">
    <el-input type="textarea" :prop="fileInfo.ch_abstract" v-model="fileInfo.ch_abstract" autocomplete="off"></el-input>
  </el-form-item>
  <el-form-item label="英文摘要">
    <el-input type="textarea" :prop="fileInfo.en_abstract" v-model="fileInfo.en_abstract" autocomplete="off"></el-input>
  </el-form-item>
   <el-form-item label="资助项目">
    <el-input type="textarea" :prop="fileInfo.fund_project" v-model="fileInfo.fund_project" autocomplete="off"></el-input>
  </el-form-item> 
  <el-upload
        class="avatar-uploader"
        action=""
        :on-change="loadJsonFromFile"
        :http-request='submitUpload'
        :file-list="uploadFiles"                       
        >
        <el-button size="small" type="primary">点击上传文件</el-button>
   </el-upload>  

<el-form-item size="large">
    <el-button type="primary" @click="submitForm('fileInfo')"
          >提交</el-button
        >
        <el-button type="primary" @click="resetForm('fileInfo')"
          >重置</el-button
        >
  </el-form-item> 
   
</el-form>
    </div>
<div v-else="uploadVisible">

</div>
    
  
</template>
<script>
// @ is an alias to /src

  import { upload,uploadFile } from '../../api/api';
export default {
  data() {
    return {
       fileInfo:{
          name: "",
          author_num: "",
          author_main: "",
          specialty_num: "",
          keywords: "",
          ch_abstract: "",
          en_abstract: "",
          fund_project : "",
        },
      // data for upload files
      uploadVisible: true,
      uploadFiles: [],
      fileList: [],
      token :'',
    };
  },
  methods: {
    submitForm(formName) {
        this.$refs[formName].validate((valid) => {
          if (valid) {
            
            let obj = {
          name: this.fileInfo.name,
          author_num: this.fileInfo.author_num,
          author_main: this.fileInfo.author_main,
          specialty_num: this.fileInfo.specialty_num,
          keywords: this.fileInfo.keywords,
          ch_abstract: this.fileInfo.ch_abstract,
          en_abstract: this.fileInfo.en_abstract,
          fund_project : this.fileInfo.fund_project,
          create_time: this.token,
        }
        
            this.$confirm('确度提交稿件?', '提示', {
          confirmButtonText: '确定',
          cancelButtonText: '取消',
          type: 'warning'
        }).then(() => {
          console.log(obj);
          uploadFile(obj).then((data) =>{
              console.log(data);
          })
          this.uploadVisible = false;  
        }).catch(() => {
          this.$message({
            type: 'info',
            message: '已取消修改'
          })
          });
          } else {
            console.log('error submit!!');
            return false;
          }
        });
        //this.$refs[formName].resetFields();
      },
    resetForm(formName) {
        this.$refs[formName].resetFields();
      },
    async submitUpload(content) {
            try {
                const formData = new FormData()
                formData.append('myfile', content.file)
                const res = await upload(formData)
                // 把接口返回的对象形式的数据转换成element ui的对象格式
                this.token = res.data.token;
                console.log(res);
                // 这里的url是自己获取后台地址拼接起来的图片地址

            } catch (e) {
                console.log(e);
            }
        },
    loadJsonFromFile(file, fileList) {
      this.uploadFilename = file.name;
      this.uploadFiles = fileList;
    },
  },
};
</script>
<style lang="less">
.addFile {
  .avatar-uploader {
    margin: 10px 0 10px 100px;
  }
}
</style>